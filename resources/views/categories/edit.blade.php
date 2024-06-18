@extends('layout')

@section('content')
    <h1>Edit Category</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $category->name }}">
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ $category->description }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
