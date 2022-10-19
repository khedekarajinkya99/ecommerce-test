@include('home.includes.header')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <h4 >{{ $products->productName }}</h4>
                    <div class="row">
                        @foreach ($products->product_images as $values)
                        <div class="col-md-3">
                            <figure>
                                <img class="" src="{{ asset('storage/product_images') }}/{{ $values->imageName }}" alt="Product Image" style="width: 100%;">
                            </figure>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p class="btn btn-danger btn-block">{{ $products->productPrice }} ₹</p>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-success btn-block cartbtn" data-id="{{ $products->id }}">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@include('home.includes.footer')