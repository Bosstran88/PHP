@extends('books.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Add book</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top: 10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('books.index')}}">Back</a>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store')}}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Book ID:</strong>
                    <input type="number" name="bookid" class="form-control" placeholder="Book Id">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Author ID</strong>
                    <input type="number" class="form-control"  name="authorid" placeholder="Author ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title</strong>
                    <textarea class="form-control" style="height: 150px" name="title" placeholder="Title"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ISBN</strong>
                    <input type="number" class="form-control"  name="ISBN" placeholder="ISBN">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>pub_year</strong>
                    <input type="number" class="form-control"  name="pub_year" placeholder="pub_year">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Available</strong>
                    <input type="number" class="form-control"  name="available" placeholder="Available">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
