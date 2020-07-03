@extends('layouts.app')

@section('content')
<a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add New</a>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-info btn-sm">Edit</a>
            </td>
            <td>
                <form action="{{ route('products.destroy', $product) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
