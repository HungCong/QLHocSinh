<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
Use Carbon\Carbon;

class NamHocController extends Controller
{
    //

    public function getAll(){
    	$namhoc = DB::table('nam_hocs')
    					->paginate(5);
    	return view('namhoc.index')->with([
    										'namhoc'=> $namhoc
    										]);
    }

    public function addNamHoc(){
    	return view('namhoc.add');
    }

     public function formAddNamHoc(Request $request){
        $TenNamHoc = $request->get("TenNamHoc");

        DB::insert('insert into nam_hocs (TenNamHoc) values (?)', [$TenNamHoc]);
        return redirect('/NamHoc/list.html');
    }

     public function editNamHoc(int $MaNamHoc){
    	$namhoc = DB::table('nam_hocs')->where("MaNamHoc", $MaNamHoc)->first();

    	return \Response::json($namhoc);
    }

     public function formEditNamHoc(Request $request){
     	$MaNamHoc = $request->get("MaNamHoc");
     	$TenNamHoc = $request->get("NamHoc");
       	
       	DB::update('update nam_hocs set TenNamHoc = ? where MaNamHoc = ?', [$TenNamHoc, $MaNamHoc]);

        return redirect('/NamHoc/list.html');
    }

     public function deleteNamHoc($MaNamHoc){
    	DB::table('nam_hocs')->where("MaNamHoc", $MaNamHoc)->delete();

     return response()->json([
       'success' => 'Record deleted successfully!'
    ]);
    }
}
