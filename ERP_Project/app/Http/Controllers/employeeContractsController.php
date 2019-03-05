<?php

namespace App\Http\Controllers;

use DB;
use App\Designation;
use App\employeeinfo;
use App\emp_contracts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class employeeContractsController extends Controller
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

        $emp_contracts_info = DB::table('emp_contracts')
        ->join('departments', 'departments.id', '=', 'emp_contracts.dept_name')
        ->join('designations', 'designations.id', '=', 'emp_contracts.deg_name')
        ->select('emp_contracts.*', 'departments.dept_name', 'designations.deg_name')
        ->get();

        $dashboard_array = [];
       
        //query;
        $dashboard_array['main_menu'] = $main_menu;
        $dashboard_array['sub_menu'] = $sub_menu;
        $dashboard_array['sub_menu_list'] = $sub_menu_list;
        $dashboard_array['emp_contracts_info'] = $emp_contracts_info;
        return view ('EmployeeContracts.employeeContractsList',compact('dashboard_array'));
    	
    }
    public function add(){
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
        
        $department = DB::table('departments')->get();
        $designation = DB::table('designations')->get();
        $emp_infos = DB::table('employee_infos')->get();


        //query;
        $dashboard_array = [];
        $employee_array = [];
        $dashboard_array['main_menu'] = $main_menu;
        $dashboard_array['sub_menu'] = $sub_menu;
        $dashboard_array['sub_menu_list'] = $sub_menu_list;
        
        $employee_array['emp_infos'] = $emp_infos;
        $employee_array['department'] = $department;
        $employee_array['designation'] = $designation;
        return view ('EmployeeContracts.addEmployeeContracts',compact('dashboard_array','employee_array'));
    }
    public function save(Request $request){
        $emp_contracts = new emp_contracts();
        $emp_contracts->contracts_name = $request->employee_name;
        $emp_contracts->company_name = $request->company_name;
        $emp_contracts->contacts_types = $request->contracts_types;
        $emp_contracts->dept_name = $request->emp_dept_name;
        $emp_contracts->deg_name = $request->emp_deg_name;
        $emp_contracts->position = $request->position;
        $emp_contracts->salary = $request->salary;
        $emp_contracts->start_date = $request->start_date;
        $emp_contracts->end_date = $request->end_date;
       
        $emp_contracts->save();

        return redirect('/employee_management/employee_contracts_list')->with('message','Data has been Inserted Successfully.');
        // dd($request->all());
    }
    public function edit($id){

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
        
        $emp_contracts_info = DB::table('emp_contracts')
        ->join('departments', 'departments.id', '=', 'emp_contracts.dept_name')
        ->join('designations', 'designations.id', '=', 'emp_contracts.deg_name')
        ->select('emp_contracts.*', 'departments.dept_name', 'designations.deg_name')
        ->where('emp_contracts.id','=',$id)
        ->get();

        $department = DB::table('departments')->get();
        $designation = DB::table('designations')->get();

        $dashboard_array = [];
        $employee_array = [];
       
        //query;
        $dashboard_array['main_menu'] = $main_menu;
        $dashboard_array['sub_menu'] = $sub_menu;
        $dashboard_array['sub_menu_list'] = $sub_menu_list;
        $dashboard_array['emp_contracts_info'] = $emp_contracts_info;
        $employee_array['department'] = $department;
        $employee_array['designation'] = $designation;
        return view ('EmployeeContracts.editEmployeeContracts',compact('dashboard_array','employee_array'));
    }
    public function update(Request $request){

        $emp_contracts = emp_contracts::find($request->empContractsId);

        
        $emp_contracts->contracts_name = $request->employee_name;
        $emp_contracts->company_name = $request->company_name;
        $emp_contracts->contacts_types = $request->contracts_types;
        $emp_contracts->dept_name = $request->emp_dept_name;
        $emp_contracts->deg_name = $request->emp_deg_name;
        $emp_contracts->position = $request->position;
        $emp_contracts->salary = $request->salary;
        $emp_contracts->start_date = $request->start_date;
        $emp_contracts->end_date = $request->end_date;
       
        $emp_contracts->save();

        return redirect('/employee_management/employee_contracts_list')->with('message','Data has been Upadated Successfully.');
    }
    public function delete($id){
        $emp_contractsDelete=emp_contracts::find($id);
        $emp_contractsDelete->delete();

        return redirect('/employee_management/employee_contracts_list')->with('message','Data has been Deleted Successfully.');
    }
}
