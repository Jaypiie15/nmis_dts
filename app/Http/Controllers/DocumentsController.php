<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Documents;
use App\Models\Tracking;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;
use DataTables;
use App\Mail\DtsMail;
use Illuminate\Support\Facades\Mail;


class DocumentsController extends Controller
{

    public function __construct(){

        $this->middleware('records');
    }

    public function add_user()
    {
        return view('records.add-user');
    }

    public function add_document()
    {
        return view('records.add-document');
    }

    public function show_documents()
    {
       $documents = Documents::orderBy('created_at','DESC')->get();

        return view('records.show-documents',compact('documents'));
    }

    public function view_document($tracking_number)
    {
        $document = Documents::where('tracking_number',$tracking_number)->first();
        $tracking = Tracking::where('tracking_number',$tracking_number)->orderBy('created_at','DESC')->get();

        return view('records.view-document',compact('document','tracking'));
    }

    public function edit_document($tracking_number)
    {

        $document = Documents::where('tracking_number',$tracking_number)->first();

        return view('records.edit-document',compact('document'));
    }

    public function show_users()
    {
        $users = User::all();

        return view('records.show-users',compact('users'));
    }

    public function edit_user($division_name)
    {
        $user = User::where('division_name',$division_name)->first();

        return view('records.edit-user',compact('user'));
    }

