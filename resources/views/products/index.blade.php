<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Products') }}
        </h2>
    </x-slot>
    <br/>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Get Product</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
      <style>
        body {
          background-color: #fbf5f5;
          font-family: 'Inter', sans-serif;
          color: #333;
          margin: 0;
          padding: 0;
        }
        .container {
          max-width: auto;
          margin: 0 auto;
          padding: 10px 20px;
        }
        .card-container {
          display: flex;
          flex-wrap: wrap;
          gap: 10px;
         
        }
        .card {
          background-color: #b2c1ef;
          border-radius: 10px;
          box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
          overflow: hidden;
          width: calc(33.33% - 20px);
          padding: 20px;
          transition: transform 0.3s ease;
          position: relative;
        }
        .card:hover {
          transform: translateY(-5px);
        }
        .card-header {
          background: linear-gradient(45deg, #5c30f9, #38060b);
          color: #fff;
          padding: 20px;
          border-radius: 10px 10px 0 0;
        }
        .card-header h5 {
          margin: 0;
          font-weight: 700;
        }
        .card-body {
          padding: 20px;
        }
        .btn-primary {
          background-color: #ff7f50;
          color: #fff;
          border: none;
          border-radius: 5px;
          padding: 10px 20px;
          cursor: pointer;
          font-size: 16px;
          transition: background-color 0.3s ease, color 0.3s ease;
          position: absolute;
          top: 81px;
          right: 160px;
        }
        .btn-primary:hover {
          background-color: #6786a6;
          color: #da1414;
        }
        .btn-outline-info {
          color: #007bff;
          border: 1px solid #007bff;
          border-radius: 5px;
          padding: 5px 10px;
          cursor: pointer;
          font-size: 14px;
          transition: background-color 0.3s ease, color 0.3s ease;
        }
        .btn-outline-info:hover {
          background-color: #007bff;
          color: #fff;
        }
        .product-image {
          width: 100%;
          height: auto;
          max-height: 200px;
          object-fit: cover;
          border-radius: 10px;
          margin-bottom: 15px;
        }
      </style>
    </head>
    <body>
      <div class="mt-4">
        <a href="{{ route('products.add') }}" class="btn btn-primary">Add Product</a>
      </div>
      <div class="container">
        <div class="card-container">
          @foreach($products as $product)
          <div class="card">
            <div class="card-header">
              <h5>{{ $product->product_name }}</h5>
            </div>
            @if ($product->image)
          
            <div>
            <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->product_name }}" class="product-image">
      </div>
 @endif

              <p><strong>Code:</strong> {{ $product->code }}</p>
              <p><strong>Price:</strong> ${{ $product->product_price }}</p>
              <p><strong>User Name:</strong> {{ $product->user->name }}</p>
              <p><strong>Product Category:</strong> @php
    $categoryFound = false;
@endphp

@foreach($products as $product)
    @if($product->category)
        {{-- Display the category name --}}
        {{ $product->category->category_name }}
        @php
            $categoryFound = true;
        @endphp
    @endif
@endforeach

@if(!$categoryFound)
    {{ __('No Category') }}
@endif</p>
             
              <br/>
              <div class="d-flex">
              <!-- @if($product->user_id == Auth::user()->id) -->
                <a href="{{ route('products.edit', ['Productid' => $product->id]) }}" class="btn btn-outline-info mr-2">Update</a>
                <a href="{{ route('products.destroy', ['Productid' => $product->id]) }}" class="btn btn-outline-info">Delete</a>
                <!-- @endif -->
              </div>
            </div>
         
          <br>
          
          @endforeach

  
          </div>
        </div>
      </div>

    </body>
    </html>
    
</x-app-layout>