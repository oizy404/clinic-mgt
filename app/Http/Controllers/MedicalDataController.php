<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalDataController extends Controller
{
        //STUDENTS MEDICAL DATA1 (DISEASES)
        public function deseaseIndex(){
                $tbl_deseases = Desease::all();
                return view("pages.student-health-data")->with("tbl_deseases", $tbl_deseases);
        }
        public function deseaseInsert(){
                foreach($request->mddisease as $disease){
                        $tbl_desease = Desease::create([
                                'desease_name' =>$disease,
                        ]);
                }
                return redirect()->route('student-health-data');
        }
        // public function deseaseShow(){
    
        // }
        // public function deseaseEdit(){
    
        // }
        // public function deseaseUpdate(){
    
        // }
        // public function deseaseDestroy(){
            
        // }
    
        //STUDENTS MEDICAL DATA2 (IMMUNIZATIONS)
        public function immunizationIndex(){
                $tbl_immunizations = Immunization::all();
                return view("pages.student-health-data")->with("tbl_immunizations", $tbl_immunizations);
        }
        public function immunizationInsert(){
                foreach($request->mdvaccine as $vaccine){
                        $tbl_immunization = Immunization::create([
                                'vaccine_name' =>$vaccine,
                        ]);
                }
                return redirect()->route('student-health-data');
        }
        // public function immunizationShow(){
    
        // }
        // public function immunizationEdit(){
    
        // }
        // public function immunizationUpdate(){
    
        // }
        // public function immunizationDestroy(){
            
        // }
    
        //STUDENTS MEDICAL DATA3 (HISTORY ILLNESSES)
        public function illnessIndex(){
                $tbl_historyillnesses = HistoryIlness::all();
                return view("pages.student-health-data")->with("tbl_historyillnesses", $tbl_historyillnesses);
        }
        public function illnessInsert(){
                foreach($request->mdhistory as $history){
                        $tbl_historyillness = HistoryIlness::create([
                                'illness_name' =>$history,
                        ]);
                }
                return redirect()->route('student-health-data');
        }
        // public function illnessShow(){
    
        // }
        // public function illnessEdit(){
    
        // }
        // public function illnessUpdate(){
    
        // }
        // public function illnessDestroy(){
            
        // }
        
        //STUDENTS REMARKS
        public function remarkIndex(){
                $tbl_remarks = Remark::all();
                return view("pages.student-health-data")->with("tbl_remarks", $tbl_remarks);
        }
        public function remarkInsert(){
                $tbl_remark = new Remark();

                $tbl_remark->remark = $request->SRemarks;
                return redirect()->route('student-health-data');
        }
        // public function remarkShow(){
    
        // }
        // public function remarkEdit(){
    
        // }
        // public function remarkUpdate(){
    
        // }
        // public function remarkDestroy(){
            
        // }
}
