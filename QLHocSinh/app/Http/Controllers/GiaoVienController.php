<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
Use Carbon\Carbon;

class GiaoVienController extends Controller
{
    //
    public function getAll(){
    	$giaovien = DB::table('giao_viens')
    					->paginate(15);
    	return view('giaovien.index')->with([
    										'giaovien'=> $giaovien
    										]);
    }

    public function addGiaoVien(){
    	return view('giaovien.add');
    }

     public function formAddGiaoVien(Request $request){
        $HoTen = $request->get("HoTen");
        $NgaySinh = $request->get("NgaySinh");
        $DiaChi = $request->get("DiaChi");
        $GioiTinh = $request->get("GioiTinh");
        $DienThoai = $request->get("DienThoai");

       	$NgaySinh = \Carbon\Carbon::parse(str_replace("/", "-", $NgaySinh))->format('Y-m-d');
        DB::insert('insert into giao_viens (HoTen, NgaySinh, DiaChi, GioiTinh, DienThoai) values (?, ?, ?, ?, ?)', 
        								   [$HoTen, $NgaySinh, $DiaChi, $GioiTinh, $DienThoai]);
        return redirect('/GiaoVien/list.html');
    }

     public function editGiaoVien(int $MaGiaoVien){
    	$giaovien = DB::table('giao_viens')->where("MaGiaoVien", $MaGiaoVien)->first();

    	return view("giaovien.edit")->with([
    									'giaovien'=>$giaovien 									
    									]);
    }

     public function formEditGiaoVien(Request $request){
     	$MaGiaoVien = $request->get("MaGiaoVien");
     	$HoTen = $request->get("HoTen");
        $NgaySinh = $request->get("NgaySinh");
        $DiaChi = $request->get("DiaChi");
        $GioiTinh = $request->get("GioiTinh");
        $DienThoai = $request->get("DienThoai");
       	$NgaySinh = \Carbon\Carbon::parse(str_replace("/", "-", $NgaySinh))->format('Y-m-d');
       	
       	DB::update('update giao_viens set HoTen = ?, NgaySinh = ?, DiaChi = ?, GioiTinh = ?, DienThoai = ? where MaGiaoVien = ?', [$HoTen, $NgaySinh, $DiaChi, $GioiTinh, $DienThoai, $MaGiaoVien]);

        return redirect('/GiaoVien/list.html');
    }

     public function deleteGiaoVien($MaGiaoVien){
    	DB::table('giao_viens')->where("MaGiaoVien", $MaGiaoVien)->delete();

     return response()->json([
       'success' => 'Record deleted successfully!'
    ]);
    }
}
