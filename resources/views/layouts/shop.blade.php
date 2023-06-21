@extends('layouts.main')
@section('relleno')
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

       

            <div class="col-lg-9">
              
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/img/' . $product->img) }}">
                                    <div
                                        class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li><a class="btn btn-success text-white mt-2"
                                                    href="{{ route('shop-single', ['product' => $product->id]) }}"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="shop-single.html" class="h3 text-decoration-none">{{ $product->name }}</a>
                                    <p class="text-center mb-0">{{ $product->price }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->
  
    <!--End Brands-->
@endsection
