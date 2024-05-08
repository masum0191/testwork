@extends('layouts.admin', ['title' => 'Products'])

@section('mainContent')
    <div class="container">
        <div class="products mb-3">
            @foreach($products as $product)
                <div class="__single">
                <div class="image">
                    <img class="w-100" src="https://www.bdshop.com/pub/media/catalog/product/cache/eaf695a7c2edd83636a0242f7ce59484/b/a/baseus_6-in-1_usb_c_hub.jpg" alt="">
                </div>
                <div>
                    <h2> {{ $product->name }}</h2>
                    <div>
                        <p class="fw-bold m-0">Categories:</p>
                        <div>
                            @foreach($product->categories as $category)
                                <span class="badge bg-info text-capitalize">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <p class="fw-bold m-0">Features:</p>
                        <ul>
                            @foreach($product->features as $feature)
                                <li class="text-capitalize">{{ $feature->name }}</li>
                                @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <nav aria-label="Page navigation example mt-2">
            <ul class="pagination">
                {{ $products->links() }}
            </ul>
        </nav>
    </div>

    <script>
        $("#imgSrc").attr('src', "https://ui-avatars.com/api/?background=random&color=fff&name={{ auth()->user()->name }}")
    </script>
@endsection
