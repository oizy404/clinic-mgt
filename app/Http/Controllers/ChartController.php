<?php

namespace App\Http\Controllers;
use App\Models\MedicalSupply;
use App\Models\MedType;

use App\Charts\SampleChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function medicalSupplyIndex(){
        
        // Medical Supplies Inventory Chart
        $capsules = MedicalSupply::where('med_type_id',1)->count();
        $cream = MedicalSupply::where('med_type_id',2)->count();
        $drops = MedicalSupply::where('med_type_id',3)->count();
        $patches = MedicalSupply::where('med_type_id',4)->count();
        $inhalers = MedicalSupply::where('med_type_id',5)->count();
        $injections = MedicalSupply::where('med_type_id',6)->count();
        $liquid = MedicalSupply::where('med_type_id',7)->count();
        $soppositories = MedicalSupply::where('med_type_id',8)->count();
        $tablet = MedicalSupply::where('med_type_id',9)->count();

        $med_supplies = new SampleChart;

        $med_supplies->labels([
            'Capsules','Cream',
            'Drops','Implant or Patches',
            'Inhalers','Injections',
            'Liquid','Soppositories',
            'Tablet'
        ]);
        $med_supplies->dataset('Medical Supply Inventory', 'bar', [
            $capsules,$cream,
            $drops,$patches,
            $inhalers,$injections,
            $liquid,$soppositories,
            $tablet
        ]);
        $med_supplies->dataset('Medical Supply Inventory', 'bar', []);
        // ->options([
        //     'backgroundColor' => [
        //         'rgb(255, 99, 132)',
        //         'rgb(54, 162, 235)',
        //         'rgb(255, 205, 86)',
        //         'rgb(75, 192, 192)',
        //         'rgb(201, 203, 207)',
        //         'rgb(75, 192, 192)',
        //         'rgb(221, 165, 83)',
        //         'rgb(193, 112, 196)',
        //         'rgb(88, 203, 70)',
        //     ],
        // ]);
        // $med_supplies->displayAxes(false)
        //     ->displayLegend(true);
            
        // Medical Supplies Inventory Chart end

        return view("pages.admin-home")->with("med_supplies", $med_supplies);
    }
}
