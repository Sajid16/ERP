<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\leaveRequest;
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
        $leave_type = DB::table('leave_types')->get();


        $dashboard_array = [];
        $array = [];

        //query;
        $dashboard_array['main_menu'] = $main_menu;
        $dashboard_array['sub_menu'] = $sub_menu;
        $dashboard_array['sub_menu_list'] = $sub_menu_list;
        $array['user_info'] = $user_info;
        $array['leave_type'] = $leave_type;
        return view('Leave.leaveRequest',compact('dashboard_array','array'));
    }

    public function sendRequest(Request $request){
        // dd($request->all());

        $leave_request = new leaveRequest();

        $leave_request->emp_fname = $request->emp_fname;
        $leave_request->emp_lname = $request->emp_lname;
        $leave_request->emp_email = $request->emp_email;
        $leave_request->sessionStart = $request->leave_start;
        $leave_request->sessionEnd = $request->leave_end;
        $leave_request->dateFrom = $request->leave_from;
        $leave_request->dateTo = $request->leave_to;
        $leave_request->duration = $request->duration;
        $leave_request->leaveReason = $request->leave_reason;
        $leave_request->reviewer = $request->reviewer_mail;

        $leave_request->save();
        return redirect('/leave_management/leave_request')->with('message','Request has been sent Successfully.');

    }

    // public function reviewList(Request $request){
    //     if($request->get('query'))
    //     {
    //         $query = $request->get('query');
    //         $data =  DB::table('employee_infos')
    //                 ->where('emp_email','LIKE','%{$query}%')
    //                 ->get();
    //         $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
    //         foreach ($data as $row) {
    //             $output = '<li><a href="#">'.$row->emp_email.'</a></li>';
    //         }
    //         $output = '</ul>';
    //         echo $output;
    //     }
    // }

    public function reviewRequest(){
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
        $leave_request = DB::table('leave_requests')
                    ->join('leave_types', 'leave_requests.leaveReason', '=', 'leave_types.id')
                    ->select('leave_requests.*','leave_types.*')
                    ->Where('leave_requests.reviewer','=',$email)
                    ->paginate(2);

        $array =[];
        $dashboard_array = [];

        //query;
        $dashboard_array['main_menu'] = $main_menu;
        $dashboard_array['sub_menu'] = $sub_menu;
        $dashboard_array['sub_menu_list'] = $sub_menu_list;
        $array['leave_request'] = $leave_request;
        return view ('Leave.CompleteMyLeaveRequest',compact('dashboard_array','array'));
    }

    public function individualViewRequest(){
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
        $leave_request = DB::table('leave_requests')
                    ->join('leave_types', 'leave_requests.leaveReason', '=', 'leave_types.id')
                    ->select('leave_requests.*','leave_types.*')
                    ->Where('leave_requests.emp_email','=',$email)
                    ->paginate(2);

        $array =[];
        $dashboard_array = [];

        //query;
        $dashboard_array['main_menu'] = $main_menu;
        $dashboard_array['sub_menu'] = $sub_menu;
        $dashboard_array['sub_menu_list'] = $sub_menu_list;
        $array['leave_request'] = $leave_request;
        return view ('Leave.viewAllMyRequest',compact('dashboard_array','array'));
    }
}
