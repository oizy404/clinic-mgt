<?php

namespace App\Http\Controllers;
use App\Models\PatientProfile;
use App\Models\HealthEvaluation;
use App\Models\Position;
use App\Models\Department;
use App\Models\YearLevel;
use App\Models\MedicalSupply;
use App\Models\MedType;
use App\Models\Complaint;

use App\Charts\SampleChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function medicalSupplyIndex(){
        $bed = Position::where('department_id', 1)->orWhere('personnel_rank', '')->count();
        $jhs = Position::where('department_id', 2)->orWhere('personnel_rank', '')->count();
        $shs = Position::where('department_id', 3)->orWhere('personnel_rank', '')->count();
        $college = Position::where('department_id', 4)->orWhere('personnel_rank', '')->count();

        $kinder = Position::where('yearLevel_id', 1)->orWhere('personnel_rank', '')->count();
        $grade1 = Position::where('yearLevel_id', 2)->orWhere('personnel_rank', '')->count();
        $grade2 = Position::where('yearLevel_id', 3)->orWhere('personnel_rank', '')->count();
        $grade3 = Position::where('yearLevel_id', 4)->orWhere('personnel_rank', '')->count();
        $grade4 = Position::where('yearLevel_id', 5)->orWhere('personnel_rank', '')->count();
        $grade5 = Position::where('yearLevel_id', 6)->orWhere('personnel_rank', '')->count();
        $grade6 = Position::where('yearLevel_id', 7)->orWhere('personnel_rank', '')->count();
        $grade7 = Position::where('yearLevel_id', 8)->orWhere('personnel_rank', '')->count();
        $grade8 = Position::where('yearLevel_id', 9)->orWhere('personnel_rank', '')->count();
        $grade9 = Position::where('yearLevel_id', 10)->orWhere('personnel_rank', '')->count();
        $grade10 = Position::where('yearLevel_id', 11)->orWhere('personnel_rank', '')->count();
        $grade11 = Position::where('yearLevel_id', 12)->orWhere('personnel_rank', '')->count();
        $grade12 = Position::where('yearLevel_id', 13)->orWhere('personnel_rank', '')->count();
        $year1 = Position::where('yearLevel_id', 14)->orWhere('personnel_rank', '')->count();
        $year2 = Position::where('yearLevel_id', 15)->orWhere('personnel_rank', '')->count();
        $year3 = Position::where('yearLevel_id', 16)->orWhere('personnel_rank', '')->count();
        $year4 = Position::where('yearLevel_id', 17)->orWhere('personnel_rank', '')->count();

        $patientDept = new SampleChart;
            $patientDept->height(200);
            $patientDept->labels([
                'Elementary',
                'Junior High School',
                'Senior High School',
                'College',
            ]);
            $patientDept->dataset('Students', 'bar', [
                $bed, 
                $jhs,
                $shs,
                $college,
            ])
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(207, 64, 145, 0.6)');
        $patientGrade = new SampleChart;
            $patientGrade->height(200);
            $patientGrade->labels([
                'kinder', 'grade1', 'grade2', 'grade3',
                'grade4', 'grade5', 'grade6', 'grade7',
                'grade8', 'grade9', 'grade10', 'grade11',
                'grade12', 'year1', 'year2', 'year3', 'year4'
            ]);
            $patientGrade->dataset('Students','line',[
                $kinder, $grade1, $grade2, $grade3,
                $grade4, $grade5, $grade6, $grade7,
                $grade8, $grade9, $grade10, $grade11,
                $grade12, $year1, $year2, $year3, $year4
            ])
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(36, 145, 132, 0.6)');      

        $patientStudent = PatientProfile::where('patient_role', 'Student')->count();
        $patientEmployee = PatientProfile::where('patient_role', 'Employee')->count();
        $patientVisitor = PatientProfile::where('patient_role', 'Visitor')->count();

        $patient = new SampleChart;
            $patient->height(200);
            $patient->labels([
                'Student',
                'Employee',
                'Visitor',
            ]);
            $patient->dataset('Patient', 'pie', [
                $patientStudent,
                $patientEmployee,
                $patientVisitor,
            ])
            // $med_supplies->dataset('Medical Supply Inventory', 'bar', []);
            ->options([
                'backgroundColor' => [
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(193, 112, 196)',
                ],
            ]);
            $patient->displayAxes(false)
                ->displayLegend(false);


        //Chief Complaints
        $countCC = DB::table('tbl_chief_complaints')
            ->join('tbl_complaints', 'tbl_chief_complaints.id', '=', 'tbl_complaints.chief_complaints_id')
            ->select('tbl_chief_complaints.*','tbl_complaints.chief_complaints_id')
            ->orderBy('tbl_complaints.created_at','asc')
            ->pluck('chief_complaint');

        $head_ache = Complaint::where('chief_complaints_id', 1)->count();
        $stomach_ache = Complaint::where('chief_complaints_id', 2)->count();
        $tooth_ache = Complaint::where('chief_complaints_id', 3)->count();
        $difficulty_breathing = Complaint::where('chief_complaints_id', 4)->count();
        $abdominal_pain = Complaint::where('chief_complaints_id', 5)->count();
        $fever = Complaint::where('chief_complaints_id', 6)->count();
        $dizziness = Complaint::where('chief_complaints_id', 7)->count();
        $dysmenorrhea = Complaint::where('chief_complaints_id', 8)->count();
        $diarhea = Complaint::where('chief_complaints_id', 9)->count();
        $vomiting  = Complaint::where('chief_complaints_id', 10)->count();

        $chief_compt = new SampleChart;
        $chief_compt->height(200); 
        $chief_compt->labels($countCC);

        $chief_compt->dataset('Chief Complaint','bar',[
            $head_ache,
            $stomach_ache,
            $tooth_ache,
            $difficulty_breathing,
            $abdominal_pain,
            $fever,
            $dizziness,
            $dysmenorrhea,
            $diarhea,
            $vomiting,
        ])
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(207, 64, 145, 0.6)');


        // Medical Supplies Inventory Chart

        $count = DB::table('tbl_med_types')
            ->join('tbl_medical_supplies', 'tbl_med_types.id', '=', 'tbl_medical_supplies.med_type_id')
            ->select('tbl_med_types.*','tbl_medical_supplies.med_type_id')
            ->orderBy('tbl_medical_supplies.created_at','asc')
            ->pluck('medicine_type');
        $quantities = MedicalSupply::orderBy('created_at')->pluck('quantity');
        $stocks = MedicalSupply::orderBy('created_at')->pluck('stock');

        $med_suppliess = new SampleChart;
        $med_suppliess->height(200); 
        $med_suppliess->labels($count);
        $med_suppliess->dataset('Quantity','bar',$quantities)
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(207, 64, 145, 0.6)');
        $med_suppliess->dataset('Stocks','line',$stocks->values())
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(36, 145, 132, 0.6)');
                
            $capsuleQunatity = MedicalSupply::where('med_type_id',1)->value('quantity');
            $capsuleStock = MedicalSupply::where('med_type_id',1)->value('stock');
            $capsules = $capsuleQunatity - $capsuleStock;

            $creamQunatity = MedicalSupply::where('med_type_id',2)->value('quantity');
            $creamStock = MedicalSupply::where('med_type_id',2)->value('stock');
            $cream = $creamQunatity - $creamStock;

            $dropQunatity = MedicalSupply::where('med_type_id',3)->value('quantity');
            $dropStock = MedicalSupply::where('med_type_id',3)->value('stock');
            $drops = $dropQunatity - $dropStock;

            $patchesQunatity = MedicalSupply::where('med_type_id',4)->value('quantity');
            $patchesStock = MedicalSupply::where('med_type_id',4)->value('stock');
            $patches = $patchesQunatity - $patchesStock;

            $inhalersQunatity = MedicalSupply::where('med_type_id',5)->value('quantity');
            $inhalersStock = MedicalSupply::where('med_type_id',5)->value('stock');
            $inhalers = $inhalersQunatity - $inhalersStock;

            $injectionsQunatity = MedicalSupply::where('med_type_id',6)->value('quantity');
            $injectionsStock = MedicalSupply::where('med_type_id',6)->value('stock');
            $injections = $injectionsQunatity - $injectionsStock;

            $liquidQunatity = MedicalSupply::where('med_type_id',7)->value('quantity');
            $liquidStock = MedicalSupply::where('med_type_id',7)->value('stock');
            $liquid = $liquidQunatity - $liquidStock;

            $soppositoriesQunatity = MedicalSupply::where('med_type_id',8)->value('quantity');
            $soppositoriesStock = MedicalSupply::where('med_type_id',8)->value('stock');
            $soppositories = $soppositoriesQunatity - $soppositoriesStock;

            $tabletQunatity = MedicalSupply::where('med_type_id',9)->value('quantity');
            $tabletStock = MedicalSupply::where('med_type_id',9)->value('stock');
            $tablet = $tabletQunatity - $tabletStock;


            $med_suppliesReleased = new SampleChart;
            $med_suppliesReleased->height(200);
            $med_suppliesReleased->labels([
                'Capsules','Cream',
                'Drops','Implant or Patches',
                'Inhalers','Injections',
                'Liquid','Soppositories',
                'Tablet'
            ]);
            $med_suppliesReleased->dataset('Released Medical Supplies', 'doughnut', [
                $capsules, $cream,
                $drops,$patches,
                $inhalers,$injections,
                $liquid,$soppositories,
                $tablet
            ])
            // $med_supplies->dataset('Medical Supply Inventory', 'bar', []);
            ->options([
                'backgroundColor' => [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(201, 203, 207)',
                    'rgb(75, 192, 192)',
                    'rgb(221, 165, 83)',
                    'rgb(193, 112, 196)',
                    'rgb(88, 203, 70)',
                ],
            ]);
            $med_suppliesReleased->displayAxes(false)
                ->displayLegend(false);
               
        // Medical Supplies Inventory Chart end

        return view("pages.clinic_staff.clinicstaff-dashboard", compact(
            "patientDept",
            "patientGrade",
            "patient",
            "med_suppliesReleased",
            "med_suppliess",
            "chief_compt",
        ));
    }
}
