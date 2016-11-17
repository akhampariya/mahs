<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Workorder;
use Auth;
//use Session;
use Input;
use DB;

class WorkOrderController extends Controller
{
    public function __construct()

    {
//   
//        $this->middleware('administrator', ['only' => ['create', 'edit', 'destroy', 'update']]);
//        $this->middleware('administrator');
//        $this->middleware('role:admin|root');
        
//		$this->middleware('role:admin');

//        $this->user = Auth::user();
//        $this->users = User::all();
//        $this->list_role = Role::lists('display_name', 'id');
//        $this->heading = "Users";

//        $this->viewData = [ 'user' => $this->user, 'users' => $this->users, 'list_role' => $this->list_role, 'heading' => $this->heading ];
  
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
        return view ('workorders.create');
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
        return view ('workorders.show',compact('workorders'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $workorder=Workorder::find($id);
        return view('workorders.edit',compact('workorder'));
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
