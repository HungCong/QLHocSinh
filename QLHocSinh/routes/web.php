<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//ForntEnd
Route::get('/', 'HomeController@index');

//Học sinh
Route::get('HocSinh/list.html', 'HocSinhController@getAll');
Route::get('HocSinh/add.html', 'HocSinhController@addHocSinh');
Route::get('HocSinh/getLopByMaKhoiLop/{MaKhoilop}', 'HocSinhController@getLopByMaKhoiLop');
Route::post('add-hoc-sinh.html', 'HocSinhController@formAddHocSinh');
Route::get('HocSinh/edit.html/{MaHocSinh}', 'HocSinhController@editHocSinh');
Route::post('edit-hoc-sinh.html', 'HocSinhController@formEditHocSinh');
Route::get('/HocSinh/delete/{MaHocSinh}', 'HocSinhController@deleteHocSinh');
Route::get('/HocSinh/filter_Khoi/{MaKhoiLop}', 'HocSinhController@filter_Khoi');
Route::get('/HocSinh/filter_Lop/{MaLop}', 'HocSinhController@filter_Lop');
Route::get('/HocSinh/filter_Lop_KhoiLop/{MaLop}/{MaKhoilop}', 'HocSinhController@filter_Lop_KhoiLop');

//Giáo viên
Route::get('GiaoVien/list.html', 'GiaoVienController@getAll');
Route::get('GiaoVien/add.html', 'GiaoVienController@addGiaoVien');
Route::post('add-giao-vien.html', 'GiaoVienController@formAddGiaoVien');
Route::get('GiaoVien/edit.html/{MaGiaoVien}', 'GiaoVienController@editGiaoVien');
Route::post('edit-giao-vien.html', 'GiaoVienController@formEditGiaoVien');
Route::get('/GiaoVien/delete/{MaGiaoVien}', 'GiaoVienController@deleteGiaoVien');


//Năm học
Route::get('/NamHoc/list.html', 'NamHocController@getAll');
Route::post('add-nam-hoc.html', 'NamHocController@formAddNamHoc');
Route::get('/NamHoc/delete/{MaNamHoc}', 'NamHocController@deleteNamHoc');
Route::get('/NamHoc/getNamHoc/{MaNamHoc}', 'NamHocController@editNamHoc');
Route::post('edit-nam-hoc.html', 'NamHocController@formEditNamHoc');




