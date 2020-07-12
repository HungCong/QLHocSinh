
@extends('layouts._layout')

@section('title', 'Danh sách giáo viên')

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
						<h4 class="card-title">Danh sách giáo viên</h4>
						<div class="toolbar">
							
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
									<th>Địa chỉ</th>
									<th>Điện thoại</th>
									<th class="disabled-sorting"></th>
								</tr>
							</thead>


							<tbody id="table_hocsinh">

								@foreach($giaovien as $item)
								<tr>
									<td>{{ $dem }}</td>
									<td>{{ $item->HoTen }}</td>

									@if($item->GioiTinh == 1)
										<td>Nam</td>
									@else
										<td>Nữ</td>
									@endif

									<td>{{ \Carbon\Carbon::parse($item->NgaySinh)->format('d-m-Y') }}</td>
									<td>{{ $item->DiaChi }}</td>
									<td>{{ $item->DienThoai }}</td>
									<td class="td-actions">
										<button type="button" rel="tooltip" class="btn btn-success btn-round" title="Sửa thông tin giáo viên">
											<a href="/GiaoVien/edit.html/{{ $item->MaGiaoVien }}">
												<i class="material-icons">edit</i>
											</a>
										</button>
										<button type="button" rel="tooltip" class="btn btn-danger btn-round deleteGiaoVien" title="Xóa giáo viên" data-id="{{ $item->MaGiaoVien }}">
											<i class="material-icons">close</i>
									</button>
								</td>
							</tr>
							<div style="display: none;">{{ $dem++ }}</div>
							@endforeach

						</tbody>
					</table>
					{{ $giaovien->links() }}
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

        	$('.deleteGiaoVien').click(function(event) {
                var res = confirm('Bạn muốn xóa giáo viên này???');
                if(res){
                    var MaGiaoVien = $(this).data("id");
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "/GiaoVien/delete/" + MaGiaoVien,
                        type: 'GET',
                        dataType: 'json',
                        data:  {},
                        contentType: false,
                        processData: false,
                        success: function () {
                            window.location.href="/GiaoVien/list.html";
                            PNotify.success({
                               title: 'THÔNG BÁO!!',
                               // stack: { dir1: "up", dir2: "left", firstpos1: 25, firstpos2: 25 },
                               text: 'Xóa giáo viên thành công.'
                           });
                        }
                    });
                    

                }

            });
        });

    </script>

@endsection