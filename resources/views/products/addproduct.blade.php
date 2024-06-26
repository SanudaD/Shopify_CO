<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a Product') }}
        </h2>
    </x-slot>
    <br/>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .main-container {
            display: flex;
            justify-content: center;
            min-height: calc(100vh - 4rem);
            padding: 20px;
        }
        .form-container {
            background: linear-gradient(135deg, #2e3032, #3f6de0);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 30px;
            color: #fff;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
            color: #fff;
        }
        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff;
            outline: none;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .error-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .error-list li {
            color: #dc3545;
            margin-bottom: 5px;
        }
    </style>

    <div class="main-container">
        <div class="form-container">
            <h1>Create a Product</h1>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="error-list">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{ route('addproduct') }}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="code">Code</label>
                    <input type="text" name="code" class="form-control" id="code" placeholder="Enter product code">
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter product name">
                </div>
                <div class="form-group">
                    <label for="product_price">Price</label>
                    <input type="text" name="product_price" class="form-control" id="product_price" placeholder="Enter product price">
                </div>
                <div class="form-group">
                    <label for="product_category">Category</label>
                    <select name="product_category" class="form-control" id="product_category">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->product_category_code }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
                <br/><br/>
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save New Product</button>
            </form>
        </div>
    </div>
</x-app-layout>
