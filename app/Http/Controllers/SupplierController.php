<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $supplier = Suppliers::all()->toArray();
        // return array_reverse($supplier);

        $order_column = $request->get('orderBy');
        if (!in_array($order_column, ['id', 'name', 'email', 'phone', 'created_at'])) {
            $order_column = 'id';
        }
        $q =  '%' . $request->input('q') . '%';
        $supplier = Suppliers::where('name', 'LIKE', $q)
            ->orWhere('email', 'LIKE', $q)
            ->orWhere('phone', 'LIKE', $q)
            ->orderBy($order_column, $request->boolean('orderDesc') ? 'desc' : 'asc')
            ->paginate($request->get('per_page'));
        return ($supplier);
        //CustomerResource::collection;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $supplier = new Suppliers($request->all());
        $supplier->save();
        return response()->json('Data Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $supplier = Suppliers::find($id);
        return response()->json($supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supplier = Suppliers::findOrFail($id);
        $supplier->update($request->all());
        return response()->json([
            'status'  => 'success',
            'message' => 'Customer record updated sucessfully.',
            'data'    => ['customer_id' => $supplier->id]
        ]);
        //dd($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Suppliers::find($id);
        $supplier->delete();
        return response()->json([
            'message' => "Customer $supplier->name deleted successfully."
        ]);
    }
}
