@extends('layouts.app')

@section('content')
<form action="{{ route('products.update', $product) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name"
            value="{{ old('name') ?? $product->name }}">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price"
            value="{{ old('price') ?? $product->price }}">
        @error('price')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="image">image</label>
        <input type="file" class="form-control" name="image">
        <div class="text-primary">Optional</div>
        @error('image')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description"
            rows="3"> {{ old('description') ?? $product->description }} </textarea>
        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
