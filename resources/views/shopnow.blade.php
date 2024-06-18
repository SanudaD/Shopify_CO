<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <title>Get Product</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        @keyframes gradientBackground {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        body {
            background: linear-gradient(270deg, #834f3e, #feb47b, #6a11cb, #5d636f);
            background-size: 800% 800%;
            animation: gradientBackground 15s ease infinite;
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
            gap: 20px;
        }

        .card {
            background-color: #eaedf7;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: calc(31% - 20px);
            padding: 20px;
            transition: transform 0.3s ease;
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
            background-color: #12a9ef;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
            position: absolute;
            top: 125px;
            right: 100px;
        }

        .btn-primary:hover {
            background-color: #167fe7;
            color: #1b14da;
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

        nav {
            background-color: rgb(23, 19, 19);
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: right;
        }

        ul li {
            margin-right: 20px;
        }

        ul li a {
            color: white;
            text-decoration: none;
        }

        .btn-login,
        .btn-register {
            background-color: #12a9ef;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-login:hover,
        .btn-register:hover {
            background-color: #e78c16;
            color: #545462;
        }

        h2 {
            font-size: 36px;
            text-align: center;
            margin-top: 20px; 
        }


    </style>
</head>
<body>
    <nav>
        <div>
            <style>
                @keyframes revealLetters {
                  0% { opacity: 0; transform: translateY(-20px); }
                  100% { opacity: 1; transform: translateY(0); }
                }

                h1 {
                  font-size: 36px;
                  font-weight: bold;
                  color: #b0811a;
                  text-transform: uppercase;
                  letter-spacing: 10px;
                  margin: 0;
                }

                h1 span {
                  display: inline-block;
                  opacity: 0;
                  animation: revealLetters 4s ease forwards infinite;
                  animation-delay: calc(0.2s * var(--index));
                }
              </style>
            <h1>
                <span style="--index: 1;">S</span>
                <span style="--index: 2;">h</span>
                <span style="--index: 3;">o</span>
                <span style="--index: 4;">p</span>
                <span style="--index: 5;">i</span>
                <span style="--index: 6;">f</span>
                <span style="--index: 7;">y</span>
                <span>&nbsp;</span>
                <span style="--index: 8;">C</span>
                <span style="--index: 9;">o</span>
                <span style="--index: 10;">.</span>
              </h1>


        </div>
        <ul>
            <li><a href="{{ route('login') }}" class="btn-login">Login</a></li>
            <li><a href="{{ route('register') }}" class="btn-register">Register</a></li>
        </ul>
    </nav>
    <div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Products') }}
        </h2>
    </div>

    <br/>
    <div class="container">
        <div class="card-container">
            @foreach($products as $product)
            <div class="card">
                <div class="card-header">
                    <h5>{{ $product->product_name }}</h5>
                </div>
                <div class="card-body">
                    @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}" class="product-image">
                    @endif
                    <p><strong>Code:</strong> {{ $product->code }}</p>
                    <p><strong>Price:</strong> ${{ $product->product_price }}</p>
                    <p><strong>User Name:</strong> {{ $product->user->name }}</p>
                    <br/>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
