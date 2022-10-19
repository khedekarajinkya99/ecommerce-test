@extends('admin.adminlayout')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="d-flex w-100 justify-content-between">
							<h4 class="card-title">Cart List</h4>
						</div>
						<div class="table-responsive">
							<table class="table table-striped" id="cartTable">
								<thead>
									<tr>
										<th>Sr No.</th>
										<th>Product Name</th>
										<th>Product Price</th>
										<th>Product Images</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 1; @endphp
									@foreach ($cart as $value)
										<tr>
											<td>{{ $i }}</td>
											<td>{{ $value->productName }}</td>
											<td>{{ $value->productPrice }}</td>
											<td>
												<button class="btn btn-sm btn-primary text-white viewbtn" data-value="{{ $value->product_images }}">View Images</button>
											</td>
										</tr>
										@php $i++; @endphp
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="imageModal" class="modal fade" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div class="row" id="productImg">
        	
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@stop