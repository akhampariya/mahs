<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Workorder;

class WorkOrderController extends Controller
{
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
    public function store()
    {
        //
        $workorder=Request::all();
        Workorder::create($workorder);
        return redirect('workorders');
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