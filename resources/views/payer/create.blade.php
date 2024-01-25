@extends('layouts.main')

@section('main-content')

					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __('tax_payer') }}</h1>
									<span class="h-20px border-gray-300 border-start mx-4"></span>
									<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
										<li class="breadcrumb-item text-muted">
											<a href="{{ url('/dashboard') }}" class="text-muted text-hover-primary">{{ __('home') }}</a>
										</li>
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-300 w-5px h-2px"></span>
										</li>
										<li class="breadcrumb-item text-dark">{{ __('tax_payer') }}</li>
									</ul>
								</div>
								<div class="d-flex align-items-center gap-2 gap-lg-3">
									<div class="m-0">
									</div>
								</div>
							</div>
						</div>

						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Form-->
								<form id="kt_ecommerce_edit_order_form" method="post" action="{{ url('SavePayer') }}" class="form d-flex flex-column flex-lg-row">
									 @csrf
									<!--begin::Aside column-->
									<div class="w-100 flex-lg-row-auto w-lg-300px mb-7 me-7 me-lg-10">
										<!--begin::Order details-->
										<div class="card card-flush py-4">
											<!--begin::Card header-->
											<div class="card-header">
												<div class="card-title">
													<h2>Quick Search</h2>
												</div>
											</div>
											<div class="card-body pt-0">
												<div class="d-flex flex-column gap-10">
													<div class="fv-row">
														<label class="required form-label">Criteria</label>
														<input type="text" name="" class="form-control mb-2">
														<div class="text-muted fs-7">Enter Name or Telephone to search</div>
													</div>
												</div>
											</div> 
											<div align="center">
												<button type="submit" class="btn btn-success" disabled>
													<span class="indicator-label">Search</span>
													<span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												</button>
										  </div>
										</div>
									</div>
									<div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
										<!--begin::Order details-->
										<div class="card card-flush py-4">
											<!--begin::Card header-->
											<div class="card-header">
												<div class="card-title">
													<h2>Payer Details</h2>
												</div>
											</div>
											@if(session()->has('success'))
													<div class="col-md-6" align="center">
														<div class="alert alert-success alert-dismissible fade show" role="alert">
  													  		<strong>Success!</strong> {{ session()->get('success') }}
  																<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    														<span aria-hidden="true">&times;</span>
	  														</button>
													  </div>
													</div>
											@endif
												@if ($errors->any())
    												<ul>
        												@foreach ($errors->all() as $error)
		            										<div>
		            											<p style="color: red">{{ $error }}</p>
		            										</div>
        										@endforeach
    												</ul>
											@endif
											<div class="card-body pt-0">
												<div class="d-flex flex-column gap-10">
													<!--begin::Input group-->
													<div>
														<div class="row mb-12">
															<div class="col-md-6 fv-row">
																<label class="required fs-6 fw-bold form-label mb-2">Surname 
																</label>
																<div class="row fv-row">
																	<div class="position-relative">
																		<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="Surname" name="surname" id="surname" />
																	</div>
																</div>
															</div>
															<div class="col-md-6 fv-row">
																<label class="required fs-6 fw-bold form-label mb-2">Othername </label>
																<div class="position-relative">
																	<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="Othername" name="othername" id="othername" />
																</div>
															</div>
														</div>
														<div class="row mb-12">
														<div class="col-md-6 fv-row">
															<!--begin::Label-->
															<label class="required fs-6 fw-bold form-label mb-2">Gender </label>
															<div class="row fv-row">
																<div class="position-relative">
																	<select class="form-control form-control-solid" name="gender" id="gender">
																		<option disabled selected>-Select-</option>
																		<option>FEMME</option>
																		<option>HOMME</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold form-label mb-2">National Id </label>
															<div class="position-relative">
																<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="National Id" name="national_id" id="national_id"/>
															</div>
														</div>
													</div>
													<div class="row mb-10">
														<div class="col-md-6 fv-row">
															<label class="fs-6 fw-bold form-label mb-2">Email </label>
															<div class="row fv-row">
																<div class="position-relative">
																	<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="Email" name="email" id="email" />
																</div>
															</div>
														</div>
														<div class="col-md-6 fv-row">
															<label class="fs-6 fw-bold form-label mb-2">File Number</label>
															<div class="position-relative">
																<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="File Number" name="file_number" id="file_number" />
															</div>
														</div>
													</div>
													<div class="row mb-10">
														<div class="col-md-6 fv-row">
															<!--begin::Label-->
															<label class="fs-6 fw-bold form-label mb-2">Voter's Id </label>
															<div class="row fv-row">
																<div class="position-relative">
																		<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="File Number" name="voter_id"  id="voter_id"/>
																</div>
															</div>
														</div>
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold form-label mb-2">Telephone</label>
															<div class="position-relative">
																<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="Telephone" name="telephone_1" id="telephone_1" />
															</div>
														</div>
													</div>
													<div class="row mb-10">
															<div class="col-md-6 fv-row">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mb-2">Telephone 2 (Optional) </label>
																<div class="row fv-row">
																	<div class="position-relative">
																		<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50"  name="telephone_2" id="telephone_2" />
																	</div>
																</div>
															</div>
															<div class="col-md-6 fv-row">
																<label class="fs-6 fw-bold form-label mb-2">Geolocation</label>
																<div class="position-relative">
																	<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50"  name="geolocation" id="geolocation" />
																</div>
															</div>
														</div>
														<div class="row mb-10">
															<div class="col-md-6 fv-row">
																<label class="fs-6 fw-bold form-label mb-2">Latitude</label>
																<div class="row fv-row">
																	<div class="position-relative">
																		<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="" name="latitude" id="latitude" />
																	</div>
																</div>
															</div>
															<div class="col-md-6 fv-row">
																<label class="fs-6 fw-bold form-label mb-2">Longitude</label>
																<div class="position-relative">
																	<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="" name="longitude" id="longitude" />
																</div>
															</div>
														</div>
														<div class="row mb-10">
															<div class="col-md-6 fv-row">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mb-2">Precision</label>
																<div class="row fv-row">
																	<div class="position-relative">
																		<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="" name="precision" id="precision" />
																	</div>
																</div>
															</div>
															<div class="col-md-6 fv-row">
																<label class="fs-6 fw-bold form-label mb-2">Altitute</label>
																<div class="position-relative">
																	<input type="text" class="form-control form-control-solid" minlength="3" maxlength="50" placeholder="Altitute" name="altitude" id="altitude" />
																</div>
															</div>
														</div>
														<div class="d-flex flex-column mb-7 fv-row">
															<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
																<span class="required">Address</span>
																<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify the address"></i>
																</label>
																<input type="text" class="form-control form-control-solid" placeholder="" name="address" id="address" />
													   </div>
													   <div class="row mb-10">
														<div class="col-md-6 fv-row">
															<!--begin::Label-->
															<label class="fs-6 fw-bold form-label mb-2">Village</label>
															<div class="row fv-row">
																<div class="position-relative">
																	<input type="text" class="form-control form-control-solid" minlength="3" maxlength="100" placeholder="" name="village" id="village" />
																</div>
															</div>
														</div>
														<div class="col-md-6 fv-row">
															<label class="fs-6 fw-bold form-label mb-2">City</label>
															<div class="position-relative">
																<input type="text" class="form-control form-control-solid" minlength="3" maxlength="100" placeholder="" name="city" id="city" />
															</div>
														</div>
													</div>
													 <div class="d-flex flex-column mb-7 fv-row">
															<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
																<span class="">Neighborhood</span>
																<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify the Neighborhood"></i>
															</label>
															<input type="text" class="form-control form-control-solid" placeholder="" name="neighborhood" id="neighborhood" />
														</div>
															<div class="row mb-10">
															<div class="col-md-6 fv-row">
																<label class="required fs-6 fw-bold form-label mb-2">Municipal</label>
																<div class="row fv-row">
																	<div class="position-relative">
																		<select name="business_type" class="form-select form-select-lg form-select-solid" placeholder="Select..." name="municipal" id="municipal">
																			<option disabled selected>-Select -</option>
																			<option value="Blita">Blita</option>
																			<option value="4">Limited Liability</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-md-6 fv-row">
																<label class="required fs-6 fw-bold form-label mb-2">Zone</label>
																<div class="position-relative">
																	<select name="business_type" class="form-select form-select-lg form-select-solid"  placeholder="Select..." name="zone_name" id="zone_name">
																		<option disabled selected>-Select -</option>
																		<option value="1">Zone 1</option>
																		<option value="1">Zone 2</option>
																		<option value="2">Zone 3</option>
																		<option value="3">Zone 4</option>
																	</select>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="d-flex justify-content-end">
											<a href="#" id="" class="btn btn-warning  me-5">Clear</a>
											<button type="submit" id="kt_ecommerce_edit_order_submit" class="btn btn-success">
												<span class="indicator-label">Submit </span>
												<span class="indicator-progress">Please wait...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
											</button>
										</div>
									</div>
									<!--end::Main column-->
								</form>
							</div>
						</div>
					</div>

