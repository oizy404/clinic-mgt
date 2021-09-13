<?php

namespace App\Http\Controllers;
use App\Models\MedicalSupply;
use App\Models\MedType;

use Illuminate\Http\Request;

class MedicalSupplyController extends Controller
{
    public function index(){
        $med_supplies = MedicalSupply::all();
        $med_types = MedType::all();
        
        return view("pages.medical-supplies-inventory")->with("med_supplies", $med_supplies)->with("med_types", $med_types);
    }
    public function add(){
        $med_types = MedType::all();
        return view("pages.add-medical-supplies")->with("med_types", $med_types);
    }
    
    public function insert(Request $request){

        $med_supply = new MedicalSupply();
        $med_supply->product_name = $request->product_name;
        $med_supply->med_type_id = $request->medicine_type;
        $med_supply->quantity = $request->quantity;
        $med_supply->stock = $request->stock;
        $med_supply->expiry_date = $request->expiry_date;
        $med_supply->purchase_date = $request->purchase_date;

        $med_supply->save();

        return redirect()->back();

    }
}
