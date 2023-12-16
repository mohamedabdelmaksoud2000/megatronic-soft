@extends('layouts.master')

@section('title')
show all technologies
@endsection

@section('css')
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">show all</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Technology</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')

            <!-- row opened -->
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">Artists</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="wd-5p border-bottom-0"></th>
                                            <th class="wd-10p border-bottom-0">Image</th>
                                            <th class="wd-20p border-bottom-0">Name</th>
                                            <th class="wd-25p border-bottom-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $techs as $i=>$tech)
                                            
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td><img class="avatar-md rounded-circle my-auto" src="{{ $tech->imageUrl }}"></td>
                                                <td>{{ $tech->name}}</td>
                                                <td>
													<a href="" class="btn btn-md btn-primary">
														<i class="fa fa-search"></i>
													</a>
													<a href="{{ route('tech.edit',$tech->id) }}" class="btn btn-md btn-info">
														<i class="fa fa-pen"></i>
													</a>
                                                    <button type="button" class="btn btn-md btn-danger"data-toggle="modal" data-target="#deleteSection" onclick="getid({{$tech->id}})">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
												</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- row closed -->

                <!-- Modal -->
                <div class="modal fade" id="deleteSection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Sure delete technology
                            </div>
                            <form method="POST" action="{{route('tech.destroy')}}">
                                @csrf
                                @method('DELETE')
                                <div class="modal-footer">
                                    <input id="inputId" type="hidden" style="display:none" name="id">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

<script>
    function getid($id)
    {
        var inputId = document.getElementById('inputId');
        inputId.setAttribute('value',$id)
    }
</script>

@endsection