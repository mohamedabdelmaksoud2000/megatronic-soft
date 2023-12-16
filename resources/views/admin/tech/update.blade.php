@extends('layouts.master')

@section('title')
Update Technology
@endsection

@section('css')
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Update</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Technology</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
				<form method="POST" action="{{route('tech.update',$tech->id)}}" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<!-- row -->
				@if ($errors->any())
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">info</h6>
								</div>
								<br>
								<div class="row">
									<div class="col-4 form-group">
										<label for="name">Name</label>
										<input type="text" name="name" class="form-control" id="name" placeholder="insert name's technology" value="{{ $tech->name }}">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Upload image</h6>
								</div>
								<div class="row mb-4">
									<div class="col-sm-6">
										<input type="file" name="image_file" class="dropify" data-height="200" />
									</div>
									<div class="col-sm-6">
										<img style="width: 100%" src="{{ $tech->imageUrl }}" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card custom-card">
							<div class="card-body row">
								<div class="col-sm-6" style="margin: 0 auto">
									<input type="submit" class="btn btn-success btn-block" value="Save">
								</div>
							</div>
						</div>
					</div>
				</div>
				</form>
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!--Internal Sumoselect js-->
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

@endsection