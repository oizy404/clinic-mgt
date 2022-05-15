<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html());
        return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
        $output = `
            <div class="row mb-4">
                <div class="col-md-7">
                    <div class="col mb-3">
                        <h5>Patient School Department Chart</h5><hr>
                    
                        {!! $patientDept_month->container() !!}
                    </div>
                    <div class="col">
                        <h5>Patient School Year Level Chart</h5><hr>
                    
                        {!! $patientGrade_month->container() !!}
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card patientMonth">
                        <div class="card-header">
                            <h5>Patient Chart</h5><hr>
                        </div>
                        <div class="card-body">
                            {!! $patient_month->container() !!}
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <h5>Chief Complaints Chart</h5><hr>
                
                    {!! $chief_compt_month->container() !!}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5>Medical Products Quantity and Stocks Chart</h5><hr>
                
                    {!! $med_suppliess_month->container() !!}
                </div>
            </div>
            {!! $patientDept_month->script() !!}
            {!! $patientGrade_month->script() !!}
            {!! $patient_month->script() !!}
            {!! $med_suppliess_month->script() !!}
            {!! $chief_compt_month->script() !!}
        `;
        return $output;
    }
}
