<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Designation;
use App\employeeInfo;

class employeeController extends Controller
{
    public function index(){
    	$email = Auth::user()->email;
        $main_menu = DB::table('menuses')
                    ->join('erp_previledges', 'menuses.id', '=', 'erp_previledges.access_Id')
                    ->select('menuses.*','erp_previledges.*')
                    ->where('menuses.menu', '=', 1)
                    ->Where('menuses.action','=',1)
                    ->Where('erp_previledges.user_email','=',$email)
                    ->get();
        $sub_menu =  DB::table('menuses')
                    ->join('erp_previledges', 'menuses.id', '=', 'erp_previledges.access_Id')
                    ->select('menuses.*','erp_previledges.*')
                    ->where('menuses.subMenu', '=', 1)
                    ->Where('menuses.action','=',1)
                    ->Where('erp_previledges.user_email','=',$email)
                    ->get();
        $sub_menu_list =  DB::table('menuses')
                    ->join('erp_previledges', 'menuses.id', '=', 'erp_previledges.access_Id')
                    ->select('menuses.*','erp_previledges.*')
                    ->where('menuses.subMenuView', '=', 1)
                    ->Where('menuses.action','=',1)
                    ->Where('erp_previledges.user_email','=',$email)
                    ->get();

        $emp_info = DB::table('employee_infos')
        ->join('departments', 'departments.id', '=', 'employee_infos.emp_dept')
        ->join('designations', 'designations.id', '=', 'employee_infos.emp_desg')
        ->select('employee_infos.*', 'departments.dept_name', 'designations.deg_name')
        ->get();

        $dashboard_array = [];

        $dashboard_array['main_menu'] = $main_menu;
        $dashboard_array['sub_menu'] = $sub_menu;
        $dashboard_array['sub_menu_list'] = $sub_menu_list;
        $dashboard_array['emp_info'] = $emp_info;
        return view ('Employee.employeelist',compact('dashboard_array'));

    }


    public  function add(){
    	// dashboard query
    	$email = Auth::user()->email;
        $main_menu = DB::table('menuses')
                    ->join('erp_previledges', 'menuses.id', '=', 'erp_previledges.access_Id')
                    ->select('menuses.*','erp_previledges.*')
                    ->where('menuses.menu', '=', 1)
                    ->Where('menuses.action','=',1)
                    ->Where('erp_previledges.user_email','=',$email)
                    ->get();
        $sub_menu =  DB::table('menuses')
                    ->join('erp_previledges', 'menuses.id', '=', 'erp_previledges.access_Id')
                    ->select('menuses.*','erp_previledges.*')
                    ->where('menuses.subMenu', '=', 1)
                    ->Where('menuses.action','=',1)
                    ->Where('erp_previledges.user_email','=',$email)
                    ->get();
        $sub_menu_list =  DB::table('menuses')
                    ->join('erp_previledges', 'menuses.id', '=', 'erp_previledges.access_Id')
                    ->select('menuses.*','erp_previledges.*')
                    ->where('menuses.subMenuView', '=', 1)
                    ->Where('menuses.action','=',1)
                    ->Where('erp_previledges.user_email','=',$email)
                    ->get();

        $emp_info = DB::table('employee_infos')
        ->join('departments', 'departments.id', '=', 'employee_infos.emp_dept')
        ->join('designations', 'designations.id', '=', 'employee_infos.emp_desg')
        ->select('employee_infos.*', 'departments.dept_name', 'designations.deg_name')
        ->get();

        // employee from related query
        $department = DB::table('departments')->get();
        $designation = DB::table('designations')->get();


        //query;
        $dashboard_array = [];
        $employee_array = [];
        $dashboard_array['main_menu'] = $main_menu;
        $dashboard_array['sub_menu'] = $sub_menu;
        $dashboard_array['sub_menu_list'] = $sub_menu_list;
        $employee_array['department'] = $department;
        $employee_array['designation'] = $designation;
        return view ('Employee.employeeAdd',compact('dashboard_array','employee_array'));
    }

    public function findDesignation(Request $request){

        $data = Designation::select('deg_name','id')->where('dept_id',$request->id)->take(100)->get();
        return response()->json($data);

    }

