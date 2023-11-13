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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid"> <a class="navbar-brand" href="/">Quierro Cafe</a> <button
                class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span
                    class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">About</a>
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
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="btn btn-primary rounded-pill" href="/userAccount">&nbsp;<i
                                    class="fas fa-user"></i>&nbsp; {{ auth()->user()->name }}</a>
                        </li>
                    </ul>
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
    <section id="create-product">
        <div class="container">
            @auth
                <div class="container my-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Create Product</h5>

                            <form action="/create-product" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="title" name="name"
                                        placeholder="Enter post title">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Product Description</label>
                                    <input type="text" class="form-control" id="title" name="description"
                                        placeholder="Enter description">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Product Price</label>
                                    <input type="number" class="form-control" id="title" name="price"
                                        placeholder="Enter post title">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" id="title" name="image"
                                        placeholder="Enter post title" acccept="image/*">
                                </div>

                                <button type="submit" class="btn btn-primary">Save Post</button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="container my-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Available Products</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($catalogue as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>Rs. {{ $item->price }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $item->image_path) }}"
                                                    alt="{{ $item->name }}" class="img-thumbnail" width="100">
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center"><a
                                                        href="/edit-product/{{ $item->id }}"
                                                        class="btn btn-secondary mr-2">Edit</a>
                                                    <form action="delete-product/{{ $item->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger mx-3">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            @else
                <script>
                    location.href = "/signin"
                </script>
            @endauth
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
