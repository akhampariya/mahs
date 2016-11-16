<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Workorder;
//use Auth;
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
        $workorders = Workorder::all();
        return view('workorders.index',compact('workorders'));
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
public function store(UserRequest $request)
    {
//        Log::info('UsersController.store - Start: ');
        $input = $request->all();
        $this->populateCreateFields($input);
//        $input['password'] = bcrypt($request['password']);
//        $input['active'] = $request['active'] == '' ? false : true;
 //       $object = User::create($input);
		$object = Workorder::create($input);
        return redirect()->back();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $workorders = WorkOrder :: find($id);
        return view ('workorders.show',compact('workorder'));
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
    public function update($id)
    {
        //
        $workorderUpdate=Request::all();
        $workorder=Workorder::find($id);
        $workorder->update($workorderUpdate);
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
        Workorder::fine($id)->delete();
        return redirect('workorders');
    }
}
