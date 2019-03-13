<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\trainingTopics;

class trainingTopicsController extends Controller
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

		$dashboard_array = [];
		
		$dashboard_array['main_menu'] = $main_menu;
		$dashboard_array['sub_menu'] = $sub_menu;
		$dashboard_array['sub_menu_list'] = $sub_menu_list;
		return view ('Training.trainingTopics',compact('dashboard_array'));
	}

	public function add_field(Request $request){
		$rules = [];


		foreach($request->input('name') as $key => $value) {
			$rules["name.{$key}"] = 'required';
		}


		$validator = Validator::make($request->all(), $rules);


		if ($validator->passes()) {


			foreach($request->input('name') as $key => $value) {
				trainingTopics::create(['name'=>$value]);
			}


			return response()->json(['success'=>'done']);
		}


		return response()->json(['error'=>$validator->errors()->all()]);
	}
}
