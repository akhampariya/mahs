<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Workorder;
use App\Property;
use App\Apartment;
use Auth;
use App\User;
//use Session;
//use Input;
use Illuminate\Support\Facades\Input;
use DB;

class ApartmentController extends Controller
{

    public function __construct()

    {
  
		  $this->apartment = Apartment::all();

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

        $apartments = Apartment::all();
        
        $users = User::all();

        return view('apartments.index',compact('apartments','users'));
        }
        else
        {
           return view('welcome'); 
        }
    }
//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return Response
//      */
    public function create()
    {
        //
        // $users = User::whereIn('id',function ($b){
        // $b->select('user_id')->from('role_user')->whereIn('role_id',function ($c){
        //  $c->select('id')->from('roles')->whereIn('name',['admin','pmanager','bmanager']);
        // });        
        // })->pluck('name','id');

     
        $users = User::whereIn('id',function ($b){
        $b->select('user_id')->from('role_user')->whereIn('role_id',function ($c){
         $c->select('id')->from('roles')->where('name','tenant');
        });        
        })->pluck('name','id');


 		$props = Property::all()->pluck('property_name','id');
 		// ('id',function ($b)
 		// {$b->select('property_name')->from('properties');})->pluck('property_name','id');


        return view ('apartments.create', compact('props','users'));
   		 }
    
	
	public function store(Request $request)
    {
        
        $this->validate($request,[
       
        'apt_typ' => 'required',
       
        ]);


        $tid = Input::get('tenant_id');
        $pid = Input::get('id');
        
        // $workorders = WorkOrder::find($tid);
        
        $pname=Property::where('id',$pid)->lists('property_name');
        $pname=str_replace('["', '', $pname);
        $pname=str_replace('"]', '', $pname);
        
        $request['tid']=$tid;
        $request['pid']=$pid;
        $request['apt_name']=$pname;

        
        $apartment = new apartment($request->all());
        $apartment->save();

        return redirect('apartments');      
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
        $apartment = Apartment::find($id);
        $tenant_name=User::where('id',$apartment->tid)->lists('name');
        $tenant_name=str_replace('["', '', $tenant_name);
        $tenant_name=str_replace('"]', '', $tenant_name);

        $Property=Property::where('apt_no',$id)->lists('property_name');
        $Property=str_replace('"', '', $Property);    
        $Property=str_replace(']', '', $Property);  

        $Property=str_replace('[', '', $Property);    

        return view ('apartments.show',compact('apartment','tenant_name','Property'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // // 
        // $this->validate($request,['apt_typ' => 'required']);

        $users = User::whereIn('id',function ($b){
        $b->select('user_id')->from('role_user')->whereIn('role_id',function ($c){
         $c->select('id')->from('roles')->where('name','tenant');
        });        
        })->pluck('name','id');


        $props = Property::all()->pluck('property_name','id');
       
             
        $apartment = Apartment::find($id);
        
		$tenant_name=User::where('id',$apartment->tid)->lists('name');
        $tenant_name=str_replace('["', '', $tenant_name);
        $tenant_name=str_replace('"]', '', $tenant_name);


        return view('apartments.edit',compact('apartment','tenant_name','users','props'));
    
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
       
        $this->validate($request,[
       
        'apt_typ' => 'required',
       
        ]);
        
        $tid = Input::get('tenant_id');
        $pid = Input::get('id');
        
        // $workorders = WorkOrder::find($tid);
        
        $pname=Property::where('id',$pid)->lists('property_name');
        $pname=str_replace('["', '', $pname);
        $pname=str_replace('"]', '', $pname);
        
        $request['tid']=$tid;
        $request['pid']=$pid;
        $request['apt_name']=$pname;

        $apartment=new Apartment($request->all());            
        $apartment=Apartment::find($id);
        $apartment->update($request->all());
        return redirect('apartments');
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
        Apartment::find($id)->delete();
        return redirect('apartments');
    }
}

