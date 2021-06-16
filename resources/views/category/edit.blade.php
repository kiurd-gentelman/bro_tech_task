@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Category / Edit</h1>
        </div>

        <a href="{{route('category.index')}}" class="btn btn-sm btn-primary mb-5">Go to list</a>
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
            <form method="post" action="{{route('category.update', $category->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category">Category Name</label>
                    <input type="text" class="form-control" name="name" id="category" aria-describedby="emailHelp" value="{{old('name') ?? $category->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea t class="form-control" id="exampleInputPassword1" name="description">{{old('description') ?? $category->description}}</textarea>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Update</button>
            </form>

        </div>

    </div>


@endsection
