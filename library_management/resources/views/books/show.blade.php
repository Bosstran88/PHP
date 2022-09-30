@extends('books.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Show Book</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top: 10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{route('books.index')}}">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Book ID</strong>
                {{$book->bookid}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-control">
                <strong>Product Description:</strong>
                {{$product->product_desc}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                {{$product->product_qty}}
            </div>
        </div>
    </div>
@endsection