    public function save(Request $request){
        // dd($request->all());
        $employeeinfo = new employeeInfo();

        $employeeinfo->emp_fname = $request->emp_fname;
        $employeeinfo->emp_lname = $request->emp_lname;
        $employeeinfo->emp_father_name = $request->emp_father_name;
        $employeeinfo->emp_email = $request->emp_email;
        $employeeinfo->emp_date_of_birth = $request->emp_date_of_birth;
        $employeeinfo->emp_gender = $request->emp_gender;
        $employeeinfo->emp_phone_number = $request->emp_phone_number;
        $employeeinfo->emp_image = 'test';
        $employeeinfo->emp_local_adds = $request->emp_local_address;
        $employeeinfo->emp_per_adds = $request->emp_permanent_address;
        $employeeinfo->emp_resume = 'test';
        $employeeinfo->emp_joinLetter = 'test';
        $employeeinfo->emp_contract = 'test';
        $employeeinfo->emp_idProof = 'test';
        $employeeinfo->emp_id = 'infobiz'.$request->emp_id;
        $employeeinfo->emp_dept = $request->emp_dept_name;
        $employeeinfo->emp_desg = $request->emp_deg_name;
        $employeeinfo->emp_joinDate = $request->emp_joining_date;
        $employeeinfo->emp_joinSalary = $request->emp_joining_salary;
        $employeeinfo->emp_accName = $request->emp_account_name;
        $employeeinfo->emp_accNumber = $request->emp_account_number;
        $employeeinfo->emp_bankName = $request->emp_bank_name;
        $employeeinfo->emp_bankBranch = $request->emp_branch;
        $employeeinfo->emp_swiftCode = $request->emp_swift_code;

        $employeeinfo->save();


        // for inserting image

        $imgId = $employeeinfo->id;
        echo $imgId;
        $imageInfo = $request->file('emp_image');
        $picName = $imgId.$imageInfo->getClientOriginalName();
        $imgFolder = "employeImages/";
        $imageInfo->move($imgFolder,$picName); 
        $imgUrl = $imgFolder.$picName;
        $employeeimg = employeeinfo::find($imgId);
        $employeeimg->emp_image = $imgUrl;
        $employeeimg->save();


        // for inserting resume

        $resumeId = $employeeinfo->id;
        echo $resumeId;
        $resumeInfo = $request->file('emp_resume');
        $resumeName = $resumeId.$resumeInfo->getClientOriginalName();
        $resumeFolder = "employeResumes/";
        $resumeInfo->move($resumeFolder,$resumeName); 
        $resumeUrl = $resumeFolder.$resumeName;
        $employeeresume = employeeinfo::find($resumeId);
        $employeeresume->emp_resume = $resumeUrl;
        $employeeresume->save();


        // for inserting joining letter

        $joinLetterId = $employeeinfo->id;
        echo $joinLetterId;
        $joinLetterInfo = $request->file('emp_joining_letter');
        $joinLetterName = $joinLetterId.$joinLetterInfo->getClientOriginalName();
        $joinLetterFolder = "employejoinLetter/";
        $joinLetterInfo->move($joinLetterFolder,$joinLetterName); 
        $joinLetterUrl = $joinLetterFolder.$joinLetterName;
        $employeejoinLetter = employeeinfo::find($resumeId);
        $employeejoinLetter->emp_joinLetter = $joinLetterUrl;
        $employeejoinLetter->save();


        // for inserting Contract & Agreement

        $C_AId = $employeeinfo->id;
        echo $C_AId;
        $C_AInfo = $request->file('emp_contract');
        $C_AName = $C_AId.$C_AInfo->getClientOriginalName();
        $C_AFolder = "employeC_A/";
        $C_AInfo->move($C_AFolder,$C_AName); 
        $C_AUrl = $C_AFolder.$C_AName;
        $employeeC_A = employeeinfo::find($resumeId);
        $employeeC_A->emp_contract = $C_AUrl;
        $employeeC_A->save();


        // for inserting ID proof

        $proofId = $employeeinfo->id;
        echo $proofId;
        $proofInfo = $request->file('emp_id_proof');
        $proofName = $proofId.$proofInfo->getClientOriginalName();
        $proofFolder = "employeproof/";
        $proofInfo->move($proofFolder,$proofName); 
        $proofUrl = $proofFolder.$proofName;
        $employeeproof = employeeinfo::find($resumeId);
        $employeeproof->emp_idProof = $proofUrl;
        $employeeproof->save();

        return redirect('/employee_management/employee_add')->with('message','Data has been Inserted Successfully.');
    }


