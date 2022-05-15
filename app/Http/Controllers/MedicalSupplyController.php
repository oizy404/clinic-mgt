<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MedicalSupply;
use App\Models\MedType;
use App\Models\PackagingType;
use App\Models\MedicalReleasedHistory;
use Brian2694\Toastr\Facades\Toastr;


use Carbon\Carbon;

class MedicalSupplyController extends Controller
{
    public function index(){
        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $med_types = MedType::all();
        $packaging_types = PackagingType::all();

        // $med_supplies = MedicalSupply::pluck('purchase_date');

        // $med_supplies = MedicalSupply::where([
        //     ['expiry_date', '>', date('Y-m-d', strtotime($dt))],
        //     ['expiry_date', '>', date('Y-m-d', strtotime('+2 months'))],
        // ])->get();

        $med_supplies = MedicalSupply::groupBy('product_name','med_type_id')->selectRaw('sum(stock) as stock, product_name, med_type_id')
        ->where([
            ['expiry_date', '>', date('Y-m-d', strtotime($dt))],
            ['expiry_date', '>', date('Y-m-d', strtotime('+2 months'))],
            ['archived','=', 0]
        ])->orderBy('updated_at','asc')->get('id');

        // dd($med_supplies);
        $expiring_products = MedicalSupply::where([
            ['expiry_date', '>', date('Y-m-d', strtotime($dt))],
            ['expiry_date', '<=', date('Y-m-d', strtotime('+2 months'))],
            ['stock', '>=', 1],
        ])->get();

        $expired_products = MedicalSupply::where('expiry_date', '<=', $dt)->get();


        foreach($expiring_products as $expiring_product){
            Toastr::warning('Product <strong>'.$expiring_product->product_name.'</strong> is soon to expire, check on <strong>Expiring Products Table.</strong>','Warning!!');
        }
        return view("pages.clinic_staff.medical-inventory.medical-supplies-inventory", compact(
            "med_supplies",
            "med_types",
            "packaging_types",
            "expiring_products",
            "expired_products",
        ));
    }
    
    public function insert(Request $request){

        $med_supply = new MedicalSupply();
        $med_supply->product_name = $request->product_name;
        $med_supply->generic_name = $request->generic_name;
        $med_supply->med_type_id = $request->medicine_type;
        $med_supply->packaging_id = $request->packaging_type;
        $med_supply->quantity = $request->quantity;
        $med_supply->stock = $request->stock;
        $med_supply->expiry_date = $request->expiry_date;
        $med_supply->purchase_date = $request->purchase_date;
        $med_supply->lot_number = $request->lot_num;
        $med_supply->supplier = $request->supplier;
        $med_supply->archived = 0;

        $med_supply->save();

        return redirect()->back();
    }
    public function show($product_name){
        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        
        $med_types = MedType::all();
        $packaging_types = PackagingType::all();

        $med_supplies = MedicalSupply::where('product_name',$product_name)
        ->orWhere([
            ['expiry_date', '>', date('Y-m-d', strtotime($dt))],
            ['expiry_date', '>', date('Y-m-d', strtotime('+2 months'))],
        ])->get();
        return view("pages.clinic_staff.medical-inventory.show-medical-supplies", compact(
            "med_supplies",
            "med_types",
            "packaging_types"
        ));
    }

    public function edit($id){
        $med_supply = MedicalSupply::find($id);

        return view("pages.clinic_staff.medical-inventory.edit-medical-record", compact(
            "med_supply",
        ));
    }

    public function update(Request $request, $id){

        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $med_supply = MedicalSupply::find($id);
        $medStocks = MedicalSupply::where('id', $id)->value('stock');
        $pieces = $request->quantity;

        $med_supply->product_name = $request->product_name;
        $med_supply->med_type_id = $request->medicine_type;
        $stock = $medStocks - $pieces;
        $med_supply->stock = $stock;
        $med_supply->archived = 0;
        $med_supply->save();

        $medReleased = new MedicalReleasedHistory();
        $medReleased->med_supply_id = $med_supply->id;
        $medReleased->quantity = $request->quantity;
        $medReleased->receiver_name = $request->reciever_name;
        $medReleased->released_date = $todayDate;

        $medReleased->save();
        return redirect()->route('medical-supplies-inventory');
    }
    public function releasedMedsView(){
        $med_supplies = MedicalSupply::all();
        // foreach($med_supplies as $med_supply){
        //     foreach($med_supply->med_release as $medss){
        //         dd($medss->quantity);
        //     }
        // }
        return view("pages.clinic_staff.medical-inventory.released-medical-supplies", compact(
            "med_supplies",
        ));
    }

    public function archive($id, Request $request){
        $med_supply = MedicalSupply::find($id);
        $med_supply->archived = 1;
        $med_supply->save();
        
        return redirect()->back();
    }
}
