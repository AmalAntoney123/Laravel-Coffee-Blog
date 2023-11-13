<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quierro Cafe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        /* .navtext { margin-top:
    6px; } */
        .coffeetext1 {
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg
    navbar-light bg-light">
        <div class="container-fluid"> <a class="navbar-brand" href="/">Quierro Cafe</a> <button
                class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span
                    class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"> <a class="nav-link" href="#footer">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#catalog">Catalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/shop">Shop</a>
                    </li>
                </ul>
                @auth
                    @if (auth()->user()->name == 'admin')
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="btn btn-primary rounded-pill" href="/admin">&nbsp;<i
                                        class="fas fa-user"></i>&nbsp; {{ auth()->user()->name }}</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="btn btn-primary rounded-pill" href="/userAccount">&nbsp;<i
                                        class="fas fa-user"></i>&nbsp; {{ auth()->user()->name }}</a>
                            </li>
                        </ul>
                    @endif
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="btn btn-secondary rounded-pill mx-3 " href="/logout">Logout</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="btn btn-primary rounded-pill" href="/signin">Sign In</a>
                        </li>
                    </ul>
                @endauth
                
        </div>
    </div>
</nav>
<section id="blog">

    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-10 pt-5 pb-3">
                    <h1>My Blog</h1>
                </div>
                <div class="col-md-2 pt-5 pb-3">
                    <a href="/create-blog"><button type="button" class="btn btn-primary">Create a new
                            blog</button></a>
                </div>
            </div>
            @if (session('editsuccess'))
                <div class="alert alert-success">
                    {{ session('editsuccess') }}
                </div>
            @endif
        </div>
        <div class="blog-card">

            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="blog-card-body bg-light rounded m-3 p-3">
                        <h5 class="card-title">{{ $post['title'] }}</h5>
                        <p class="card-text">{{ $post['body'] }}</p>
                        <p class="card-text"><small class="text-muted">Author: {{ $post->user->name }}</small></p>
                        <div class="d-flex align-items-center">
                            <a href="/edit-post/{{ $post->id }}" class="btn btn-secondary mr-2">Edit</a>
                            <form action="delete-post/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mx-3">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="blog-card-body bg-light rounded m-3 p-3">
                    <p>No posts available.</p>
                </div>
            @endif


        </div>
    </div>
</section>
<section id="order">

    <div class="container">
        <div class="container">
            <div class=" pt-5 pb-3">
                <h1>My Orders</h1>
            </div>

        </div>

        <div class="blog-card">
            <div class="blog-card-body bg-light rounded m-3 p-3">
                <h5>Order Information</h5>
                @if (count($orders) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->product->price }}</td>
                                    <td>{{ $order->payment }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No orders available.</p>
                @endif
            </div>
        </div>



    </div>
</section>

<footer class="bg-light text-center text-lg-start" id="footer">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Quierro Cafe</h5>

                <p>
                    Quierro Cafe is a cozy cafe located in the heart of Kanjirapalli. We serve a variety of coffee,
                    tea, and
                    snacks. Come visit us today!
                </p>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#!" class="text-dark">Home</a>
                    </li>
                    <li>
                        <a href="#!" class="text-dark">Menu</a>
                    </li>
                    <li>
                        <a href="#!" class="text-dark">About Us</a>
                    </li>
                    <li>
                        <a href="#!" class="text-dark">Contact Us</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Contact Us</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#!" class="text-dark">Address: 123 Main St, Kanjirapalli, Kerala</a>
                    </li>
                    <li>
                        <a href="#!" class="text-dark">Phone: +91 1234567890</a>
                    </li>
                    <li>
                        <a href="#!" class="text-dark">Email: info@quierrocafe.com</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Quierro Cafe: All Rights Reserved.
    </div>
</footer>
</body>

</html>
