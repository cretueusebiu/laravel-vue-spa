<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Claims\Custom;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all()->toArray();
        return array_reverse($customer);
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'address' => 'required',
            'province' => 'required',
            'comments' => 'required',
        ]);
        $customer = new Customer($request->all());
        $customer->save();
        return response()->json(['status' => 'success', 'data' => ['customer_id' => $customer->id]]);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'address' => 'required',
            'province' => 'required',
            'comments' => 'required',
        ]);
        $customer = new Customer($request->all());
        $customer->save();
        return response()->json(['status' => 'success', 'data' => ['customer_id' => $customer->id]]);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json('Customer deleted successfully');
    }
}
