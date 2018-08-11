<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeModel;

class HomeController extends Controller{

    //

    protected $dataset = [];


    public function index(){

    	return view('home.index');
    }


    public function fetch_records(Request $req){

    		$response = [];


			if(isset($req->input('search')['value']) && $req->input('search')['value']!==''){

				if(strlen($req->input('search')['value']) > 0){

					$search = $req->input('search')['value'];

					$data = HomeModel::where('manufacturer','LIKE',"%{$search}%")
											->orWhere('model','LIKE',"%{$search}%")
											->offset($req->input('start'))
											->limit($req->input('length'))
											->get();

						foreach($data as $cols){

				 			array_push($this->dataset, 
									[
									
									'record_id'=>$cols->model_id,
									'manufacturer_name'=>$cols->manufacturer,
									'manufacturer_model'=>$cols->model,
									'responsive_col'=>''
									]
							);

			    	 }

			    	 $response = [
								'data'=>$this->dataset,
								'draw' => intval($req->input('draw')),
								'recordsTotal' => 	HomeModel::count(),
				                'recordsFiltered' => count($this->dataset),
								];
					}

			}else{


			    	 $data = HomeModel::offset($req->input('start'))->limit($req->input('length'))->get();

			    	 foreach($data as $cols){

			 			array_push($this->dataset, 
								[
								
								'record_id'=>$cols->model_id,
								'manufacturer_name'=>$cols->manufacturer,
								'manufacturer_model'=>$cols->model,
								'responsive_col'=>''
								]
						);

			    	 }


			    	 $response = [
								'data'=>$this->dataset,
								'draw' => intval($req->input('draw')),
								'recordsTotal' => 	HomeModel::count(),
				                'recordsFiltered' => HomeModel::count(),

					];

			}


    	 	echo json_encode($response);

    }
}
