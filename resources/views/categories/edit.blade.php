<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
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
        .form-group.disabled {
        opacity: 0.5;
    }
    .form-group.disabled .form-control {
        background-color: #e9ecef;
        cursor: not-allowed;
    }
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 5px;
    }
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }
    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }
    </style>

    <div class="main-container">
        <div class="form-container">
            <h1>Edit Category</h1>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="error-list">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category_code">Category Code</label>
                    <input type="text" name="category_code" id="category_code" class="form-control" value="{{ old('category_code', $category->product_category_code) }}" disabled >
                    <input type="hidden" name="category_code" id="category_code" class="form-control" value="{{ old('category_code', $category->product_category_code) }}" >
                </div>
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" name="category_name" id="category_name" class="form-control" value="{{ old('category_name', $category->category_name) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form> 
        </div>
    </div>
</x-app-layout>