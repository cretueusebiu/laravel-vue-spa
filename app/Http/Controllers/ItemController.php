<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $order_column = $request->get('orderBy');
    if (!in_array($order_column, ['id', 'name', 'email', 'phone', 'created_at'])) {
      $order_column = 'id';
    }
    $q =  '%' . $request->input('q') . '%';
    $items = Item::where('item_name', 'LIKE', $q)
      ->orWhere('category', 'LIKE', $q)
      ->orWhere('item_type', 'LIKE', $q)
      ->orderBy($order_column, $request->boolean('orderDesc') ? 'desc' : 'asc')
      ->paginate($request->get('per_page'));
    return ItemResource::collection($items);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function search(Request $request)
  {
    $items = Item::where('item_name', 'LIKE', '%' . $request->input('q') . '%')->get();
    return response()->json($items);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\ItemRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ItemRequest $request)
  {
    $item = new Item($request->validated());
    $item->save();
    return response()->json([
      'status'  => 'success',
      'message' => 'Item record added sucessfully.',
      'data'    => ['item_id' => $item->id]
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function show(Item $item)
  {
    return response()->json(['status' => 'success', 'data' => $item]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function edit(Item $item)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\ItemRequest  $request
   * @param  \App\Models\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function update(ItemRequest $request, Item $item)
  {
    $item->fill($request->all());
    $item->save();

    return response()->json([
      'status'  => 'success',
      'message' => 'Item record updated sucessfully.',
      'data'    => ['item_id' => $item->id]
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function destroy(Item $item)
  {
    $item->delete();
    return response()->json([
      'message' => "Customer $item->item_name deleted successfully."
    ]);
  }
}
