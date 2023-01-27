<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Documents;
use App\Models\Tracking;



class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function trackdocument()
    {
        return view('auth.trackdocument');
    }

    public function track_document($tracking_number)
    {
        $document = Documents::where('tracking_number',$tracking_number)->first();
        $tracking = Tracking::where('tracking_number',$tracking_number)->orderBy('created_at','DESC')->get();
        
        return view('auth.track-document',compact('document','tracking'));
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'division_name' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt(['division_name' => $credentials['division_name'], 'password' => $credentials['password'], 'deleted_at' => null]))
        {
           $request->session()->regenerate();
            
            // dd(Auth::user()->division_name);
            if(Auth::user()->division_name == 'RECORDS'){
                if(!empty($request->tracking_number))
                {
                    return redirect('/track-document'.'/'.$request->tracking_number);
                    $request->session()->flash('type', 'login');

                }
                return redirect('/records-dashboard');
            }
            else
            {
                if(!empty($request->tracking_number))
                {
                    return redirect('/track-document'.'/'.$request->tracking_number);
                    $request->session()->flash('type', 'login');

                }
                return redirect('/user-show-documents');

            }
        }

        $request->session()->flash('type', 'error');
        // return redirect()->back();
        return back()->withErrors([
            'check' => 'Incorrect Email or Password',
            'title' => 'Error!!',
            'type' => 'error'
        ]);


    }

    public function receive_document(Request $request)
    {
        $tracking = Tracking::create([
                    'tracking_number' => $request->tracking_number,
                    'document_remarks' => 'The document has reached the '.$request->division_name.' Office and has been received by '.$request->received_by,
                    'received_by' => $request->received_by

        ]);

        $request->session()->flash('type', 'success');
        // return redirect()->back();
        return back()->withErrors([
            'check' => 'Successfully received document!',
            'title' => 'Success!!',
            'type' => 'success'
        ]);
    }

    public function search_document(Request $request)
    {
        $document = Documents::where('tracking_number',$request->tracking_number)->exists();

        if(!$document)
        {
            $request->session()->flash('type', 'error');
            return redirect()->back();

        }
        else{
            return redirect('/track-document'.'/'.$request->tracking_number);
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
