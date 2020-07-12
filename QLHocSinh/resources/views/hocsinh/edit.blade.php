
@extends('layouts._layout')

@section('title', 'Sửa thông tin học sinh')

@section('content')
<div class="content">
	<div class="container-fluid">

		<div class="row">

			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="blue">
						<i class="material-icons">add_circle_outline</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Sửa thông tin học sinh
						</h4>
						<form id="addHocSinh" action="{{ url('/edit-hoc-sinh.html') }}" method="post" role="form">
							{{ csrf_field() }}
							<input type="hidden" name="MaHocSinh" value="{{ $hocsinh->MaHocSinh }}">
							<!-- Normal Information -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Họ và tên *</label>
										<input type="text" name="HoTen" class="form-control" value="{{ $hocsinh->HoTen }}" required>
									</div>
								</div>
							
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Nơi sinh *</label>
										<input type="text" name="NoiSinh" class="form-control" value="{{ $hocsinh->NoiSinh }}" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Dân tộc*</label>
										<input type="text" name="DanToc" value="{{ $hocsinh->DanToc }}" class="form-control">
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="label-control validateday" id="validateday">
											Ngày sinh
										</label>
										<input type="text" name="NgaySinh" value="{{ \Carbon\Carbon::parse($hocsinh->NgaySinh)->format('d-m-y') }}" class="form-control today" aria-invalid="false"/>
									</div>
								</div>
							</div>
							<div class="row my-2 ml-4">
								<label class="col-sm-2 label-on-left">Giới tính</label>
								<div class="col-sm-10">
									@if($hocsinh->GioiTinh == 1)
										<div class="radio checkbox-inline">
											<label>
												<input type="radio" name="GioiTinh" value="1" checked="true">Nam
											</label>
										</div>
										<div class="radio checkbox-inline">
											<label>
												<input type="radio" name="GioiTinh" value="0">Nữ
											</label>
										</div>
									@else
										<div class="radio checkbox-inline">
											<label>
												<input type="radio" name="GioiTinh" value="1">Nam
											</label>
										</div>
										<div class="radio checkbox-inline">
											<label>
												<input type="radio" name="GioiTinh" value="0"  checked="true">Nữ
											</label>
										</div>
									@endif
								</div>
							</div>

							<div class="row my-2 ml-4">

								<div class="col-md-12">
									<div class="col-md-2 dropdown-label">
										<p>Năm học:</p>
									</div>
									<div class="col-md-2">
										<select class="form-control" name="MaNamHoc" data-style="btn btn-primary btn-round"
										title="Chọn năm học">
										<option value="default" disabled selected>Chọn năm học</option>
										@foreach($namhoc as $item)
											<option value="{{ $item->MaNamHoc }}" {{ ($item->MaNamHoc == $hocsinh->MaNamHoc)? "selected" : '' }}>{{ $item->TenNamHoc }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-2 dropdown-label">
									<p>Khối lớp:</p>
								</div>
								<div class="col-md-2">
									<select class="form-control" name="MaKhoiLop" id="chosseKhoiLop" data-style="btn btn-primary btn-round"
									title="Chọn khối lớp">
									<option value="default" disabled selected>Chọn khối lớp</option>
									@foreach($khoilop as $item)
										<option value="{{ $item->MaKhoiLop }}">{{ $item->TenKhoiLop }} </option>
									@endforeach
								</select>

							</div>

							<div class="col-md-2 dropdown-label">
								<p>Lớp:</p>
							</div>
							<div class="col-md-2">
								<select class="form-control" name="MaLop" id="chosseLop" data-style="btn btn-primary btn-round"
								title="Chọn lớp">
								<option disabled selected>Chọn lớp</option>
								@foreach($lop as $item)
										<option value="{{ $item->MaLop }}" {{ ($item->MaLop == $hocsinh->MaLop)? "selected" : '' }}>{{ $item->TenLop }} </option>
								@endforeach
							</select>

						</div>
					</div>
				</div>

		<!-- Button -->
		<br>
		<div class="pull-right">
			<button type="reset" class="btn btn-default btn-fill">Đặt lại</button>
			<button type="submit" class="btn btn-success btn-fill">Sửa thông tin học sinh</button>
			<div class="clearfix"></div>
		</div>
	</form>
</div>
</div>

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
        	$("#chosseKhoiLop").change(function () {
        		var id = this.value;
        		$.ajax({
        			url: '/HocSinh/getLopByMaKhoiLop/'+id,
        			type: 'get',
        			dataType: 'json',
        			contentType: "application/json;charset=utf-8",
        			success: function(response){
        				$("#chosseLop").empty();
        				$.each(response, function(i, item) {
        					var option = "<option value='"+ response[i].MaLop +"'>"+ response[i].TenLop +"</option>";

        					$("#chosseLop").append(option);
        				});

        			}
        		});
        	});
        });

        $(document).ready(function() {
        	$.validator.addMethod("Choose_empty", function(value, element, arg){
        		return arg !== value;
        	}, "Value must not equal arg.");
         //validate form
         $("#addHocSinh").validate({
         	rules: {
         		HoTen: "required",
         		NgaySinh: "required",
         		NoiSinh: "required",
         		DanToc: "required",
         		MaNamHoc: { Choose_empty: "default" },
         		MaKhoiLop: { Choose_empty: "default" }
         	},
         	messages: {
         		HoTen: "Vui lòng nhập họ và tên",
         		NgaySinh: "Vui lòng nhập ngày tháng năm sinh",
         		NoiSinh: "Vui lòng nhập nơi sinh",
         		DanToc: "Vui lòng nhập dân tộc",
         		MaNamHoc: { Choose_empty: "Bạn không được để trống trường này" },
         		MaKhoiLop: { Choose_empty: "Bạn không được để trống trường này" }
         	}
         });
        });
        
    </script>

@endsection