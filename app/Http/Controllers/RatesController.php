<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class RatesController extends Controller
{
  public function getRate(Request $req) {
  $resp = Http::withToken(env('JWT_KEY'))->post('https://sandbox.stallionexpress.ca/api/v3/rates', [
    "name" => $req->get('name'),
  "address1" =>  $req->get('address1'),
  "address2" =>  $req->get('address2'),
  "city"=>  $req->get('city'),
  "province_code"=>  $req->get('province_code'),
  "postal_code"=>  $req->get('postal_code'),
  "country_code"=>  $req->get('country_code'),
  "weight_unit"=>  $req->get('weight_unit'),
  "weight"=>  $req->get('weight'),
  "length"=>  $req->get('length'),
  "width"=>  $req->get('width'),
  "height"=> $req->get('height'),
  "size_unit"=>  $req->get('size_unit'),
  "package_contents"=>  $req->get('package_contents'),
  "value"=> $req->get('value'),
  "currency"=> $req->get('currency'),
  "package_type"=>  $req->get('package_type'),
  "signature_confirmation"=>  $req->get('signature_confirmation'),
  "purchase_label"=>  $req->get('purchase_label'),
  "insured"=>  $req->get('insured'),
  "region"=>  $req->get('region')
    ]);
  
    return $resp->json();
    }
}
