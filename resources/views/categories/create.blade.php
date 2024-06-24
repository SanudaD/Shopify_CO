<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
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
            <h1>Create Category</h1>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="error-list">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category_code">Category Code</label>
                    <input type="text" name="category_code" id="category_code" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input name="category_name" id="category_name" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>