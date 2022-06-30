<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $employee = Employee::all()->toArray();
        // //return array_reverse($employee);
        // dd($employee);

        // 
        $order_column = $request->get('orderBy');
        if (!in_array($order_column, ['id', 'name', 'email', 'phone', 'created_at'])) {
            $order_column = 'id';
        }
        $q =  '%' . $request->input('q') . '%';
        $employee = Employee::where('name', 'LIKE', $q)
            ->orWhere('email', 'LIKE', $q)
            ->orWhere('phone', 'LIKE', $q)
            ->orderBy($order_column, $request->boolean('orderDesc') ? 'desc' : 'asc')
            ->paginate($request->get('per_page'));
        return ($employee);
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

        $employee = new Employee($request->all());
        $employee->save();
        return response()->json(['status' => 'success', 'data' => ['customer_id' => $employee->id]]);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return response()->json([
            'status'  => 'success',
            'message' => 'Customer record updated sucessfully.',
            'data'    => ['customer_id' => $employee->id]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json([
            'message' => "Employer $employee->name deleted successfully."
        ]);
    }
}
