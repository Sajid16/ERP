<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\erpPreviledge;

class previledgeController extends Controller
{
    public function superAdmin(){
    	// for sidebar
    	$email = Auth::user()->email;
        $main_menu = DB::table('menuses')
                    ->join('erp_previledges', 'menuses.id', '=', 'erp_previledges.access_Id')
                    ->select('menuses.*','erp_previledges.*')
                    ->where('menuses.menu', '=', 1)
                    ->Where('menuses.action','=',1)
                    ->Where('erp_previledges.user_email','=',$email)
                    ->get();
        // $main_menu = DB::table('menuses')->select('id','name')->where('menu', '=', 1)->Where('action','=',1)->get();
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
        $test_email = DB::table('users')
                    ->get();

        $dashboard_array = [];

        //query;
        $dashboard_array['main_menu'] = $main_menu;
        $dashboard_array['sub_menu'] = $sub_menu;
        $dashboard_array['sub_menu_list'] = $sub_menu_list;
        $dashboard_array['test_email'] = $test_email;
        return view ('Previledge.superAdminPreviledge',compact('dashboard_array'));
    }

    public function superAdminsave(Request $req){

    	$previledge = new erpPreviledge();
    	$previledge->user_email = $req->email;
    	$previledge->access_id = $req->Privilege_main_menu;

    	$previledge->save();
    	return redirect('/previledge/superAdmin')->with('msg','Permission has been imposed successfully.');
    	
    	// dd($req->all());

    }
}