    public function update_user(Request $request)
    {
        $data = $request->validate([
            'division_name' => 'required',
            'division_email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('division_name',$request->div_name)->first();

        if($request->account_status == 'Deactivate')
        {
            $user->delete();
        }

        $user->update([
            'division_name' => $data['division_name'],
            'division_email' => $data['division_email'],
            'password' => $data['password']
        ]);

        if($user->wasChanged('password')){
            $user->password = Hash::make($request->password);
            $user->save();
        }

        $request->session()->flash('type', 'success');
        return redirect('/show-users');

    }

    public function generate_report(Request $request)
    {

        // $documents = Documents::whereDate('created_at', Carbon::now())
        // ->orderBy('created_at','DESC')
        // ->get();


        // return view('records.generate-report',compact('documents'));
        return view('records.generate-report');


        // if ($request->ajax()) {


        //     $data = Documents::select('*');
        //     return Datatables::of($data)
        //             ->filter(function ($instance) use ($request) {
        //                 if (!empty($request->get('document_type'))) {
        //                     $instance->where('document_type', $request->get('document_type'));
        //                 }
        //                 if (!empty($request->get('search'))) {
        //                      $instance->where(function($w) use($request){
        //                         $search = $request->get('search');
        //                         $w->orWhere('tracking_number', 'LIKE', "%$search%")
        //                           ->orWhere('from_office', 'LIKE', "%$search%")
        //                           ->orWhere('document_title', 'LIKE', "%$search%")
        //                           ->orWhere('email_address', 'LIKE', "%$search%")
        //                           ->orWhere('document_type', 'LIKE', "%$search%");
        //                     });
        //                 }
        //             })
        //             ->make(true);
            
        // }
        // return view('records.generate-report');
    }

    public function filter_report(Request $request)
    {      
        $start_date = Carbon::parse(date($request->start_date));
        $end_date = Carbon::parse(date($request->end_date))->addDays(1); 
        $from_office = $request->from_office;
        $document_type = $request->document_type;
        // dd($request->from_office);
        $documents = Documents::whereBetween('created_at', [$start_date, $end_date])
                     ->when($from_office,function ($query) use ($from_office){
                        return $query->whereIn('category_from',$from_office);
                     })
                     ->when($document_type,function ($query) use ($document_type){
                        return $query->whereIn('document_type',$document_type);
                     })
                     ->orderBy('created_at','ASC')->get();
                     
            //    $documents = Documents::all();
        
        

        return view('records.filter-report',compact('documents'));

    }

    public function records_dashboard()
    {
        $count_total = Documents::all()->count();
        $count_co = Documents::where('category_from','CO')->count();
        $count_rtoc = Documents::where('category_from','RTOC')->count();
        $count_external = Documents::where('category_from','External')->count();

        $count = array(
                        'count_total' => $count_total,
                        'count_co' => $count_co,
                        'count_rtoc' => $count_rtoc,
                        'count_external' => $count_external,
                        );

        return view('records.records-dashboard',compact('count'));
    }

    public function store_user(Request $request)
    {
        $data = $request->validate([
            'division_name' => 'required',
            'division_email' => 'required',
            'password' => 'required'
        ]);

        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        return redirect('/show-users');
    }

    public function store_document(Request $request)
    {
        $data = $request->validate([
            'email_address' => 'required',
            'category_from' => 'required',
            'from_office' => 'required',
            'document_type' => 'required',
            'document_title' => 'required'
        ]);

        if($data['document_type'] == 'Disbursement Voucher' )
        {
            // $query = (int) Documents::where('document_type','Disbursement Voucher')
            // ->whereYear('created_at', now()->year)->count() +1;

            $query = Documents::where('document_type','Disbursement Voucher')
            ->latest()->first();

            $count = substr($query['tracking_number'],-4)+1;

            $tracking_number = 'NMISDV-'.Carbon::now()->format('y-m').'-'.sprintf("%04d",$count);
        }
        else {
            $query = (int) Documents::whereDay('created_at', now()->day)->count() +1;

            $tracking_number = 'NMIS-'.Carbon::now()->format('ymd').'-'.sprintf("%02d",$query);
        }


        $data['tracking_number'] = $tracking_number;
        $data['document_remarks'] = empty($request->document_remarks) ? 'N/A' : $request->document_remarks;

        $document = Documents::create($data);

        $tracking = Tracking::create([
                    'tracking_number' => $tracking_number,
                    'document_remarks' => 'Document has been created by '.Auth::user()->division_name,
                    'received_by' => ''
        ]);

        Storage::disk('local')->put('test.pdf', file_get_contents('storage/DTS.pdf'));


        $outputFile = Storage::disk('local')->path('DTS.pdf');
        // fill data
        $this->fillDocument(Storage::disk('local')->path('test.pdf'), $outputFile, $tracking_number);

        Mail::to($request->email_address)->send(new DtsMail($outputFile));

        $url = url('').'/print-document/'.$tracking_number;
        $request->session()->flash('url', $url);
        return redirect('/show-documents');


    }

    public function update_document(Request $request)
    {
        $data = $request->validate([
            'email_address' => 'required',
            'from_office' => 'required',
            'document_type' => 'required',
            'document_title' => 'required',
            'document_remarks' => 'required'
        ]);

        $document = Documents::where('tracking_number',$request->tracking_number)->first();

        $document->update([
            'email_address' => $data['email_address'],
            'from_office' => $data['from_office'],
            'document_type' => $data['document_type'],
            'document_title' => $data['document_title'],
            'document_remarks' => $data['document_remarks']
        ]);

        return redirect('/view-document'.'/'.$document->tracking_number);

    }

    public function delete_document(Request $request)
    {
        $document = Documents::where('tracking_number',$request->tracking_number)->first();

        $document->delete();

        return redirect('/show-documents');
    }


    public function print_document($tracking_number)
    {
        Storage::disk('local')->put('test.pdf', file_get_contents('storage/DTS.pdf'));


        $outputFile = Storage::disk('local')->path('DTS.pdf');
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

        $fpdi->SetXY(76, 135);
        $value = iconv('UTF-8', 'ASCII//TRANSLIT', $document->document_remarks);
        $fpdi->MultiCell(60,3,$value,0);

        $fpdi->SetFont("Arial", "B", 10);
        $fpdi->SetXY(140, 142);
        $fpdi->Write(1,$tracking_number);

        $fpdi->SetFont("Arial", "", 10);
        $fpdi->SetXY(76, 155);

        $value = iconv('UTF-8', 'ASCII//TRANSLIT', $document->document_title);
        $fpdi->MultiCell(100,5,$value,0);



        return $fpdi->Output($outputFile, 'F');

    }
}
