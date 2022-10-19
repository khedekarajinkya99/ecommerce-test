@extends('admin.adminlayout')

@section('content')
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="d-flex w-100 justify-content-between">
							<h4 class="card-title">Add Products</h4>
							<a href="{{ url('admin') }}" class="btn btn-danger pull-right text-white">Back</a>
						</div>
						<form class="forms-sample" id="productForm" action="{{ url('saveproduct') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label for="productname">Product Name</label>
								<input type="text" class="form-control" name="productname" id="productname" placeholder="Product Name">
							</div>
							<div class="form-group">
								<label for="price">Product Price</label>
								<input type="text" class="form-control" name="price" id="price" placeholder="Product Price">
							</div>
							<div class="form-group">
								<label>Product Image</label>
								<input type="file" name="products[]" class="form-control" multiple accept="image/png, image/jpeg">
								
							</div>
							<button type="submit" class="btn btn-primary me-2 text-white">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop