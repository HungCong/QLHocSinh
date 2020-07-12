
@extends('layouts._layout')

@section('title', 'Danh sách học sinh')

{{ $dem = 1 }}
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="blue">
						<i class="material-icons">list_alt</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Danh sách học sinh</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">

							<table id="datatables2"
							class="table table-striped display responsive table-no-bordered table-hover nowrap"
							style="width:100%">
							<thead>
								<tr>
									<th>STT</th>
									<th>Họ và tên</th>
									<th>Giới tính</th>
									<th>Ngày sinh</th>
									<th>Nơi sinh</th>
									<th>Dân tộc</th>
									<th>
										<div class="form-group">
											<select class="form-control" id="filter_Khoi">
												<option value="0" selected>Khối</option>
												@foreach($khoilop as $item)
													<option value="{{ $item->MaKhoiLop }}">{{ $item->TenKhoiLop }} </option>
												@endforeach
											</select>
										</div>
									</th>
									<th>
										<div class="form-group">
											<select class="form-control" id="filter_Lop">
												<option value="0" selected>Lớp</option>
												@foreach($lop as $item)
													<option value="{{ $item->MaLop }}">{{ $item->TenLop }} </option>
												@endforeach
											</select>
										</div>
									</th>
									<th class="disabled-sorting"></th>
								</tr>
							</thead>


							<tbody id="table_hocsinh">

								@foreach($hocsinh as $item)
								<tr>
									<td>{{ $dem }}</td>
									<td>{{ $item->HoTen }}</td>

									@if($item->GioiTinh == 1)
										<td>Nam</td>
									@else
										<td>Nữ</td>
									@endif

									<td>{{ \Carbon\Carbon::parse($item->NgaySinh)->format('d-m-Y') }}</td>
									<td>{{ $item->NoiSinh }}</td>
									<td>{{ $item->DanToc }}</td>
									<td>{{ $item->TenKhoiLop }}</td>
									<td>{{ $item->TenLop }}</td>
									<td class="td-actions">
										<button type="button" rel="tooltip" class="btn btn-success btn-round" title="Sửa thông tin học sinh">
											<a href="/HocSinh/edit.html/{{ $item->MaHocSinh }}">
												<i class="material-icons">edit</i>
											</a>
										</button>
										<button type="button" rel="tooltip" class="btn btn-danger btn-round deleteHocSinh" title="Xóa học sinh" data-id="{{ $item->MaHocSinh }}">
											<i class="material-icons">close</i>
									</button>
								</td>
							</tr>
							<div style="display: none;">{{ $dem++ }}</div>
							@endforeach

						</tbody>
					</table>
					{{ $hocsinh->links() }}
				</div>
			</div>
			<!-- end content-->
		</div>
		<!--  end card  -->
	</div>
	<!-- end col-md-12 -->
</div>
</div>
</div>

@endsection


