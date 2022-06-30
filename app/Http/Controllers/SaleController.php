<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use Exception;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = [];
        foreach(Sale::with('customer')->orderBy('sale_id', 'desc')->get() as $sale){
            $sales[] = [
                'id'            => $sale->sale_id,
                'sale_time'     => $sale->sale_time,
                'customer_name' => $sale->customer ? $sale->customer->person->first_name . ' ' . $sale->customer->person->last_name : 'No Cust',
            ];
        }
        return $sales;
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
    public function store(SaleRequest $request)
    {
        try{
            $sale = new Sale();
            $sale->customer_id = $request->input('customer_id') ?: NULL;
            $sale->employee_id = auth()->id();
            $sale->sale_time = $request->input('sale_time') ?: Date('Y-m-d H:i:s');
            $items = $request->input('invoiceItems');
            if(!$items){
                return response()->json(['status' => 'error', 'data' => [], 'message' => 'One item required'], 422);
            }
            $sale->save();
            $sale_items = [];
            foreach($items as $item){
                $sale_items[] = [
                    'item_id'               => $item['item_id'],
                    'quantity_purchased'    => $item['quantity'],
                    'item_cost_price'       => 0,
                    'item_unit_price'       => $item['price'],
                ];
            }
            $sale->items()->createMany($sale_items);
            return response()->json(['status' => 'success', 'data' => ['sale_id' => $sale->id]]);

        }
        catch(Exception $ex){
            $sale->delete();
            return response()->json(['status' => 'error', 'data' => [], 'message' => $ex->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return new SaleResource($sale);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->items()->delete();
        $sale->delete();
        return response()->json([
            'status'  => 'success',
            'message' => 'Invoice deleted successfully.',
            'data'    => []
        ]);
    }
}
