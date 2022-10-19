@include('home.includes.header')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                @foreach($cart as $values)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/product_images') }}/{{ $values->product_images }}" alt="Product Image">
                        <div class="card-body">
                            <h4 class="card-title"><a href="{{ url('viewproduct') }}/{{ $values->id }}">{{ $values->productName }}</a></h4>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block">{{ $values->productPrice }} ₹</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@include('home.includes.footer')