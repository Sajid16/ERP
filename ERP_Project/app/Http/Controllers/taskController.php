<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Task;
use DB;

class taskController extends Controller
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
        $taskinfo = DB::table('tasks')
                    ->join('departments', 'tasks.deptId', '=', 'departments.id')
                    ->select('tasks.*','departments.*')
                    ->get();

        $array =[];
        $dashboard_array = [];

        //query;
        $dashboard_array['main_menu'] = $main_menu;
        $dashboard_array['sub_menu'] = $sub_menu;
        $dashboard_array['sub_menu_list'] = $sub_menu_list;
        $array['taskInfo'] = $taskinfo;
        return view ('Task.taskList',compact('dashboard_array','array'));
    }

    public function add(){

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
        $department = DB::table('departments')
                    ->get();


        $dashboard_array = [];
        $array = [];

        //query;
        $dashboard_array['main_menu'] = $main_menu;
        $dashboard_array['sub_menu'] = $sub_menu;
        $dashboard_array['sub_menu_list'] = $sub_menu_list;
        $array['department'] = $department;
        return view ('Task.taskAdd',compact('dashboard_array','array'));
    }

    public function save(Request $request){
        // dd($request->all());
        $taskinfo = new Task();

        $taskinfo->deptId = $request->emp_dept_name;
        $taskinfo->emp_fname = $request->emp_fname;
        $taskinfo->emp_lname = $request->emp_lname;
        $taskinfo->emp_email = $request->emp_email;
        $taskinfo->emp_id = 'infobiz'.$request->emp_id;
        $taskinfo->emp_startDate = $request->taskStartDate;
        $taskinfo->emp_endDate = $request->taskEndDate;
        $taskinfo->emp_taskDescription = $request->taskDescription;

        $taskinfo->save();
        return redirect('/task_management/task_add')->with('message','Data has been Inserted Successfully.');
    }

    public function taskStatusEdit(Request $request,$id){
        // echo $id;
        $tastId =  Task::find($request->taskid);
        echo $tastId;
    }
}
