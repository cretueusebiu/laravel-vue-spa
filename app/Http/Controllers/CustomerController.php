<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\Person;
use Illuminate\Http\Request;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $q =  '%' . $request->input('q') . '%';
        $items = Customer::select(['person_id', 'company_name'])
            ->addSelect([
                'customer_name' => Person::select('first_name')->whereColumn('ospos_people.person_id', 'ospos_customers.person_id')
            ])
            ->where('company_name', 'LIKE', $q)
            ->OrWhereHas('person', function ($person) use ($q) {
                $person->where('first_name', 'LIKE', $q);
                $person->OrWhere('last_name', 'LIKE', $q);
            })->get();
        if($items->IsEmpty()){
            $items = [[
                'person_id' => 0,
                'customer_name' => $request->input('q')
            ]];
        }

        return response()->json($items);
    }

    public function store(CustomerRequest $request)
    {
        $person = new Person();
        $person->first_name = $request->input('name');
        $person->last_name = '';
        $person->gender = $request->input('gender') == 'male';
        $person->phone_number = $request->input('phone');
        $person->email = $request->input('email');
        $person->address_1 = $request->input('address');
        $person->address_2 = '';
        $person->city = $request->input('city');
        $person->state = $request->input('province');
        $person->zip = '';
        $person->country = '';
        $person->comments = $request->input('comments') ?: '';
        $person->save();
        $customer = new Customer();
        $customer->company_name = $request->input('company_name');
        $customer->person_id = $person->person_id;
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
