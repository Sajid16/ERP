<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class leaveController extends Controller
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
                    
        $user_info = DB::table('employee_infos')->where('emp_email','=',$email)->get();


        $dashboard_array = [];
        $array = [];

        //query;
        $dashboard_array['main_menu'] = $main_menu;
        $dashboard_array['sub_menu'] = $sub_menu;
        $dashboard_array['sub_menu_list'] = $sub_menu_list;
        $array['user_info'] = $user_info;
        return view('Leave.leaveRequest',compact('dashboard_array','array'));
    }
}
