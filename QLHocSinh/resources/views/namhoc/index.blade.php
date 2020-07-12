
@extends('layouts._layout')

@section('title', 'Năm học')

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
						<h4 class="card-title">Năm học</h4>
						<div class="toolbar">
							<button type="button" class="btn btn-danger btn-round" data-toggle="modal" data-target="#addNamHoc">
                                <i class="material-icons">add</i> Thêm mới
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="addNamHoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            	<div class="modal-dialog modal-sm" role="document">
                            		<div class="modal-content">
                            			<div class="modal-header">
                            				<h5 class="modal-title" id="exampleModalLabel">Thêm năm học</h5>
                            				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            					<span aria-hidden="true">&times;</span>
                            				</button>
                            			</div>
                            			<div class="modal-body">
                            				<form action="{{ url('/add-nam-hoc.html') }}" method="post" role="form" >
                            					{{ csrf_field() }}
                            					<div class="form-group">
                            						<label for="recipient-name" class="col-form-label">Năm học:</label>
                            						<input type="text" class="form-control" name="TenNamHoc" required>
                            					</div>
                            					<div class="form-group">
                            						<button type="submit" class="btn btn-primary">Thêm mới</button>
                            					</div>
                            				</form>
                            			</div>
                            			<div class="modal-footer">
                            				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            			</div>
                            		</div>
                            	</div>
                            </div>

						</div>
						<div class="material-datatables">

							<table id="datatables2"
							class="table table-striped display responsive table-no-bordered table-hover nowrap"
							style="width:100%">
							<thead>
								<tr>
									<th>STT</th>
									<th>Năm học</th>
									<th class="disabled-sorting"></th>
								</tr>
							</thead>


							<tbody id="table_hocsinh">

								@foreach($namhoc as $item)
								<tr>
									<td>{{ $dem }}</td>
									<td>{{ $item->TenNamHoc }}</td>
									<td class="td-actions">
										<button type="button" rel="tooltip" class="btn btn-success btn-round btneditNamHoc" title="Sửa năm học" data-id="{{ $item->MaNamHoc }}">
												<i class="material-icons">edit</i>
										</button>
										<button type="button" rel="tooltip" class="btn btn-danger btn-round deleteNamHoc" title="Xóa năm học" data-id="{{ $item->MaNamHoc }}">
											<i class="material-icons">close</i>
									</button>
								</td>
							</tr>
							<div style="display: none;">{{ $dem++ }}</div>
							@endforeach

						</tbody>
					</table>
					{{ $namhoc->links() }}
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

<!-- Modal edit NamHoc-->
<div class="modal fade editNamHoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sửa năm học</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ url('/edit-nam-hoc.html') }}" method="post" role="form" >
					{{ csrf_field() }}
					<input type="hidden" name="MaNamHoc" id="MaNamHoc">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Năm học:</label>
						<input type="text" class="form-control" id="TenNamHoc" name="NamHoc" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Sửa</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			</div>
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

        	$('.deleteNamHoc').click(function(event) {
                var res = confirm('Bạn muốn xóa năm học này???');
                if(res){
                    var MaNamHoc = $(this).data("id");
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "/NamHoc/delete/" + MaNamHoc,
                        type: 'GET',
                        dataType: 'json',
                        data:  {},
                        contentType: false,
                        processData: false,
                        success: function () {
                            window.location.href="/NamHoc/list.html";
                            PNotify.success({
                               title: 'THÔNG BÁO!!',
                               // stack: { dir1: "up", dir2: "left", firstpos1: 25, firstpos2: 25 },
                               text: 'Xóa nam học thành công.'
                           });
                        }
                    });
                    

                }

            });

        	$('.btneditNamHoc').click(function(event) {
        		$('.editNamHoc').modal('show');
        		var MaNamHoc = $(this).data('id');
        		

        		$.ajax({
                        url: "/NamHoc/getNamHoc/" + MaNamHoc,
                        type: 'GET',
                        dataType: 'json',
                        data:  {},
                        contentType: false,
                        processData: false,
                        success: function (res) {
                        	$('#MaNamHoc').val(res.MaNamHoc);
                        	$('#TenNamHoc').val(res.TenNamHoc);
                        }
                    });
        	});

        });

    </script>

@endsection