@endsection			
	
	<script type="text/javascript">
	 	 $(document).ready(function () {
	    $('[data-kt-customer-table-filter="delete_row"]').on('click', function (e) {
	        e.preventDefault();

	        var payerId = $(this).data('payer-id');

	        // Add logic to confirm deletion and make an AJAX request to delete the payer
	        // Example: You can use the payerId to make an AJAX request to your delete endpoint
	        // $.ajax({
	        //    method: 'DELETE',
	        //    url: '/delete-payer/' + payerId,
	        //    success: function (response) {
	        //        // Handle success, e.g., remove the row from the table
	        //        $(this).closest('tr').remove();
	        //    },
	        //    error: function (error) {
	        //        // Handle error
	        //        console.error(error);
	        //    }
	        // });
	    });
	});
</script>
<script>
    $(document).ready(function () {
        $('#kt_create_account_form').submit(function (e) {
            e.preventDefault();

            // Serialize the form data
            var formData = $(this).serialize();

            // Make an Ajax request to save the payer
            $.ajax({
                url: "#", // Replace with your actual route
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                // dataType: 'json',
                success: function (data) {
                    // Handle the success response
                    console.log(data); // You can customize this part based on your needs
                    alert('Payer saved successfully');
                    // You may redirect or perform other actions here
                },
                error: function (xhr, status, error) {
                    // Handle the error response
                    console.error(xhr.responseText); // You can customize this part based on your needs
                    alert('Error saving payer');
                }
            });
        });
    });
</script>