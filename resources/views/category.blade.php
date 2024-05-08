@extends('layouts.admin', ['title' => 'Categories'])

@section('mainContent')
    <div class="container">
        <div class="row row-gap-3">
            @foreach ($categories as $item)
                
               <div class="col-md-6">
                <div class="single-category">
                    <h3 class="fw-bold">{{$item->name}}</h3>
                    <p class="m-0">Total Products: {{ $item->products_count }}</p>
                </div>
            </div>
            @endforeach
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{ $categories->links() }}
                </ul>
            </nav>
        </div>
    </div>
@endsection
