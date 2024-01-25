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
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<div id="kt_content_container" class="container-xxl">
								<div class="card">
									<div class="card-header border-0 pt-6">
										<div class="card-title">
											<div class="d-flex align-items-center position-relative my-1">
												<span class="svg-icon svg-icon-1 position-absolute ms-6">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
													</svg>
												</span>
												<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="{{ __('search_payer') }}"/>
											</div>
										</div>
										<div class="card-toolbar">
											<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
												<div class="w-150px me-3">
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="{{ __('all') }}" data-kt-ecommerce-order-filter="status">
														<option></option>
														<!-- <option value="{{ __('all') }}">{{ __('all') }}</option> -->
														<option value="{{ __('active') }}">{{ __('active') }}</option>
														<option value="{{ __('inactive') }}">{{ __('Désactivé') }}</option>
													</select>
												</div>
												<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#kt_modal_create_account">{{ __('add_payer') }}</button>
											</div>
											<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
												<div class="fw-bolder me-5">
												<span class="me-2" data-kt-customer-table-select="selected_count"></span>{{ __('selected') }}</div>
												<button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected" disabled>{{ __('delete_selected') }}</button>
											</div>
										</div>
									</div>
									<div class="card-body pt-0">
										<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
											<thead>
												<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
													<th class="w-10px pe-2" disable>
														<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
															<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" disabled/>
														</div>
													</th>
													<th class="min-w-125px">{{ __('name') }}</th>
													<th class="min-w-125px">{{ __('gender') }}</th>
													<th class="min-w-125px">{{ __('status') }}</th>
													<th class="min-w-125px">{{ __('telephone') }}</th>
													<th class="min-w-125px">{{ __('national_id') }}</th>
													<th class="min-w-125px">{{ __('created_date') }}</th>
													<th class="text-end min-w-70px">{{ __('action') }}</th>
												</tr>
											</thead>
											<tbody class="fw-bold text-gray-600">
												 @foreach($payers as $payer)
												<tr>
													<td>
														<div class="form-check form-check-sm form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" />
														</div>
													</td>
													<td>
														{{ strtoupper($payer->Fullname) }}
													</td>
													<td>{{ $payer->GenderName }}</td>
													<td>
														@if ($payer->Status === 'ACTIVE')
                											<div class="badge badge-light-success">ACTIVE</div>
            											@else
                											<div class="badge badge-light-danger">INACTIVE</div>
														@endif
													</td>
													<td>
														@if ($payer->Telephone1)
                											{{ $payer->Telephone1 }}
            											@else
                											-
														@endif
													</td>
													<td> 
													@if ($payer->NationalIdNumber)
                										{{ $payer->NationalIdNumber }}
            										@else
                										-
            										@endif
													</td>
													<td>{{ \Carbon\Carbon::parse($payer->AddedDate)->format('Y-m-d') }}</td>
													<td class="text-end">
														<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">{{ __('action') }}
														<span class="svg-icon svg-icon-5 m-0">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
															</svg>
														</span>
														</a>
														<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3" data-payer-id="{{ $payer->TaxPayerId }}">{{ __('view') }}</a>
															</div>
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row" data-payer-id="{{ $payer->TaxPayerId }}">{{ __('delete') }}</a>
															</div>
														</div>
													</td>
												</tr>	
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
@endsection

	 <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#kt_customers_table').DataTable();
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all the 'Detail' links
        var detailLinks = document.querySelectorAll('[data-payer-id]');

        // Attach click event to each 'Detail' link
        detailLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();

                // Get the TaxPayerId from the data attribute
                var payerId = link.getAttribute('data-payer-id');

                // Make an AJAX request to fetch details
                fetch('/get-taxpayer-details/' + payerId)
                    .then(response => response.json())
                    .then(data => {
                        // Assuming you have a function to display details in a modal
                        displayDetailsModal(data);
                    })
                    .catch(error => {
                        console.error('Error fetching taxpayer details:', error);
                    });
            });
        });

        // You can define the displayDetailsModal function according to your needs
        function displayDetailsModal(data) {
            // Implement the logic to display details in a modal
            // You can use a library like Bootstrap modal or create your own modal
            console.log('Taxpayer Details:', data);
        }
    });
</script>

	<script type="text/javascript">
	 	 $(document).ready(function () {
	    $('[data-kt-customer-table-filter="delete_row"]').on('click', function (e) {
	        e.preventDefault();

	        var payerId = $(this).data('payer-id');

	       
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
                url: '/save-payer', // Replace with your actual route
                type: 'POST',
                data: formData,
                dataType: 'json',
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