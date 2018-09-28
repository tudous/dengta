@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> Product /
                    @if($product->id)
                        Edit #{{$product->id}}
                    @else
                        Create
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($product->id)
                    <form action="{{ route('products.update', $product->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('products.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    
                <div class="form-group">
                	<label for="name-field">Name</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $product->name ) }}" />
                </div> 
                <div class="form-group">
                    <label for="price-field">Price</label>
                    <input class="form-control" type="text" name="price" id="price-field" value="{{ old('price', $product->price ) }}" />
                </div> 
                <div class="form-group">
                    <label for="category-field">category</label>
                        <select class="form-control" name="category_id" required>
                            <option value="" hidden disabled {{ $product->id ? '' : 'selected' }}>请选择分类</option>
                            @foreach ($categories as $value)
                                <option value="{{ $value->id }}"{{ $product->category_id == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                </div>


                <div class="form-group">
                    <label for="avatar-label">图片</label>
                    <input type="file" name="img">
                     @if($product->img)
                        <br>
                        <img class="thumbnail img-responsive" src="{{ $product->img }}" width="200" />
                    @endif

                </div>

                <!-- <div class="form-group">
                	<label for="img-field">Img</label>
                	<input class="form-control" type="text" name="img" id="img-field" value="{{ old('img', $product->img ) }}" />
                </div> -->

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-link pull-right" href="{{ route('products.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection