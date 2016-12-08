<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Property;
use App\Workorder;
use Auth;
use App\User;

class PropertyController extends Controller
{
    public function __construct()
    {
         $this->Property = Property::all();
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(Auth::check())
        {

        $Property = Property::all();

        return view('Property.index',compact('Property'));
        }
        else
        {
           return view('welcome'); 
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        // $users = User::whereIn('id',function ($b){
        // $b->select('user_id')->from('role_user')->whereIn('role_id',function ($c){
        //  $c->select('id')->from('roles')->whereIn('name',['admin','pmanager','bmanager']);
        // });        
        // })->pluck('name','id');

     
        // $users = User::whereIn('id',function ($b){
        // $b->select('user_id')->from('role_user')->whereIn('role_id',function ($c){
        //  $c->select('id')->from('roles')->where('name','tenant');
        // });        
        // })->pluck('name','id');

        // $workorders=Workorder::lists('id');

        // return view ('Property.create', compact('workorders'));
    
        $users = User::whereIn('id',function ($b){
        $b->select('user_id')->from('role_user')->whereIn('role_id',function ($c){
         $c->select('id')->from('roles')->where('name','tenant');
        });        
        })->pluck('name','id');

        return view ('Property.create', compact('users'));
        // return view ('workorders.create', compact('users'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
//    public function store()
//    {
//        $Property=Request::all();
//        $this->Property($Property);
//        return redirect('Property');
 
//      }
public function store(Request $request)
    {
        $this->validate($request,[
        'property_name'=>'required',
        'apt_no'=>'required',
        'adress'=>'required',
        ]);

        $aptno=$request['apt_no'];
        $aptno=$aptno+1;

        $request['apt_no']=$aptno;
        $Property=new Property($request->all());
        $Property->save();

        return redirect('Property');      
//        
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $Property = Property::find($id);

        return view ('Property.show',compact('Property'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $users = User::whereIn('id',function ($b){
        $b->select('user_id')->from('role_user')->whereIn('role_id',function ($c){
         $c->select('id')->from('roles')->where('name','tenant');
        });        
        })->pluck('name','id');

        $Property=Property::find($id);
        return view('Property.edit',compact('Property','users'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        //
        $Property=new Property($request->all());            
        $Property=Property::find($id);
        $Property->update($request->all());
        return redirect('Property');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        Property::find($id)->delete();
        return redirect('Property');
    }
}
