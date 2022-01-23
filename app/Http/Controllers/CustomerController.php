<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  public function index(Request $request)
  {
    $order_column = $request->get('orderBy');
    if (!in_array($order_column, ['id', 'name', 'email', 'phone', 'created_at'])) {
      $order_column = 'id';
    }
    $q =  '%' . $request->input('q') . '%';
    $customers = Customer::where('name', 'LIKE', $q)
      ->orWhere('email', 'LIKE', $q)
      ->orWhere('phone', 'LIKE', $q)
      ->orderBy($order_column, $request->boolean('orderDesc') ? 'desc' : 'asc')
      ->paginate($request->get('per_page'));
    return CustomerResource::collection($customers);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function search(Request $request)
  {
    $q =  '%' . $request->input('q') . '%';
    $items = Customer::select(['id', 'name'])
      ->where('name', 'LIKE', $q)
      ->orWhere('email', 'LIKE', $q)
      ->orWhere('phone', 'LIKE', $q)
      ->get();
    if ($items->IsEmpty()) {
      $items = [[
        'id'    => 0,
        'name'  => $request->input('q')
      ]];
    }

    return response()->json($items);
  }

  public function store(CustomerRequest $request)
  {
    $customer = new Customer($request->validated());
    $customer->save();
    return response()->json([
      'status'  => 'success',
      'message' => 'Customer record added sucessfully.',
      'data'    => ['customer_id' => $customer->id]
    ]);
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
    return response()->json([
      'status'  => 'success',
      'message' => 'Customer record updated sucessfully.',
      'data'    => ['customer_id' => $customer->id]
    ]);
  }

  public function destroy($id)
  {
    $customer = Customer::find($id);
    $customer->delete();
    return response()->json([
      'message' => "Customer $customer->name deleted successfully."
    ]);
  }
}
