<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;
use App\Models\Tracking;
use Illuminate\Support\Facades\Auth;
use App\Mail\DtsMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;


class UserController extends Controller
{

    public function __construct(){

        $this->middleware('user');
    }

    public function user_show_documents()
    {

        if(Auth::user()->division_name == 'OED'){
            $documents = Documents::orderBy('created_at','DESC')->get();
        }
        else if(Auth::user()->division_name == 'HRM'){
            $documents = Documents::where('document_type','Travel Order')
            ->orWhere('document_type','Leave Accomplishment Form')->orderBy('created_at','DESC')->get();
        }
        else if(Auth::user()->division_name == 'PROPERTY'){
            $documents = Documents::where('document_type','Purchase Request')
            ->orWhere('document_type','Purchase Order')->orderBy('created_at','DESC')->get();
        }
        else{
            $documents = Documents::where('from_office',Auth::user()->division_name)->orderBy('created_at','DESC')->get();
        }

        return view('users.show-documents',compact('documents'));
    }

    public function user_view_document($tracking_number)
    {
        $document = Documents::where('tracking_number',$tracking_number)->first();
        $tracking = Tracking::where('tracking_number',$tracking_number)->orderBy('created_at','DESC')->get();

        return view('users.view-document',compact('document','tracking'));
    }

    public function user_dashboard()
    {
        return view('users.user-dashboard');
    }

    public function user_add_document()
    {
        return view('users.add-user-document');
    }

    public function user_store_document(Request $request)
    {
        $data = $request->validate([
            'email_address' => 'required',
            // 'category_from' => 'required',
            'from_office' => 'required',
            'document_type' => 'required',
            'document_title' => 'required'
        ]);

        if(strpos($data['from_office'],'RTOC') !== false)
        {
            $category = 'RTOC';
        }
        else{
            $category = 'CO';
        }

        if(Auth::user()->division_name == 'PROPERTY')
        {   

            if($data['document_type'] == 'Purchase Request' )
            {
                // $query = (int) Documents::where('document_type','Purchase Request')
                // ->orWhere('document_type','Purchase Order')
                // ->whereYear('created_at', now()->year)->count() +1;
                $query = Documents::where('document_type','Purchase Request')
                ->latest()->first();

                $count = substr($query['tracking_number'],-4)+1;

                $tracking_number = 'NMISPR-'.Carbon::now()->format('y-m').'-'.sprintf("%04d",$count);
            }
            else {
                // $query = (int) Documents::where('document_type','Purchase Order')
                // ->whereYear('created_at', now()->year)->count() +1;
                $query = Documents::where('document_type','Purchase Order')
                ->latest()->first();

                $count = substr($query['tracking_number'],7,-6)+1;
                $tracking_number = 'NMISPO-'.sprintf("%03d",$count).'-'.Carbon::now()->format('m-y');
            }

        }
        else{
            
            // $query = (int) Documents::where('document_type','Travel Order')
            // // ->orWhere('document_type','Purchase Order')
            // ->whereYear('created_at', now()->year)->count() +1;
            $query = Documents::where('document_type','Travel Order')
            ->latest()->first();

            $count = substr($query['tracking_number'],-4)+1;

            $tracking_number = 'NMISTO-'.Carbon::now()->format('Y-m').'-'.sprintf("%04d",$count);
        }


        $data['category_from'] = $category;
        $data['tracking_number'] = $tracking_number;
        $data['document_remarks'] = empty($request->document_remarks) ? 'N/A' : $request->document_remarks;

        $document = Documents::create($data);

        $tracking = Tracking::create([
                    'tracking_number' => $tracking_number,
                    'document_remarks' => 'Document has been created by '.Auth::user()->division_name,
                    'received_by' => ''
        ]);

        Storage::disk('local')->put('test.pdf', file_get_contents('storage/DTS_User.pdf'));


        $outputFile = Storage::disk('local')->path('DTS_User.pdf');
        // fill data
        $this->fillDocument(Storage::disk('local')->path('test.pdf'), $outputFile, $tracking_number);

        Mail::to($request->email_address)->send(new DtsMail($outputFile));

        $url = url('').'/user-print-document/'.$tracking_number;
        $request->session()->flash('url', $url);
        return redirect('/user-show-documents');
    }

    public function user_print_document($tracking_number)
    {
        Storage::disk('local')->put('test.pdf', file_get_contents('storage/DTS_User.pdf'));


        $outputFile = Storage::disk('local')->path('DTS_User.pdf');
        // fill data
        $this->fillDocument(Storage::disk('local')->path('test.pdf'), $outputFile, $tracking_number);
        //output to browser
        return response()->file($outputFile);
    }

    public function fillDocument($file, $outputFile, $tracking_number)
    {
        $url = url('').'/track-document/'.$tracking_number;

        $fpdi = new FPDI;
        $count = $fpdi->setSourceFile($file);

        $template   = $fpdi->importPage(1);
        $size       = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
        $fpdi->useTemplate($template);

        $document = Documents::where('tracking_number',$tracking_number)->first();

        $fpdi->SetFont("Arial", "", 10);
            
        $fpdi->SetXY(76, 106);
        $fpdi->Write(1,$tracking_number);

        $fpdi->Image('https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='.$url,140,104,35,0,'PNG');

        $fpdi->SetXY(76, 116);
        $fpdi->Write(1,$document->from_office);

        $fpdi->SetXY(76, 127);
        $fpdi->Write(1,Carbon::parse($document->created_at)->format('F d,Y H:ia'));

        $fpdi->SetXY(76, 137);
        $fpdi->Write(1,$document->document_remarks);

        $fpdi->SetFont("Arial", "B", 10);
        $fpdi->SetXY(144, 142);
        $fpdi->Write(1,$tracking_number);

        $fpdi->SetFont("Arial", "", 10);
        $fpdi->SetXY(76, 155);

        $value = iconv('UTF-8', 'ASCII//TRANSLIT', $document->document_title);
        $fpdi->MultiCell(100,5,$value,0);



        return $fpdi->Output($outputFile, 'F');

    }
}
