<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = [];
        foreach(Customer::with('person')->get() as $customer){
            $customers[] = [
                'name' => $customer->person->first_name . ' ' . $customer->person->last_name,
                'email' => $customer->person->email,
                'phone' => $customer->person->phone,
                'gender' => $customer->person->gender ? 'Male' : 'Female',
            ];
        }
        return $customers;
    }

    public function store(CustomerRequest $request)
    {
        $customer = new Customer($request->all());
        $customer->save();
        return response()->json(['status' => 'success', 'data' => ['customer_id' => $customer->id]]);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    public function update($id, CustomerRequest $request)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return response()->json(['status' => 'success', 'data' => ['customer_id' => $customer->id]]);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json('Customer deleted successfully');
    }
}
