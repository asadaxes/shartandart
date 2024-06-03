@extends('front-old.master')
@section('body')
    <div class="container-fluid py-5">
        <h5 class="text-center">All Brands</h5>
        <hr class="w-25 mt-0 mx-auto">
        <div class="mt-4">
            @if($brands)
                @foreach ($brands as $brand)
                    <div class="d-inline-block mb-2">
                        <button class="btn btn-light disabled">{{ $brand->name }}</button>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
