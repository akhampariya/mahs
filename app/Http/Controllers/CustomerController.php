<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customer;
use App\Stock;
use App\Investment;
use Auth;

class CustomerController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function index()
    {
        //
        if(Auth::check()) {
            $customers = Customer::all();
            return view('customers.index', compact('customers'));
        }
        else{
            return redirect('/');
        }
    }

    public function show($id)
    {
        if(Auth::check()) {
        $customer = Customer::findOrFail($id);
        $stocks= Stock::where('customer_id', $id)->get();
        $investments= Investment::where('customer_id',$id)->get();
        return view('customers.show',compact('customer','stocks','investments'));
        }
        else{
            return redirect('/');
        }
    }


    public function create()
    {
        if(Auth::check()) {
            return view('customers.create');
        }
        else{
                return redirect('/');
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(Auth::check()) {
            $customer = new Customer($request->all());
            $customer->save();
            return redirect('customers');
        }
        else{
                return redirect('/');
            }
    }

    public function edit($id)
    {
        if(Auth::check()) {
            $customer=Customer::find($id);

        return view('customers.edit',compact('customer'));
        }
        else{
                return redirect('/');
            }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        if(Auth::check()) {
            //
            $customer = new Customer($request->all());
            $customer = Customer::find($id);
            $customer->update($request->all());
            return redirect('customers');
        }
        else{
            return redirect('/');
        }
    }

    public function destroy($id)
    {
        if(Auth::check()) {
            Customer::find($id)->delete();
            return redirect('customers');
        }
        else{
            return redirect('/');
        }
    }

    public function stringify($id)
    {
        // $customer=Customer::where('id', $id)->select('customer_id','name','address','city','state','zip','home_phone','cell_phone')->first();
        $customer = Customer::where('cust_number', $id)->select('cust_number','name','address','city','state','zip','home_phone','cell_phone')->first();

        $customer = $customer->toArray();
        return response()->json($customer);
    }


}