@section('jsScript')

    <script>
    	$.ajaxSetup({
    		headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		}
    	});
        $(document).ready(function($) {
        	// if($('#filter_Khoi').val() == 0 && $('#filter_Lop').val() == 0){
        	// 	window.location.href="/HocSinh/list.html";
        	// }

        	$('.deleteHocSinh').click(function(event) {
                var res = confirm('Bạn muốn xóa học sinh này???');
                if(res){
                    var MaHocSinh = $(this).data("id");
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "/HocSinh/delete/" + MaHocSinh,
                        type: 'GET',
                        dataType: 'json',
                        data:  {},
                        contentType: false,
                        processData: false,
                        success: function () {
                            window.location.href="/HocSinh/list.html";
                            PNotify.success({
                               title: 'THÔNG BÁO!!',
                               // stack: { dir1: "up", dir2: "left", firstpos1: 25, firstpos2: 25 },
                               text: 'Xóa học sinh thành công.'
                           });
                        }
                    });
                    

                }

            });

            $("#filter_Khoi").change(function () {
        		var id = this.value;
        		var malop = $('#filter_Lop').val();
        		console.log("mã lớp: " + malop);
        		if(id == 0 && malop == 0){
        			window.location.href="/HocSinh/list.html";
        		}else if(id != 0 && malop == 0){
        			$.ajax({
        				url: '/HocSinh/getLopByMaKhoiLop/'+id,
        				type: 'get',
        				dataType: 'json',
        				contentType: "application/json;charset=utf-8",
        				success: function(response){
        					$("#filter_Lop").empty();
        					var def = '<option value="0" selected>Lớp</option>';
        					$("#filter_Lop").append(def);
        					$.each(response, function(i, item) {
        						var option = "<option value='"+ response[i].MaLop +"'>"+ response[i].TenLop +"</option>";

        						$("#filter_Lop").append(option);
        					});

        				}
        			});

        			$.ajax({
        				url: '/HocSinh/filter_Khoi/'+ id,
        				type: 'get',
        				dataType: 'json',
        				contentType: "application/json;charset=utf-8",
        				success: function(response){
        					$("#table_hocsinh").empty();
        					var gt = "";
        					var dem = 1;
        					$.each(response, function(i, item) {

        						if(response[i].GioiTinh == 1){
        							gt += "Nam";
        						}else{
        							gt += "Nữ";
        						}
        						var table = '<tr>' +
        						'<td>'+ dem +'</td>' +
        						'<td>'+ response[i].HoTen + '</td>'+
        						'<td>'+ gt +'</td>'+
        						'<td>'+ response[i].NgaySinh +'</td>' +
        						'<td>'+ response[i].NoiSinh +'</td>'+
        						'<td>'+ response[i].DanToc +'</td>'+
        						'<td>'+ response[i].TenKhoiLop +'</td>'+
        						'<td>'+ response[i].TenLop + '</td>'+
        						'<td class="td-actions">' +
        						'<button type="button" rel="tooltip" class="btn btn-success btn-round" title="Sửa thông tin học sinh">'+
        						'<a href="/HocSinh/edit.html/'+ response[i].MaHocSinh +'">'+
        						'<i class="material-icons">edit</i>'+
        						'</a>'+
        						'</button>'+
        						'<button type="button" rel="tooltip" class="btn btn-danger btn-round '+'deleteHocSinh" title="Xóa học sinh" data-id="'+ response[i].MaHocSinh +'">' +
        						'<i class="material-icons">close</i>'+
        						'</button>'+
        						'</td>'+
        						'</tr>';
        						dem++;
        						gt = "";			
        						$("#table_hocsinh").append(table);
        					});

        				}
        			});
        		}else if(id != 0 && malop != 0){
        			$.ajax({
        				url: '/HocSinh/filter_Lop_KhoiLop/'+ malop + '/' + id,
        				type: 'get',
        				dataType: 'json',
        				contentType: "application/json;charset=utf-8",
        				success: function(response){
        					$("#table_hocsinh").empty();
        					var gt = "";
        					var dem = 1;
        					$.each(response, function(i, item) {

        						if(response[i].GioiTinh == 1){
        							gt += "Nam";
        						}else{
        							gt += "Nữ";
        						}
        						var table = '<tr>' +
        						'<td>'+ dem +'</td>' +
        						'<td>'+ response[i].HoTen + '</td>'+
        						'<td>'+ gt +'</td>'+
        						'<td>'+ response[i].NgaySinh +'</td>' +
        						'<td>'+ response[i].NoiSinh +'</td>'+
        						'<td>'+ response[i].DanToc +'</td>'+
        						'<td>'+ response[i].TenKhoiLop +'</td>'+
        						'<td>'+ response[i].TenLop + '</td>'+
        						'<td class="td-actions">' +
        						'<button type="button" rel="tooltip" class="btn btn-success btn-round" title="Sửa thông tin học sinh">'+
        						'<a href="/HocSinh/edit.html/'+ response[i].MaHocSinh +'">'+
        						'<i class="material-icons">edit</i>'+
        						'</a>'+
        						'</button>'+
        						'<button type="button" rel="tooltip" class="btn btn-danger btn-round '+'deleteHocSinh" title="Xóa học sinh" data-id="'+ response[i].MaHocSinh +'">' +
        						'<i class="material-icons">close</i>'+
        						'</button>'+
        						'</td>'+
        						'</tr>';
        						dem++;
        						gt = "";			
        						$("#table_hocsinh").append(table);
        					});

        				}
        			});
        		}

        	});

        	$("#filter_Lop").change(function () {
        		var id = this.value;
        		var makhoi = $('#filter_Khoi').val();
        		console.log("mã khối: " + makhoi);

        		if(id == 0 && makhoi == 0){
        			window.location.href="/HocSinh/list.html";
        		}else if(id != 0 && makhoi == 0){
        			$.ajax({
        			url: '/HocSinh/filter_Lop/'+id,
        			type: 'get',
        			dataType: 'json',
        			contentType: "application/json;charset=utf-8",
        			success: function(response){
        				$("#table_hocsinh").empty();
        				var gt = "";
        				var dem = 1;
        				$.each(response, function(i, item) {

        					if(response[i].GioiTinh == 1){
        						gt += "Nam";
        					}else{
        						gt += "Nữ";
        					}
        					var table = '<tr>' +
											'<td>'+ dem +'</td>' +
											'<td>'+ response[i].HoTen + '</td>'+
											'<td>'+ gt +'</td>'+
											'<td>'+ response[i].NgaySinh +'</td>' +
											'<td>'+ response[i].NoiSinh +'</td>'+
											'<td>'+ response[i].DanToc +'</td>'+
											'<td>'+ response[i].TenKhoiLop +'</td>'+
											'<td>'+ response[i].TenLop + '</td>'+
											'<td class="td-actions">' +
												'<button type="button" rel="tooltip" class="btn btn-success btn-round" title="Sửa thông tin học sinh">'+
													'<a href="/HocSinh/edit.html/'+ response[i].MaHocSinh +'">'+
														'<i class="material-icons">edit</i>'+
													'</a>'+
												'</button>'+
												'<button type="button" rel="tooltip" class="btn btn-danger btn-round '+'deleteHocSinh" title="Xóa học sinh" data-id="'+ response[i].MaHocSinh +'">' +
													'<i class="material-icons">close</i>'+
												'</button>'+
											'</td>'+
										'</tr>';
							dem++;
							gt = "";			
        					$("#table_hocsinh").append(table);
        				});

        				}
        		 	});
        		}else if(id != 0 && makhoi != 0){
        			$.ajax({
        				url: '/HocSinh/filter_Lop_KhoiLop/'+ id + '/' + makhoi,
        				type: 'get',
        				dataType: 'json',
        				contentType: "application/json;charset=utf-8",
        				success: function(response){
        					$("#table_hocsinh").empty();
        					var gt = "";
        					var dem = 1;
        					$.each(response, function(i, item) {

        						if(response[i].GioiTinh == 1){
        							gt += "Nam";
        						}else{
        							gt += "Nữ";
        						}
        						var table = '<tr>' +
        						'<td>'+ dem +'</td>' +
        						'<td>'+ response[i].HoTen + '</td>'+
        						'<td>'+ gt +'</td>'+
        						'<td>'+ response[i].NgaySinh +'</td>' +
        						'<td>'+ response[i].NoiSinh +'</td>'+
        						'<td>'+ response[i].DanToc +'</td>'+
        						'<td>'+ response[i].TenKhoiLop +'</td>'+
        						'<td>'+ response[i].TenLop + '</td>'+
        						'<td class="td-actions">' +
        						'<button type="button" rel="tooltip" class="btn btn-success btn-round" title="Sửa thông tin học sinh">'+
        						'<a href="/HocSinh/edit.html/'+ response[i].MaHocSinh +'">'+
        						'<i class="material-icons">edit</i>'+
        						'</a>'+
        						'</button>'+
        						'<button type="button" rel="tooltip" class="btn btn-danger btn-round '+'deleteHocSinh" title="Xóa học sinh" data-id="'+ response[i].MaHocSinh +'">' +
        						'<i class="material-icons">close</i>'+
        						'</button>'+
        						'</td>'+
        						'</tr>';
        						dem++;
        						gt = "";			
        						$("#table_hocsinh").append(table);
        					});

        				}
        			});
        		}
        	});
        });

    </script>

@endsection