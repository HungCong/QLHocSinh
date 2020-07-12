
@extends('layouts._layout')

@section('title', 'Sửa thông tin giáo viên')

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
						<h4 class="card-title">Sửa thông tin giáo viên
						</h4>
						<form id="editGiaoVien" action="{{ url('/edit-giao-vien.html') }}" method="post" role="form">
							{{ csrf_field() }}
							<!-- Normal Information -->
							<input type="hidden" name="MaGiaoVien" value="{{ $giaovien->MaGiaoVien }}">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Họ và tên *</label>
										<input type="text" name="HoTen" class="form-control" value="{{ $giaovien->HoTen }}" required >
									</div>
								</div>
							
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Địa chỉ *</label>
										<input type="text" name="DiaChi" class="form-control" value="{{ $giaovien->DiaChi }}"  required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Số điện thoại*</label>
										<input type="text" name="DienThoai" class="form-control" value="{{ $giaovien->DienThoai }}">
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="label-control validateday" id="validateday">
											Ngày sinh
										</label>
										<input type="text" name="NgaySinh" class="form-control today" value="{{ \Carbon\Carbon::parse($giaovien->NgaySinh)->format('d-m-y') }}" aria-invalid="false"/>
									</div>
								</div>
							</div>
							<div class="row my-2 ml-4">
								<label class="col-sm-2 label-on-left">Giới tính</label>
								<div class="col-sm-10">
									@if($giaovien->GioiTinh == 1)
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
							
					</div>
				</div>

				<!-- Button -->
				<br>
				<div class="pull-right">
					<button type="reset" class="btn btn-default btn-fill">Đặt lại</button>
					<button type="submit" class="btn btn-success btn-fill">Sửa thông tin giáo viên</button>
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
    		jQuery.validator.addMethod("phonenu", function (value, element) {
    			if (/^(09[0-9]|07[0|6|7|8|9]|03[2-9]|08[1-5])+([0-9]{7})\b/g.test(value)) {
    				return true;
    			} else {
    				return false;
    			};
    		}, "Invalid phone number");
    		  //validate form
    		  $("#editGiaoVien").validate({
    		  	rules: {
    		  		HoTen: "required",
    		  		NgaySinh: "required",
    		  		DiaChi: "required",
    		  		DienThoai: {
                        required: true,
                        phonenu: true
                    },
    		  	},
    		  	messages: {
    		  		HoTen: "Vui lòng nhập họ và tên",
    		  		NgaySinh: "Vui lòng ngày sinh",
    		  		DiaChi: "Vui lòng địa chỉ",
    		  		DienThoai: {
                        required: "Vui lòng nhập số điện thoại",
                        phonenu: "Số điện thoại không hợp lệ"
                    }
    		  	}
    		  });
    	});
       
    </script>

@endsection