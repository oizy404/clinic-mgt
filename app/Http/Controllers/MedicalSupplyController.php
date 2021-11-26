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

    public function show($id){
        $med_supply  = MedicalSupply::find($id);
        return view('pages.show-medical-supplies')->with("med_supply", $med_supply);
    }

    public function edit($id){
        $med_supply = MedicalSupply::find($id);
        $med_types = MedType::all();

        return view("pages.edit-medical-record")->with("med_supply", $med_supply)->with("med_types", $med_types);
        // return view ('pages.associate.clients.clients_list')
        // ->with( compact('modes',$modes,
        //                 'corporates',$corporates,
        //                 'taxForms',$taxForms,
                        
        // ));
    }

    public function update(Request $request, $id){
        $med_supply = MedicalSupply::find($id);
        $med_supply->product_name = $request->product_name;
        $med_supply->med_type_id = $request->medicine_type;
        $med_supply->quantity = $request->quantity;
        $med_supply->stock = $request->stock;
        $med_supply->expiry_date = $request->expiry_date;
        $med_supply->purchase_date = $request->purchase_date;

        $med_supply->save();
        return redirect()->route('medical-supplies-inventory');
    }

    public function delete($id){
        $med_supply = MedicalSupply::find($id);
        $med_supply->delete(); //delete a column

        return redirect()->back();
    }
}
