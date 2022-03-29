@extends('layouts.all_parts')
@section('title')



@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Products</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>


@if ($errors->any())
    <div class="card mt-3">
        <div class="card-body">
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                   <p> {{ $error }}<p>
                @endforeach
            </div>
        </div>
    </div>
@endif




<form action="{{ route('products.update',$product->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="row">

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$product->name}}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="description" class="form-control" placeholder="Category" value="{{$product->description}}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{$product->price}}">
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>

</form>

@endsection