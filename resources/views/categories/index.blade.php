<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product Categories
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

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table {
            background-color: transparent; /* Remove white background */
            text-align: center;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-hover tbody tr:hover {
            color: #fff; /* Change text color on hover */
            background-color: #343a40; /* Darker background color on hover */
        }

        .table th,
        .table td {
            font-weight: bold; /* Make font bolder */
            color: #fff; /* Make font color white */
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #343a40; /* Dark border for better contrast */
        }

        /* Remove specific background color settings to avoid white backgrounds */
        .table-striped tbody tr:nth-of-type(odd),
        .table thead th,
        .table {
            background-color: transparent; /* Ensure backgrounds are not white */
        }

        .table thead th {
            vertical-align: bottom;
            
            border-bottom: 2px solid #343a40; /* Darker border for the table header */
            color: #fff; /* White color for table header text */
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .thead-dark th {
            color: #fff;
            background-color: #343a40;
            border-color: #454d55;
        }

        /* Enhancing the border contrast */
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #adb5bd;
        }

        /* Adding rounded corners to the table */
        .table-rounded {
            border-radius: 0.25rem;
        }

        .table-rounded th,
        .table-rounded td {
            border-radius: 0.25rem;
        }

        /* Assuming this is the default link style */
        a {
            color: #007bff;
            text-decoration: none;
            background-color: transparent;
        }

        /* Apply a similar style to buttons within the table */
        .table td .btn {
            color: #007bff; /* Match the link color */
            background-color: transparent;
            border: 1px solid #007bff; /* Give it a border to look like a link */
            padding: 0.375rem 0.75rem; /* Standard padding */
            font-size: 1rem; /* Match the font size of links */
            line-height: 1.5;
            border-radius: 0.25rem; /* Rounded corners */
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out; /* Smooth transition for hover effects */
        }

        .table td .btn:hover {
            color: #0056b3; /* Darker color on hover */
            background-color: #e9ecef; /* Slight background on hover */
            border-color: #0056b3; /* Darker border on hover */
        }
        /* Center-align buttons within a specific column */
        .table td.button-column {
            text-align: center; /* Center-align content */
        }

        .btn-danger {
            color: #fff; /* White text */
            background-color: #dc3545; /* Red background */
            border-color: #dc3545; /* Red border */
        }

        .btn-danger:hover {
            color: #fff; /* Keep text white on hover */
            background-color: #c82333; /* Darker red on hover */
            border-color: #bd2130; /* Darker border on hover */
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
        }
    </style>

    <div class="main-container">
        <div class="form-container">
            <h1>Product Categories</h1>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td class="button-column">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
