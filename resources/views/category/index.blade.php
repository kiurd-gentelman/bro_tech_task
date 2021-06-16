@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Category</h1>
        </div>

        <a href="{{route('category.create')}}" class="btn btn-sm btn-primary mb-5">Create</a>

        @if(session()->has('message'))
            <div class="alert alert-success mt-2">
                {{ session()->get('message') }}
            </div>
        @endif
        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">Category name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{route('category.show',$category->id)}}" class="btn btn-sm btn-info">Show</a>
                    <form action="{{route('category.destroy',$category->id)}}" method="post" id="delete_form_{{$category->id}}" style="display: none">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{$category->id}}" name="id">
                    </form>
                    <a href="" class="btn btn-danger btn-sm"
                       onclick="
                           if(confirm('Are sure to delete?'))
                           {
                           event.preventDefault();
                           document.getElementById('delete_form_{{$category->id}}').submit();
                           }else{
                           event.preventDefault();
                           }
                           "> Delete
                    </a>
{{--                    <a href="{{route('category.delete',$category->id)}}" class="btn btn-sm btn-danger">Delete</a>--}}
                </td>
            </tr>
            @empty
                <tr>
                    <td class="text-center">No date Found</td>
                </tr>

            @endforelse
            </tbody>
        </table>
    </div>


@endsection
