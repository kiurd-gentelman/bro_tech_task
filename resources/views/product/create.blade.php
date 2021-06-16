@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Product / create</h1>
        </div>

        <a href="{{route('product.index')}}" class="btn btn-sm btn-primary mb-5">Go to list</a>
        @if ($errors->any())
            <div class="alert alert-danger mt-1">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-5">
            <form method="post" action="{{route('product.store')}}">
                @csrf
                <div class="form-group">
                    <label for="category">Product Name</label>
                    <input type="text" class="form-control" name="name" id="category" aria-describedby="emailHelp" value="{{old('name')}}">
                </div>

                <div class="form-group">
                    <label for="category">Product Name</label>
                    <select name="category_id" class="custom-select from-control" id="category">
                        @forelse($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @empty
                        <option>No date found</option>
                        @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea t class="form-control" id="exampleInputPassword1" name="description">{{old('description')}}</textarea>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Submit</button>
            </form>

        </div>

    </div>


@endsection
