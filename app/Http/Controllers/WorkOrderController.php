<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Workorder;
use Auth;
use App\User;
//use Session;
//use Input;
use Illuminate\Support\Facades\Input;
use DB;

class WorkOrderController extends Controller
{
    public function __construct()

    {
  
		  $this->workorder = Workorder::all();

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

        $workorders = Workorder::all();

        return view('workorders.index',compact('workorders'));
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

     
        $users = User::whereIn('id',function ($b){
        $b->select('user_id')->from('role_user')->whereIn('role_id',function ($c){
         $c->select('id')->from('roles')->where('name','tenant');
        });        
        })->pluck('name','id');

        return view ('workorders.create', compact('users'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
//    public function store()
//    {
//        $workorder=Request::all();
//        $this->Workorder($workorder);
//        return redirect('workorders');
 
//		}
public function store(Request $request)
    {
        $this->validate($request,[
        'desc'=>'required',
        'status'=>'required',
        'expecteddate'=>'required',
        'estmtdcost'=>'required',
        'actualdate'=>'required',
        'actualcost'=>'required',
        ]);

       //  $input = $request->all();
       // // $this->populateCreateFields($input);
       //  $object = Workorder::create($input);

        // rx1 - Get name of person who created this workorder

        $email=Auth::user()->email;
        $user=User::where('email',$email)->first();
        $username= $user->name;
        //$tusrid= $user->id;
        // rx1 end 

        // rx2 - Get Tenant name from drop down list and save into database
        $tid = Input::get('tenant_id');
        
        $workorders = WorkOrder::find($tid);
        
        $tname=User::where('id',$tid)->lists('name');
        $tname=str_replace('["', '', $tname);
        $tname=str_replace('"]', '', $tname);
        // rx2 end 

        $request['createdBy']=$username;
        $request['tenantname']=$tname;
        $request['tenant_id']=$tid;

        $workorder=new workorder($request->all());
        $workorder->save();

        return redirect('workorders');      
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
        $workorders = WorkOrder::find($id);
        $tenant_name=User::where('id',$workorders->tenant_id)->lists('name');
        $tenant_name=str_replace('["', '', $tenant_name);
        $tenant_name=str_replace('"]', '', $tenant_name);

        return view ('workorders.show',compact('workorders','tenant_name'));
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

        $workorder=Workorder::find($id);
        return view('workorders.edit',compact('workorder','users'));
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
        $workorder=new Workorder($request->all());            
        $workorder=Workorder::find($id);
        $workorder->update($request->all());
        return redirect('workorders');
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
        Workorder::find($id)->delete();
        return redirect('workorders');
    }
}
