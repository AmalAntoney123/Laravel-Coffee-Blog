<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <title>Quierro Cafe</title> <meta name="viewport"
  content="width=device-width, initial-scale=1"> <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


<style>
  /* .navtext {
      margin-top: 6px;
    } */

  .coffeetext1 {
    margin-top: 100px;
  }
</style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Quierro Cafe</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
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
            <a class="btn btn-primary rounded-pill" href="/userAccount">&nbsp;<i class="fas fa-user"></i>&nbsp; {{
              auth()->user()->name }}</a>
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
  <section id="hero">
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-7 d-flex justify-content-center align-items-center">
          <img src="images/hero-img.png" style="height:500px;" class="img-responsive" alt="Coffee bags">
        </div>
        <div class="col-md-5 " style="margin-top:150px;">
          <div class="h-100">
            <span class="text-primary">Whats new?</span>
            <h1 style="margin-top:0px">Meet our new coffee!</h1>
            <p>Try one of our signature selections and see what everyone's talking about. Scroll down the page to view
              all the possibilities.</p>
            <button type="button" class="btn btn-warning">Learn more</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="">
    <div class="container">
      <div class="row">

        <div class="col-md-6 coffeetext1">
          <h1>What's interesting about this coffee?</h1>
          <p>Try one of our signature selections and see what everyone's
            talking about or select 'Catalogue' at the top of the page to
            view all the possibilities. Try one of our signature selections
            and see what everyone's talking about or select Catalogue'
            at the top Of the page to view all the possibilities.</p>
          <a href="#">Read more ></a>
        </div>
        <div class="col-md-6  d-flex justify-content-center align-items-center">
          <img src="images/coffee1.png" class="img-fluid align-self-center" alt="Coffee bags" style="height:400px;">
        </div>
      </div>
    </div>
  </section>

  <section id="catalogue">
    <div class="container">
      <h1 class="my-5">Check out our sales for popular products</h1>
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="images/product1.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Coffee Retail Packs</h5>
              <p class="card-text">30% off</p>
              <p class="card-text">$7.49</p>
              <a href="#" class="btn btn-primary">Add to cart</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="images/product2.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Brazil Blend Arabica</h5>
              <p class="card-text">15% off</p>
              <p class="card-text">$7.89</p>
              <a href="#" class="btn btn-primary">Add to cart</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="images/product3.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Unicorn Blood Dark</h5>
              <p class="card-text">25% off</p>
              <p class="card-text">$7.38</p>
              <a href="#" class="btn btn-primary">Add to cart</a>
            </div>
          </div>
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
            Quierro Cafe is a cozy cafe located in the heart of Kanjirapalli. We serve a variety of coffee, tea, and
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