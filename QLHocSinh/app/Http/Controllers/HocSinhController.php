<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
Use Carbon\Carbon;

class HocSinhController extends Controller
{
    //
    public function getAll(){
    	$hocsinh = DB::table('hoc_sinhs')
            			->join('lops', 'hoc_sinhs.MaLop', '=', 'lops.MaLop')
            			->join('khoi_lops', 'lops.MaKhoiLop', '=', 'khoi_lops.MaKhoiLop')
            			->select('hoc_sinhs.MaHocSinh', 'hoc_sinhs.HoTen', 'hoc_sinhs.GioiTinh', 'hoc_sinhs.NgaySinh', 'hoc_sinhs.NoiSinh', 'hoc_sinhs.DanToc', 'lops.TenLop', 'khoi_lops.TenKhoiLop')
            			->paginate(15);
        $khoilop = DB::table('khoi_lops')->get();
        $lop = DB::table('lops')->get();
    	return view('hocsinh.index')->with([
    										'hocsinh'=> $hocsinh,
    										'khoilop'=> $khoilop,
    										'lop'=> $lop
    										]);
    }

    public function addHocSinh(){
    	$khoilop = DB::table('khoi_lops')->get();
    	$lop = DB::table('lops')->get();
    	$namhoc = DB::table('nam_hocs')->get();
    	return view('hocsinh.add')->with([
    									'khoilop'=>$khoilop,
										'lop'=> $lop,
										'namhoc'=>$namhoc    									
    									]);
    }

    //get lops by MaKhoiLop
    public function getLopByMaKhoiLop(int $MaKhoilop){
    	$lop = DB::table('lops')
    				->where('MaKhoiLop', $MaKhoilop)
    				->get();
    	return \Response::json($lop);
    }

    public function getHocSinhByLop(int $MaLop){
    	$hocsinh = DB::table('hoc_sinhs')
    						->where('MaLop', $MaLop)
    						->get();
    	return \Response::json($lop);					
    }


     public function formAddHocSinh(Request $request){
        $HoTen = $request->get("HoTen");
        $NgaySinh = $request->get("NgaySinh");
        $NoiSinh = $request->get("NoiSinh");
        $GioiTinh = $request->get("GioiTinh");
        $DanToc = $request->get("DanToc");
        $MaNamHoc = $request->get("MaNamHoc");
       	$MaLop = $request->get("MaLop");

       	$NgaySinh = \Carbon\Carbon::parse(str_replace("/", "-", $NgaySinh))->format('Y-m-d');
        DB::insert('insert into hoc_sinhs (HoTen, NgaySinh, NoiSinh, GioiTinh, DanToc, MaNamHoc, MaLop) values (?, ?, ?, ?, ?, ?, ?)', [$HoTen, $NgaySinh, $NoiSinh, $GioiTinh, $DanToc, $MaNamHoc, $MaLop]);
        return redirect('/HocSinh/list.html');
    }

    public function editHocSinh(int $MaHocSinh){
    	$khoilop = DB::table('khoi_lops')->get();
    	$lop = DB::table('lops')->get();
    	$namhoc = DB::table('nam_hocs')->get();
    	$hocsinh = DB::table('hoc_sinhs')->where("MaHocSinh", $MaHocSinh)->first();

    	return view("hocsinh.edit")->with([
    									'khoilop'=>$khoilop,
										'lop'=> $lop,
										'namhoc'=>$namhoc,
										'hocsinh'=>$hocsinh    									
    									]);
    }

     public function formEditHocSinh(Request $request){
     	$MaHocSinh = $request->get("MaHocSinh");
        $HoTen = $request->get("HoTen");
        $NgaySinh = $request->get("NgaySinh");
        $NoiSinh = $request->get("NoiSinh");
        $GioiTinh = $request->get("GioiTinh");
        $DanToc = $request->get("DanToc");
        $MaNamHoc = $request->get("MaNamHoc");
       	$MaLop = $request->get("MaLop");
       	$NgaySinh = \Carbon\Carbon::parse(str_replace("/", "-", $NgaySinh))->format('Y-m-d');
       	
       	DB::update('update hoc_sinhs set HoTen = ?, NgaySinh = ?, NoiSinh = ?, GioiTinh = ?, DanToc = ?, MaNamHoc = ?, MaLop = ?  where MaHocSinh = ?', [$HoTen, $NgaySinh, $NoiSinh, $GioiTinh, $DanToc, $MaNamHoc, $MaLop, $MaHocSinh]);

        return redirect('/HocSinh/list.html');
    }

    public function deleteHocSinh($MaHocSinh){
    	DB::table('hoc_sinhs')->where("MaHocSinh", $MaHocSinh)->delete();

     return response()->json([
       'success' => 'Record deleted successfully!'
    ]);
    }

    public function filter_Khoi($MaKhoiLop){
    	$hocsinh = DB::table('hoc_sinhs')
            			->join('lops', 'hoc_sinhs.MaLop', '=', 'lops.MaLop')
            			->join('khoi_lops', 'lops.MaKhoiLop', '=', 'khoi_lops.MaKhoiLop')
            			->where('lops.MaKhoiLop', $MaKhoiLop)
            			->select('hoc_sinhs.MaHocSinh', 'hoc_sinhs.HoTen', 'hoc_sinhs.GioiTinh', 'hoc_sinhs.NgaySinh', 'hoc_sinhs.NoiSinh', 'hoc_sinhs.DanToc', 'lops.TenLop', 'khoi_lops.TenKhoiLop')
            			->get();
        return \Response::json($hocsinh);	
    }

     public function filter_Lop($MaLop){
    	$hocsinh = DB::table('hoc_sinhs')
            			->join('lops', 'hoc_sinhs.MaLop', '=', 'lops.MaLop')
            			->join('khoi_lops', 'lops.MaKhoiLop', '=', 'khoi_lops.MaKhoiLop')
            			->where('lops.MaLop', $MaLop)
            			->select('hoc_sinhs.MaHocSinh', 'hoc_sinhs.HoTen', 'hoc_sinhs.GioiTinh', 'hoc_sinhs.NgaySinh', 'hoc_sinhs.NoiSinh', 'hoc_sinhs.DanToc', 'lops.TenLop', 'khoi_lops.TenKhoiLop')
            			->get();
        return \Response::json($hocsinh);	
    }

     public function filter_Lop_KhoiLop($MaLop, $MaKhoilop){
    	$hocsinh = DB::table('hoc_sinhs')
            			->join('lops', 'hoc_sinhs.MaLop', '=', 'lops.MaLop')
            			->join('khoi_lops', 'lops.MaKhoiLop', '=', 'khoi_lops.MaKhoiLop')
            			->where('lops.MaLop', $MaLop)
            			->where('khoi_lops.MaKhoiLop', $MaKhoilop)
            			->select('hoc_sinhs.MaHocSinh', 'hoc_sinhs.HoTen', 'hoc_sinhs.GioiTinh', 'hoc_sinhs.NgaySinh', 'hoc_sinhs.NoiSinh', 'hoc_sinhs.DanToc', 'lops.TenLop', 'khoi_lops.TenKhoiLop')
            			->get();
        return \Response::json($hocsinh);	
    }
}
