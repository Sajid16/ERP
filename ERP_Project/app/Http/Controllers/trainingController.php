<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class trainingController extends Controller
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
		return view ('Training.myTraining',compact('dashboard_array'));

	}
}
