<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Training;
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
		$my_trainings = DB::table('trainings')
								->join('training_topics', 'trainings.training_topics', '=', 'training_topics.id')
								->select('trainings.*','training_topics.name')
								->where('trainings.emp_email', '=', $email)
								->where('trainings.status', '<>', 2)
								->get();

		$dashboard_array = [];
		$array = [];

		$dashboard_array['main_menu'] = $main_menu;
		$dashboard_array['sub_menu'] = $sub_menu;
		$dashboard_array['sub_menu_list'] = $sub_menu_list;
		$array['my_trainings'] = $my_trainings;
		return view ('Training.myTraining',compact('dashboard_array','array'));

	}

	public function teamTraining(){
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
		$team_training_requests = DB::table('trainings')
								->join('training_topics', 'trainings.training_topics', '=', 'training_topics.id')
								->select('trainings.*','training_topics.name')
								->where('trainings.proposer_email', '=', $email)
								->get();

		$dashboard_array = [];
		$array = [];

		$dashboard_array['main_menu'] = $main_menu;
		$dashboard_array['sub_menu'] = $sub_menu;
		$dashboard_array['sub_menu_list'] = $sub_menu_list;
		$array['team_training_requests'] = $team_training_requests;
		return view ('Training.teamTraining',compact('dashboard_array','array'));
	}

	public function requestTraining(){
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
		$training_topics = DB::table('training_topics')->get();
		$user_info = DB::table('employee_infos')
					->where('emp_email', '=', $email)
					->get();

		$dashboard_array = [];
		$array = [];

		$dashboard_array['main_menu'] = $main_menu;
		$dashboard_array['sub_menu'] = $sub_menu;
		$dashboard_array['sub_menu_list'] = $sub_menu_list;
		$array['training_topics'] = $training_topics;
		$array['user_info'] = $user_info;
		return view ('Training.requestTraining',compact('dashboard_array','array'));
	}

	public function trainingRequestSave(Request $request){
		// dd($request->all());
		$traininginfo = new Training();

		$traininginfo->training_topics = $request->training_topics;
		$traininginfo->emp_email = $request->emp_email;
		$traininginfo->proposer_email = $request->proposer_email;
		$traininginfo->description = $request->trainingDescription;

		$traininginfo->save();
		return redirect('/training_management/team_training')->with('message','Data has been Inserted Successfully.');
	}

	public function allrequestTraining(){
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
		$all_training_requests = DB::table('trainings')
								->join('training_topics', 'trainings.training_topics', '=', 'training_topics.id')
								->select('trainings.*','training_topics.name')
								->get();


		$dashboard_array = [];
		$array = [];

		$dashboard_array['main_menu'] = $main_menu;
		$dashboard_array['sub_menu'] = $sub_menu;
		$dashboard_array['sub_menu_list'] = $sub_menu_list;
		$array['all_training_requests'] = $all_training_requests;
		return view ('Training.allTrainings',compact('dashboard_array','array'));
	}

	public function allrequestTrainingView($id){
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
		$all_training_requests = DB::table('trainings')
								->join('training_topics', 'trainings.training_topics', '=', 'training_topics.id')
								->select('trainings.*','training_topics.name')
								->where('trainings.id', '=', $id)
								->get();

		$dashboard_array = [];
		$array = [];

		$dashboard_array['main_menu'] = $main_menu;
		$dashboard_array['sub_menu'] = $sub_menu;
		$dashboard_array['sub_menu_list'] = $sub_menu_list;
		$array['all_training_requests'] = $all_training_requests;
		return view ('Training.trainingRequestView',compact('dashboard_array','array'));
	}

	public function trainingRequestCheck(Request $request){
		// dd($request->all());
		$training_request_check = Training::find($request->training_id);

		$training_request_check->from = $request->training_from;
		$training_request_check->to = $request->training_to;
		$training_request_check->duration = $request->duration;
		$training_request_check->status = $request->training_status;

		$training_request_check->save();
		return redirect('/training_management/all_training_request')->with('message','Data has been Inserted Successfully.');
	}

	public function employeetrainingView($id){
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
		$employee_training_view = DB::table('trainings')
								->join('training_topics', 'trainings.training_topics', '=', 'training_topics.id')
								->select('trainings.*','training_topics.name')
								->where('trainings.id', '=', $id)
								->get();

		$dashboard_array = [];
		$array = [];

		$dashboard_array['main_menu'] = $main_menu;
		$dashboard_array['sub_menu'] = $sub_menu;
		$dashboard_array['sub_menu_list'] = $sub_menu_list;
		$array['employee_training_view'] = $employee_training_view;
		return view ('Training.employeeTrainingView',compact('dashboard_array','array'));
	}

	public function employeetrainingConfirmation(Request $request){
		// dd($request->all());
		$employee_training_confirmation = Training::find($request->training_id);

		$employee_training_confirmation->status = $request->training_status;
		$employee_training_confirmation->comments = $request->trainingDeclinedReason;

		$employee_training_confirmation->save();
		return redirect('/training_management/my_training')->with('message','Data has been Inserted Successfully.');
	}

	public function saveFeedback(Request $request){
		// dd($request->all());
		$save_feedback = Training::find($request->training_id);

		$save_feedback->Feedback = $request->feedback;

		$save_feedback->save();
		return redirect('/training_management/team_training')->with('message','Data has been Inserted Successfully.');
	}
}
