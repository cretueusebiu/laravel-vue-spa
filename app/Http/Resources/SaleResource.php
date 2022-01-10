<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $items = $this->items->map(function($item){
            return [
                'id'        => $item->line,
                'item_id'   => $item->item_id,
                'name'      => $item->item->name,
                'price'     => round($item->item_unit_price, 2),
                'quantity'  => round($item->quantity_purchased, 2),
            ];
        });
        $invoice_total = $this->items->sum(function ($item) {
            return $item->item_unit_price * $item->quantity_purchased;
        });
        $payment_total = $this->payments->sum(function ($payment) {
            if($payment->payment_type != 'Due'){
                return $payment->payment_amount - $payment->cash_refund;
            }
            return 0;
        });

        $customer = [
            'name'          => $this->customer->person->name,
            'company_name'  => $this->customer->company_name,
            'address_1'     => $this->customer->person->address_1,
            'city'          => $this->customer->person->city,
            'state'         => $this->customer->person->state,
            'zip'           => $this->customer->person->zip,
            'country'       => $this->customer->person->country,
            'phone'         => $this->customer->person->phone_number,
            'email'         => $this->customer->person->email,
        ];

        return [
            'id'        => $this->sale_id,
            'sale_time' => $this->sale_time,
            'customer'  => $customer,
            'items'     => $items,
            'total'     => $invoice_total,
            'payment'   => $payment_total,
            'balance'   => $invoice_total - $payment_total,
            'comment'   => $this->comment,
        ];
    }
}
