<?php

namespace App\Http\Controllers;
use App\Models\PatientProfile;
use App\Models\Visitor;
use App\Models\HealthEvaluation;
use App\Models\Position;
use App\Models\Department;
use App\Models\YearLevel;
use App\Models\MedicalSupply;
use App\Models\MedType;
use App\Models\Complaint;

use App\Charts\SampleChart;
use App\Charts\WeeklyReportChart;
use App\Charts\MonthlyReportChart;
use App\Charts\YearlyReportChart;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Carbon\Carbon;


class ChartController extends Controller
{
    public function medicalSupplyIndex(){

    // PER DAY // ----------------------------------------------------------------------------------------------

        //PATIENT SCHOOL DEPARTMENT --------------------------------------------------------------

        $bed = Position::whereDate('created_at', Carbon::today())->where('department_id', 1)->orWhere('personnel_rank', '')->count();
        $jhs = Position::whereDate('created_at', Carbon::today())->where('department_id', 2)->orWhere('personnel_rank', '')->count();
        $shs = Position::whereDate('created_at', Carbon::today())->where('department_id', 3)->orWhere('personnel_rank', '')->count();
        $college = Position::whereDate('created_at', Carbon::today())->where('department_id', 4)->orWhere('personnel_rank', '')->count();

        // dd($college);

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
            ->backgroundColor('rgba(500, 60, 140, 0.6)');

        // PATIENT SCHOOL YEAR LEVEL -----------------------------------------------------------

        $kinder = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 1)->orWhere('personnel_rank', '')->count();
        $grade1 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 2)->orWhere('personnel_rank', '')->count();
        $grade2 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 3)->orWhere('personnel_rank', '')->count();
        $grade3 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 4)->orWhere('personnel_rank', '')->count();
        $grade4 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 5)->orWhere('personnel_rank', '')->count();
        $grade5 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 6)->orWhere('personnel_rank', '')->count();
        $grade6 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 7)->orWhere('personnel_rank', '')->count();
        $grade7 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 8)->orWhere('personnel_rank', '')->count();
        $grade8 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 9)->orWhere('personnel_rank', '')->count();
        $grade9 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 10)->orWhere('personnel_rank', '')->count();
        $grade10 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 11)->orWhere('personnel_rank', '')->count();
        $grade11 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 12)->orWhere('personnel_rank', '')->count();
        $grade12 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 13)->orWhere('personnel_rank', '')->count();
        $year1 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 14)->orWhere('personnel_rank', '')->count();
        $year2 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 15)->orWhere('personnel_rank', '')->count();
        $year3 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 16)->orWhere('personnel_rank', '')->count();
        $year4 = Position::whereDate('created_at', Carbon::today())->where('yearLevel_id', 17)->orWhere('personnel_rank', '')->count();

        
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

        // PATIENT COUNT --------------------------------------------------------------------------

        $patientStudent = PatientProfile::whereDate('created_at', Carbon::today())->where('patient_role', 'Student')->count();
        $patientEmployee = PatientProfile::whereDate('created_at', Carbon::today())->where('patient_role', 'Employee')->count();
        $patientVisitor = Visitor::whereDate('created_at', Carbon::today())->where('patient_role', 'Visitor')->count();

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
            ->options([
                'backgroundColor' => [
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(193, 112, 196)',
                ],
            ]);
            $patient->displayAxes(false)
                ->displayLegend(true);


        //Chief Complaints ------------------------------------------------------------------------------------
        // $countCC = DB::table('tbl_chief_complaints')
        //     ->join('tbl_complaints', 'tbl_chief_complaints.id', '=', 'tbl_complaints.chief_complaints_id')
        //     ->select('tbl_chief_complaints.*','tbl_complaints.chief_complaints_id')
        //     ->orderBy('tbl_complaints.created_at','asc')
        //     ->pluck('chief_complaint');

        $head_ache = Complaint::whereDate('created_at', Carbon::today())->where('chief_complaints_id', 1)->count();
        $stomach_ache = Complaint::whereDate('created_at', Carbon::today())->where('chief_complaints_id', 2)->count();
        $tooth_ache = Complaint::whereDate('created_at', Carbon::today())->where('chief_complaints_id', 3)->count();
        $difficulty_breathing = Complaint::whereDate('created_at', Carbon::today())->where('chief_complaints_id', 4)->count();
        $abdominal_pain = Complaint::whereDate('created_at', Carbon::today())->where('chief_complaints_id', 5)->count();
        $fever = Complaint::whereDate('created_at', Carbon::today())->where('chief_complaints_id', 6)->count();
        $dizziness = Complaint::whereDate('created_at', Carbon::today())->where('chief_complaints_id', 7)->count();
        $dysmenorrhea = Complaint::whereDate('created_at', Carbon::today())->where('chief_complaints_id', 8)->count();
        $diarhea = Complaint::whereDate('created_at', Carbon::today())->where('chief_complaints_id', 9)->count();
        $vomiting  = Complaint::whereDate('created_at', Carbon::today())->where('chief_complaints_id', 10)->count();

        $chief_compt = new SampleChart;
        $chief_compt->height(200); 
        $chief_compt->labels([
            'Head Ache',
            'Stomach Ache',
            'Tooth Ache',
            'Dificulty Breathing',
            'Abdominal Pain',
            'Fever',
            'Dizziness',
            'Dysmenorrhea',
            'Diarhea',
            'Vomiting'
        ]);

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


        // Medical Supplies Inventory Chart ------------------------------------------------------------


        $productName = MedicalSupply::whereDate('created_at', Carbon::today())
                        ->where([
                            ['expiry_date', '>', date('Y-m-d', strtotime(Carbon::now()))],
                            ['archived','=', 0],
                            ])->orderBy('updated_at','asc')->groupBy('product_name')->pluck('product_name');
        $productStocts = MedicalSupply::groupBy('product_name')->selectRaw('sum(stock) as sum, product_name')
                    ->whereDate('created_at', Carbon::today())->where([
                        ['expiry_date', '>', date('Y-m-d', strtotime(Carbon::now()))],
                        ['archived','=', 0],
                        ])->orderBy('updated_at','asc')->pluck('sum','product_name');
        $productQuantity = MedicalSupply::groupBy('product_name')->selectRaw('sum(quantity) as sum')
                    ->whereDate('created_at', Carbon::today())->where([
                        ['expiry_date', '>', date('Y-m-d', strtotime(Carbon::now()))],
                        ['archived','=', 0],
                        ])->orderBy('updated_at','asc')->pluck('sum');

        $med_suppliess = new SampleChart;
        $med_suppliess->height(200); 
        $med_suppliess->labels($productName);
        $med_suppliess->dataset('Quantity','bar',$productQuantity)
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(207, 64, 145, 0.6)');
        $med_suppliess->dataset('Stocks','line',$productStocts->values())
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(36, 145, 132, 0.6)');


    //----------------------- WEEKLY REPORTS ---------------------------------------------------------------------------------
    
        $bed_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('department_id', 1)->orWhere('personnel_rank', '')->count();
        $jhs_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('department_id', 2)->orWhere('personnel_rank', '')->count();
        $shs_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('department_id', 3)->orWhere('personnel_rank', '')->count();
        $college_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()] )->where('department_id', 4)->orWhere('personnel_rank', '')->count();

        $patientDept_week = new WeeklyReportChart;
            $patientDept_week->height(200);
            $patientDept_week->labels([
                'Elementary',
                'Junior High School',
                'Senior High School',
                'College',
            ]);
            $patientDept_week->dataset('Students', 'bar', [
                $bed_week, 
                $jhs_week,
                $shs_week,
                $college_week,
            ])->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(500, 60, 140, 0.6)');

        // PATIENT SCHOOL YEAR LEVEL -----------------------------------------------------------

        $kinder_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 1)->orWhere('personnel_rank', '')->count();
        $grade1_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 2)->orWhere('personnel_rank', '')->count();
        $grade2_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 3)->orWhere('personnel_rank', '')->count();
        $grade3_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 4)->orWhere('personnel_rank', '')->count();
        $grade4_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 5)->orWhere('personnel_rank', '')->count();
        $grade5_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 6)->orWhere('personnel_rank', '')->count();
        $grade6_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 7)->orWhere('personnel_rank', '')->count();
        $grade7_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 8)->orWhere('personnel_rank', '')->count();
        $grade8_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 9)->orWhere('personnel_rank', '')->count();
        $grade9_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 10)->orWhere('personnel_rank', '')->count();
        $grade10_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 11)->orWhere('personnel_rank', '')->count();
        $grade11_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 12)->orWhere('personnel_rank', '')->count();
        $grade12_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 13)->orWhere('personnel_rank', '')->count();
        $year1_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 14)->orWhere('personnel_rank', '')->count();
        $year2_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 15)->orWhere('personnel_rank', '')->count();
        $year3_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 16)->orWhere('personnel_rank', '')->count();
        $year4_week = Position::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('yearLevel_id', 17)->orWhere('personnel_rank', '')->count();

        
        $patientGrade_week = new WeeklyReportChart;
            $patientGrade_week->height(200);
            $patientGrade_week->labels([
                'kinder', 'grade1', 'grade2', 'grade3',
                'grade4', 'grade5', 'grade6', 'grade7',
                'grade8', 'grade9', 'grade10', 'grade11',
                'grade12', 'year1', 'year2', 'year3', 'year4'
            ]);
            $patientGrade_week->dataset('Students','line',[
                $kinder_week, $grade1_week, $grade2_week, $grade3_week,
                $grade4_week, $grade5_week, $grade6_week, $grade7_week,
                $grade8_week, $grade9_week, $grade10_week, $grade11_week,
                $grade12_week, $year1_week, $year2_week, $year3_week, $year4_week
            ])
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(36, 145, 132, 0.6)');      

        // PATIENT COUNT --------------------------------------------------------------------------

        $patientStudent_week = PatientProfile::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('patient_role', 'Student')->count();
        $patientEmployee_week = PatientProfile::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('patient_role', 'Employee')->count();
        $patientVisitor_week = Visitor::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('patient_role', 'Visitor')->count();

        $patient_week = new WeeklyReportChart;
            $patient_week->height(200);
            $patient_week->labels([
                'Student',
                'Employee',
                'Visitor',
            ]);
            $patient_week->dataset('Patient', 'pie', [
                $patientStudent_week,
                $patientEmployee_week,
                $patientVisitor_week,
            ])
            ->options([
                'backgroundColor' => [
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(193, 112, 196)',
                ],
            ]);
            $patient_week->displayAxes(false)
                ->displayLegend(true);


        //Chief Complaints ------------------------------------------------------------------------------------
        // $countCC_week = DB::table('tbl_chief_complaints')
        //     ->join('tbl_complaints', 'tbl_chief_complaints.id', '=', 'tbl_complaints.chief_complaints_id')
        //     ->select('tbl_chief_complaints.*','tbl_complaints.chief_complaints_id')
        //     ->orderBy('tbl_complaints.created_at','asc')
        //     ->pluck('chief_complaint');

        $head_ache_week = Complaint::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('chief_complaints_id', 1)->count();
        $stomach_ache_week = Complaint::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('chief_complaints_id', 2)->count();
        $tooth_ache_week = Complaint::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('chief_complaints_id', 3)->count();
        $difficulty_breathing_week = Complaint::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('chief_complaints_id', 4)->count();
        $abdominal_pain_week = Complaint::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('chief_complaints_id', 5)->count();
        $fever_week = Complaint::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('chief_complaints_id', 6)->count();
        $dizziness_week = Complaint::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('chief_complaints_id', 7)->count();
        $dysmenorrhea_week = Complaint::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('chief_complaints_id', 8)->count();
        $diarhea_week = Complaint::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('chief_complaints_id', 9)->count();
        $vomiting_week  = Complaint::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('chief_complaints_id', 10)->count();

        $chief_compt_week = new WeeklyReportChart;
        $chief_compt_week->height(200); 
        $chief_compt_week->labels([
            'Head Ache',
            'Stomach Ache',
            'Tooth Ache',
            'Dificulty Breathing',
            'Abdominal Pain',
            'Fever',
            'Dizziness',
            'Dysmenorrhea',
            'Diarhea',
            'Vomiting'
        ]);

        $chief_compt_week->dataset('Chief Complaint','bar',[
            $head_ache_week,
            $stomach_ache_week,
            $tooth_ache_week,
            $difficulty_breathing_week,
            $abdominal_pain_week,
            $fever_week,
            $dizziness_week,
            $dysmenorrhea_week,
            $diarhea_week,
            $vomiting_week,
        ])
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(207, 64, 145, 0.6)');


        // Medical Supplies Inventory Chart ------------------------------------------------------------


        $productName_week = MedicalSupply::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                            ->where([
                                ['expiry_date', '>', date('Y-m-d', strtotime(Carbon::now()))],
                                ['archived','=', 0],
                                ])->orderBy('updated_at','asc')->groupBy('product_name')->pluck('product_name');
        $productStocts_week = MedicalSupply::groupBy('product_name')->selectRaw('sum(stock) as sum, product_name')
                            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                            ->where([
                                ['expiry_date', '>', date('Y-m-d', strtotime(Carbon::now()))],
                                ['archived','=', 0],
                                ])->orderBy('updated_at','asc')->pluck('sum','product_name');
        $productQuantity_week = MedicalSupply::groupBy('product_name')->selectRaw('sum(quantity) as sum')
                            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                            ->where([
                                ['expiry_date', '>', date('Y-m-d', strtotime(Carbon::now()))],
                                ['archived','=', 0],
                                ])->orderBy('updated_at','asc')->pluck('sum');

        $med_suppliess_week = new WeeklyReportChart;
        $med_suppliess_week->height(200); 
        $med_suppliess_week->labels($productName_week);
        $med_suppliess_week->dataset('Quantity','bar',$productQuantity_week)
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(207, 64, 145, 0.6)');
        $med_suppliess_week->dataset('Stocks','line',$productStocts_week->values())
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(36, 145, 132, 0.6)');

    //------------------------------ MONTHLY REPORTS -----------------------------------------------------------------------------

        $bed_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))
                                ->where('department_id', 1)->orWhere('personnel_rank', '')->count();
        $jhs_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))
                                ->where('department_id', 2)->orWhere('personnel_rank', '')->count();
        $shs_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))
                                ->where('department_id', 3)->orWhere('personnel_rank', '')->count();
        $college_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))
                                ->where('department_id', 4)->orWhere('personnel_rank', '')->count();
        // dd($college_month);
        $patientDept_month = new MonthlyReportChart;
            $patientDept_month->height(200);
            $patientDept_month->labels([
                'Elementary',
                'Junior High School',
                'Senior High School',
                'College',
            ]);
            $patientDept_month->dataset('Students', 'bar', [
                $bed_month, 
                $jhs_month,
                $shs_month,
                $college_month,
            ])->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(500, 60, 140, 0.6)');

        // PATIENT SCHOOL YEAR LEVEL -----------------------------------------------------------

        $kinder_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 1)->orWhere('personnel_rank', '')->count();
        $grade1_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 2)->orWhere('personnel_rank', '')->count();
        $grade2_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 3)->orWhere('personnel_rank', '')->count();
        $grade3_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 4)->orWhere('personnel_rank', '')->count();
        $grade4_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 5)->orWhere('personnel_rank', '')->count();
        $grade5_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 6)->orWhere('personnel_rank', '')->count();
        $grade6_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 7)->orWhere('personnel_rank', '')->count();
        $grade7_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 8)->orWhere('personnel_rank', '')->count();
        $grade8_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 9)->orWhere('personnel_rank', '')->count();
        $grade9_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 10)->orWhere('personnel_rank', '')->count();
        $grade10_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 11)->orWhere('personnel_rank', '')->count();
        $grade11_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 12)->orWhere('personnel_rank', '')->count();
        $grade12_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 13)->orWhere('personnel_rank', '')->count();
        $year1_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 14)->orWhere('personnel_rank', '')->count();
        $year2_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 15)->orWhere('personnel_rank', '')->count();
        $year3_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 16)->orWhere('personnel_rank', '')->count();
        $year4_month = Position::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('yearLevel_id', 17)->orWhere('personnel_rank', '')->count();

        
        $patientGrade_month = new MonthlyReportChart;
            $patientGrade_month->height(200);
            $patientGrade_month->labels([
                'kinder', 'grade1', 'grade2', 'grade3',
                'grade4', 'grade5', 'grade6', 'grade7',
                'grade8', 'grade9', 'grade10', 'grade11',
                'grade12', 'year1', 'year2', 'year3', 'year4'
            ]);
            $patientGrade_month->dataset('Students','line',[
                $kinder_month, $grade1_month, $grade2_month, $grade3_month,
                $grade4_month, $grade5_month, $grade6_month, $grade7_month,
                $grade8_month, $grade9_month, $grade10_month, $grade11_month,
                $grade12_month, $year1_month, $year2_month, $year3_month, $year4_month
            ])
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(36, 145, 132, 0.6)');      

        // PATIENT COUNT --------------------------------------------------------------------------

        $patientStudent_month = PatientProfile::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('patient_role', 'Student')->count();
        $patientEmployee_month = PatientProfile::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('patient_role', 'Employee')->count();
        $patientVisitor_month = Visitor::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('patient_role', 'Visitor')->count();

        $patient_month = new MonthlyReportChart;
            $patient_month->height(200);
            $patient_month->labels([
                'Student',
                'Employee',
                'Visitor',
            ]);
            $patient_month->dataset('Patient', 'pie', [
                $patientStudent_month,
                $patientEmployee_month,
                $patientVisitor_month,
            ])
            ->options([
                'backgroundColor' => [
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(193, 112, 196)',
                ],
            ]);
            $patient_month->displayAxes(false)
                ->displayLegend(true);


        //Chief Complaints ------------------------------------------------------------------------------------
        // $countCC_month = DB::table('tbl_chief_complaints')
        //     ->join('tbl_complaints', 'tbl_chief_complaints.id', '=', 'tbl_complaints.chief_complaints_id')
        //     ->select('tbl_chief_complaints.*','tbl_complaints.chief_complaints_id')
        //     ->orderBy('tbl_complaints.created_at','asc')
        //     ->pluck('chief_complaint');

        $head_ache_month = Complaint::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('chief_complaints_id', 1)->count();
        $stomach_ache_month = Complaint::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('chief_complaints_id', 2)->count();
        $tooth_ache_month = Complaint::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('chief_complaints_id', 3)->count();
        $difficulty_breathing_month = Complaint::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('chief_complaints_id', 4)->count();
        $abdominal_pain_month = Complaint::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('chief_complaints_id', 5)->count();
        $fever_month = Complaint::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('chief_complaints_id', 6)->count();
        $dizziness_month = Complaint::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('chief_complaints_id', 7)->count();
        $dysmenorrhea_month = Complaint::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('chief_complaints_id', 8)->count();
        $diarhea_month = Complaint::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('chief_complaints_id', 9)->count();
        $vomiting_month  = Complaint::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('chief_complaints_id', 10)->count();

        $chief_compt_month = new MonthlyReportChart;
        $chief_compt_month->height(200); 
        $chief_compt_month->labels([
            'Head Ache',
            'Stomach Ache',
            'Tooth Ache',
            'Dificulty Breathing',
            'Abdominal Pain',
            'Fever',
            'Dizziness',
            'Dysmenorrhea',
            'Diarhea',
            'Vomiting'
        ]);

        $chief_compt_month->dataset('Chief Complaint','bar',[
            $head_ache_month,
            $stomach_ache_month,
            $tooth_ache_month,
            $difficulty_breathing_month,
            $abdominal_pain_month,
            $fever_month,
            $dizziness_month,
            $dysmenorrhea_month,
            $diarhea_month,
            $vomiting_month,
        ])
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(207, 64, 145, 0.6)');


        // Medical Supplies Inventory Chart ------------------------------------------------------------


        $productName_month = MedicalSupply::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->orderBy('updated_at','asc')
                            ->where([
                                ['expiry_date', '>', date('Y-m-d', strtotime(Carbon::now()))],
                                ['archived','=', 0],
                                ])->groupBy('product_name')->pluck('product_name');
        $productStocts_month = MedicalSupply::groupBy('product_name')->selectRaw('sum(stock) as sum, product_name')
                            ->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where([
                                ['expiry_date', '>', date('Y-m-d', strtotime(Carbon::now()))],
                                ['archived','=', 0],
                                ])->orderBy('updated_at','asc')->pluck('sum','product_name');
        $productQuantity_month = MedicalSupply::groupBy('product_name')->selectRaw('sum(quantity) as sum')
                            ->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where([
                                ['expiry_date', '>', date('Y-m-d', strtotime(Carbon::now()))],
                                ['archived','=', 0],
                                ])->orderBy('updated_at','asc')->pluck('sum');
                    
        $med_suppliess_month = new MonthlyReportChart;
        $med_suppliess_month->height(200); 
        $med_suppliess_month->labels($productName_month);
        $med_suppliess_month->dataset('Quantity','bar',$productQuantity_month)
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(207, 64, 145, 0.6)');
        $med_suppliess_month->dataset('Stocks','line',$productStocts_month->values())
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(36, 145, 132, 0.6)');

    //YEARLY REPORTS // ----------------------------------------------------------------------------------------------------------
        
        $bed_year = Position::whereYear('created_at', date('Y'))->where('department_id', 1)->orWhere('personnel_rank', '')->count();
        $jhs_year = Position::whereYear('created_at', date('Y'))->where('department_id', 2)->orWhere('personnel_rank', '')->count();
        $shs_year = Position::whereYear('created_at', date('Y'))->where('department_id', 3)->orWhere('personnel_rank', '')->count();
        $college_year = Position::whereYear('created_at', date('Y'))->where('department_id', 4)->orWhere('personnel_rank', '')->count();

        // dd($college_year);

        $patientDept_year = new YearlyReportChart;
            $patientDept_year->height(200);
            $patientDept_year->labels([
                'Elementary',
                'Junior High School',
                'Senior High School',
                'College',
            ]);
            $patientDept_year->dataset('Students', 'bar', [
                $bed_year, 
                $jhs_year,
                $shs_year,
                $college_year,
            ])
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(500, 60, 140, 0.6)');

        // PATIENT SCHOOL YEAR LEVEL -----------------------------------------------------------

        $kinder_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 1)->orWhere('personnel_rank', '')->count();
        $grade1_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 2)->orWhere('personnel_rank', '')->count();
        $grade2_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 3)->orWhere('personnel_rank', '')->count();
        $grade3_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 4)->orWhere('personnel_rank', '')->count();
        $grade4_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 5)->orWhere('personnel_rank', '')->count();
        $grade5_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 6)->orWhere('personnel_rank', '')->count();
        $grade6_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 7)->orWhere('personnel_rank', '')->count();
        $grade7_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 8)->orWhere('personnel_rank', '')->count();
        $grade8_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 9)->orWhere('personnel_rank', '')->count();
        $grade9_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 10)->orWhere('personnel_rank', '')->count();
        $grade10_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 11)->orWhere('personnel_rank', '')->count();
        $grade11_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 12)->orWhere('personnel_rank', '')->count();
        $grade12_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 13)->orWhere('personnel_rank', '')->count();
        $year1_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 14)->orWhere('personnel_rank', '')->count();
        $year2_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 15)->orWhere('personnel_rank', '')->count();
        $year3_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 16)->orWhere('personnel_rank', '')->count();
        $year4_year = Position::whereYear('created_at', date('Y'))->where('yearLevel_id', 17)->orWhere('personnel_rank', '')->count();

        
        $patientGrade_year = new YearlyReportChart;
            $patientGrade_year->height(200);
            $patientGrade_year->labels([
                'kinder', 'grade1', 'grade2', 'grade3',
                'grade4', 'grade5', 'grade6', 'grade7',
                'grade8', 'grade9', 'grade10', 'grade11',
                'grade12', 'year1', 'year2', 'year3', 'year4'
            ]);
            $patientGrade_year->dataset('Students','line',[
                $kinder_year, $grade1_year, $grade2_year, $grade3_year,
                $grade4_year, $grade5_year, $grade6_year, $grade7_year,
                $grade8_year, $grade9_year, $grade10_year, $grade11_year,
                $grade12_year, $year1_year, $year2_year, $year3_year, $year4_year
            ])
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(36, 145, 132, 0.6)');      

        // PATIENT COUNT --------------------------------------------------------------------------

        $patientStudent_year = PatientProfile::whereYear('created_at', date('Y'))->where('patient_role', 'Student')->count();
        $patientEmployee_year = PatientProfile::whereYear('created_at', date('Y'))->where('patient_role', 'Employee')->count();
        $patientVisitor_year = Visitor::whereYear('created_at', date('Y'))->where('patient_role', 'Visitor')->count();

        $patient_year = new YearlyReportChart;
            $patient_year->height(200);
            $patient_year->labels([
                'Student',
                'Employee',
                'Visitor',
            ]);
            $patient_year->dataset('Patient', 'pie', [
                $patientStudent_year,
                $patientEmployee_year,
                $patientVisitor_year,
            ])
            ->options([
                'backgroundColor' => [
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(193, 112, 196)',
                ],
            ]);
            $patient_year->displayAxes(false)
                ->displayLegend(true);


        //Chief Complaints ------------------------------------------------------------------------------------
        // $countCC_year = DB::table('tbl_chief_complaints')
        //     ->join('tbl_complaints', 'tbl_chief_complaints.id', '=', 'tbl_complaints.chief_complaints_id')
        //     ->select('tbl_chief_complaints.*','tbl_complaints.chief_complaints_id')
        //     ->orderBy('tbl_complaints.created_at','asc')
        //     ->pluck('chief_complaint');

        $head_ache_year = Complaint::whereYear('created_at', date('Y'))->where('chief_complaints_id', 1)->count();
        $stomach_ache_year = Complaint::whereYear('created_at', date('Y'))->where('chief_complaints_id', 2)->count();
        $tooth_ache_year = Complaint::whereYear('created_at', date('Y'))->where('chief_complaints_id', 3)->count();
        $difficulty_breathing_year = Complaint::whereYear('created_at', date('Y'))->where('chief_complaints_id', 4)->count();
        $abdominal_pain_year = Complaint::whereYear('created_at', date('Y'))->where('chief_complaints_id', 5)->count();
        $fever_year = Complaint::whereYear('created_at', date('Y'))->where('chief_complaints_id', 6)->count();
        $dizziness_year = Complaint::whereYear('created_at', date('Y'))->where('chief_complaints_id', 7)->count();
        $dysmenorrhea_year = Complaint::whereYear('created_at', date('Y'))->where('chief_complaints_id', 8)->count();
        $diarhea_year = Complaint::whereYear('created_at', date('Y'))->where('chief_complaints_id', 9)->count();
        $vomiting_year  = Complaint::whereYear('created_at', date('Y'))->where('chief_complaints_id', 10)->count();

        $chief_compt_year = new YearlyReportChart;
        $chief_compt_year->height(200); 
        $chief_compt_year->labels([
            'Head Ache',
            'Stomach Ache',
            'Tooth Ache',
            'Dificulty Breathing',
            'Abdominal Pain',
            'Fever',
            'Dizziness',
            'Dysmenorrhea',
            'Diarhea',
            'Vomiting'
        ]);

        $chief_compt_year->dataset('Chief Complaint','bar',[
            $head_ache_year,
            $stomach_ache_year,
            $tooth_ache_year,
            $difficulty_breathing_year,
            $abdominal_pain_year,
            $fever_year,
            $dizziness_year,
            $dysmenorrhea_year,
            $diarhea_year,
            $vomiting_year,
        ])
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(207, 64, 145, 0.6)');


        // Medical Supplies Inventory Chart ------------------------------------------------------------


        $productName_year = MedicalSupply::whereYear('created_at', date('Y'))
            ->where([
                ['expiry_date', '>', date('Y-m-d', strtotime(Carbon::now()))],
                ['archived','=', 0],
                ])
                ->orderBy('updated_at','asc')->groupBy('product_name')->pluck('product_name');
        $productStocts_year = MedicalSupply::groupBy('product_name')->selectRaw('sum(stock) as sum, product_name')
                    ->whereYear('created_at', date('Y'))->where([
                        ['expiry_date', '>', date('Y-m-d', strtotime(Carbon::now()))],
                        ['archived','=', 0],
                        ])->orderBy('updated_at','asc')->pluck('sum','product_name');
        $productQuantity_year = MedicalSupply::groupBy('product_name')->selectRaw('sum(quantity) as sum')
                    ->whereYear('created_at', date('Y'))->where([
                        ['expiry_date', '>', date('Y-m-d', strtotime(Carbon::now()))],
                        ['archived','=', 0],
                        ])->orderBy('updated_at','asc')->pluck('sum');
            // dd($productQuantity_year);
        $med_suppliess_year = new YearlyReportChart;
        $med_suppliess_year->height(200); 
        $med_suppliess_year->labels($productName_year);
        $med_suppliess_year->dataset('Quantity','bar',$productQuantity_year)
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(207, 64, 145, 0.6)');
        $med_suppliess_year->dataset('Stocks','line',$productStocts_year->values())
            ->color('rgba(34, 50, 145, 0.7)')
            ->backgroundColor('rgba(36, 145, 132, 0.6)');

        return view("pages.clinic_staff.clinicstaff-dashboard", compact(
            "patientDept",
            "patientGrade",
            "patient",
            "med_suppliess",
            "chief_compt",
            "patientDept_week",
            "patientGrade_week",
            "patient_week",
            "med_suppliess_week",
            "chief_compt_week",
            "patientDept_month",
            "patientGrade_month",
            "patient_month",
            "med_suppliess_month",
            "chief_compt_month",
            "patientDept_year",
            "patientGrade_year",
            "patient_year",
            "med_suppliess_year",
            "chief_compt_year",
        ));
    }
}
