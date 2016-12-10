<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
//Excel 
use App\ContactUS;
use App\userrequests;
use Input;
use App\Workorder;
use App\Apartment;
use App\Property;
use DB;
use Excel;


class ExcelController extends Controller
{
	public function import()
	{
		return view('import');
	}
	public function downloadExcel($type)
	{
		$data = Workorder::get()->toArray();
		return Excel::create('workorder_rpt', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	
	public function importx()
	{
		return view('import2');
	}
	public function importcus()
	{
		return view('import3');
	}
	public function importp()
	{
		return view('importp');
	}

	public function aptrpt($type)
	{
		$data = Apartment::get()->toArray();
		return Excel::create('Apt_rpt', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}

	public function msgq($type)
	{
		$data = contactus::get()->toArray();
		return Excel::create('contactusrpt', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	public function importprop($type)
	{
		$data = Property::get()->toArray();
		return Excel::create('PropertyList', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}

	public function importExcel()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['title' => $value->title, 'description' => $value->description];
				}
				if(!empty($insert)){
					DB::table('workorders')->insert($insert);
					dd('Insert Record successfully.');
				}
			}
		}
		return back();
	}
}