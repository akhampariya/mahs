<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ContactUS;
use Auth;

class ContactUSController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUS()
    {
        return view('contactUS');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUSPost(Request $request)
    {
        $this->validate($request, [
        		'name' => 'required',
        		'email' => 'required|email',
        		'message' => 'required'
        	]);

        ContactUS::create($request->all());

        return back()->with('success', 'Thanks for contacting us!');
    }

public function userrequests()
    {
        if(Auth::check())
        {

        $userrequests = ContactUS::all();
    

        return view('userrequests',compact('userrequests'));
        }
        else
        {
           return view('welcome'); 
        }
    }

   public function destroy($id)
    {
        //
        ContactUS::find($id)->delete();
        return redirect('userrequests');
    }


}