    public function edit($id){
        // echo $id;
        $email = Auth::user()->email;
        $main_menu = DB::table('menuses')
                    ->join('erp_previledges', 'menuses.id', '=', 'erp_previledges.access_Id')
                    ->select('menuses.*','erp_previledges.*')
                    ->where('menuses.menu', '=', 1)
                    ->Where('menuses.action','=',1)
                    ->Where('erp_previledges.user_email','=',$email)
                    ->get();
        $sub_menu =  DB::table('menuses')
                    ->join('erp_previledges', 'menuses.id', '=', 'erp_previledges.access_Id')
                    ->select('menuses.*','erp_previledges.*')
                    ->where('menuses.subMenu', '=', 1)
                    ->Where('menuses.action','=',1)
                    ->Where('erp_previledges.user_email','=',$email)
                    ->get();
        $sub_menu_list =  DB::table('menuses')
                    ->join('erp_previledges', 'menuses.id', '=', 'erp_previledges.access_Id')
                    ->select('menuses.*','erp_previledges.*')
                    ->where('menuses.subMenuView', '=', 1)
                    ->Where('menuses.action','=',1)
                    ->Where('erp_previledges.user_email','=',$email)
                    ->get();
                    
        $emp_info = DB::table('employee_infos')
        ->join('departments', 'departments.id', '=', 'employee_infos.emp_dept')
        ->join('designations', 'designations.id', '=', 'employee_infos.emp_desg')
        ->select('employee_infos.*', 'departments.dept_name', 'designations.deg_name')
        ->where('employee_infos.id','=',$id)
        ->get();
        $department = DB::table('departments')->get();
        $designation = DB::table('designations')->get();

        $dashboard_array = [];
        $employee_array = [];

        $dashboard_array['main_menu'] = $main_menu;
        $dashboard_array['sub_menu'] = $sub_menu;
        $dashboard_array['sub_menu_list'] = $sub_menu_list;
        $dashboard_array['emp_info'] = $emp_info;
        $employee_array['department'] = $department;
        $employee_array['designation'] = $designation;
        return view ('Employee.employeeEditForm',compact('dashboard_array','employee_array'));
    }

    public function update(Request $request){
        // dd($request->all());
        $employeeinfo =  employeeInfo::find($request->empid);

        $employeeinfo->emp_fname = $request->emp_fname;
        $employeeinfo->emp_lname = $request->emp_lname;
        $employeeinfo->emp_father_name = $request->emp_father_name;
        $employeeinfo->emp_email = $request->emp_email;
        $employeeinfo->emp_date_of_birth = $request->emp_date_of_birth;
        $employeeinfo->emp_gender = $request->emp_gender;
        $employeeinfo->emp_phone_number = $request->emp_phone_number;
        $employeeinfo->emp_image = 'test';
        $employeeinfo->emp_local_adds = $request->emp_local_address;
        $employeeinfo->emp_per_adds = $request->emp_permanent_address;
        // $employeeinfo->emp_resume = 'test';
        // $employeeinfo->emp_joinLetter = 'test';
        // $employeeinfo->emp_contract = 'test';
        // $employeeinfo->emp_idProof = 'test';
        $employeeinfo->emp_id = 'infobiz'.$request->emp_id;
        $employeeinfo->emp_dept = $request->emp_dept_name;
        $employeeinfo->emp_desg = $request->emp_deg_name;
        $employeeinfo->emp_joinDate = $request->emp_joining_date;
        $employeeinfo->emp_joinSalary = $request->emp_joining_salary;
        $employeeinfo->emp_accName = $request->emp_account_name;
        $employeeinfo->emp_accNumber = $request->emp_account_number;
        $employeeinfo->emp_bankName = $request->emp_bank_name;
        $employeeinfo->emp_bankBranch = $request->emp_branch;
        $employeeinfo->emp_swiftCode = $request->emp_swift_code;

        $employeeinfo->save();

        // for inserting image

        $imgId = $employeeinfo->id;
        echo $imgId;
        $imageInfo = $request->file('emp_image');
        $picName = $imgId.$imageInfo->getClientOriginalName();
        $imgFolder = "employeImages/";
        $imageInfo->move($imgFolder,$picName); 
        $imgUrl = $imgFolder.$picName;
        $employeeimg = employeeinfo::find($imgId);
        $employeeimg->emp_image = $imgUrl;
        $employeeimg->save();

        return redirect('/employee_management/employee_list')->with('message','Data has been Updated Successfully.');
    }

    public function delete($id){
        echo $id;
        $empinfo = employeeInfo::find($id);
        $empinfo->delete();

        return redirect('/employee_management/employee_list')->with('message','Data has been Deleted Successfully.');
    }
}
