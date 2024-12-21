@extends('layouts.app')

@section('content')
    <style>
        .card {
            transition: box-shadow .3s;
            border: 1px solid rgb(133, 133, 133);
        }

        .card:hover {
            box-shadow: 5px 5px 11px rgba(33, 33, 33, 0.452)
        }

        .service {
            border-radius: 10px;
        }

        .service:hover {
            transition: 600ms all ease;
            color: white;
            background: #212529;
        }
    </style>

    <div class="container-fluid">
        <section class="mt-3" id="#home">
            {{-- <div class="contianer ml-5 row">
                <h1 class="mt-3 ml-1">
                    
                </h1>
            </div> --}}
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-6 order-lg-1 mt-4">
                        <h1 style="font-size:54px; font-weight:bolder;"><b>Next Gen Computex</b></h1><br><br> <br>
                        <h3 class="font-italic">IF YOU BUILD IT, THEY <br>
                            <h1 class="font-weight-bolder"> WILL LOSE.</h1>
                        </h3> <br>
                        <h5>Ushering a new dawn for <br>
                            <h5 class="font-weight-bolder">Gaming Computers</h5>
                        </h5>
                        <br>
                        <br>
                        <a href="{{ route('products.allProducts') }}" role="button" class="btn bttn btn-outline-dark shadow w-50">Get
                            Started -></a>

                    </div>
                    <div class="col-lg-6 order-lg-2 p-5" style="margin-top:-5%">
                        <img src="{{ URL::asset('images/main.png') }}" alt="landing image"
                            class="img-fluid rounded mx-auto d-block avatar">
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5 mb-5" id="products">
            <div class="contianer ml-5 row">
                <h3>
                    <br><br>
                    <b>Products</b>
                    <hr class="mr-4 bg-dark">
                    <br>
                </h3>
            </div>
            <div class="container w-75 d-flex justify-content-center">
                <div class="row">
                    <div class="contianer ">
                        <div class="row row-cols-1 row-cols-md-3">

                            <div class="col mb-4">
                                <a href="{{ route('products.displays') }}" class="card-link text-dark">
                                    <div class="card h-100">
                                        <img src="https://images.unsplash.com/photo-1552831388-6a0b3575b32a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTh8fG1vbml0b3J8ZW58MHx8MHx8&w=1000&q=80"
                                            class="card-img-top" alt="Displays">
                                        <div class="card-body">
                                            <h5 class="card-title">Displays</h5>
                                            <p class="card-text">Enhance your visual experience with our high-resolution
                                                display, providing crisp, vibrant images for work, gaming, or media
                                                consumption.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>









                            <div class="col mb-4">
                                <a href="{{ route('products.ram') }}" class="card-link text-dark">
                                    <div class="card h-100">
                                        <img src="https://images.unsplash.com/photo-1562976540-1502c2145186?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cmFtfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                                            class="card-img-top" alt="RAM">
                                        <div class="card-body">
                                            <h5 class="card-title">RAM (Random Access Memory)</h5>
                                            <p class="card-text">Upgrade your system with high-performance RAM, ensuring
                                                smoother multitasking and faster processing for all your computing needs.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col mb-4">
                                <a href="{{ route('products.ssd') }}" class="card-link text-dark">
                                    <div class="card h-100">
                                        <img src="https://images.unsplash.com/photo-1588420833265-28d5eec41d4f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjB8fGhhcmQlMjBkcml2ZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                            class="card-img-top" alt="HDD">
                                        <div class="card-body">
                                            <h5 class="card-title">SSD (Solid State Drive)</h5>
                                            <p class="card-text">Store your files securely with our reliable HDDs, offering
                                                ample storage space and fast data access for both work and entertainment.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>







                            <div class="col mb-4">
                                <a href="{{ route('products.mouse') }}" class="card-link text-dark">
                                    <div class="card h-100">
                                        <img src="https://images.unsplash.com/photo-1613141411244-0e4ac259d217?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTl8fGdhbWluZyUyMG1vdXNlfGVufDB8fDB8fA%3D%3D&w=1000&q=80"
                                            class="card-img-top" alt="Mouse">
                                        <div class="card-body">
                                            <h5 class="card-title">Mouse</h5>
                                            <p class="card-text">Navigate with precision and comfort using our ergonomic
                                                mouse, designed for seamless control and ease during long hours of use.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col mb-4">
                                <a href="{{ route('products.keyboards') }}" class="card-link text-dark">
                                    <div class="card h-100">
                                        <img src="https://images.unsplash.com/photo-1638909067462-1310c4011610?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8ODJ8fGtleWJvYXJkfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                                            class="card-img-top" alt="Keyboard">
                                        <div class="card-body">
                                            <h5 class="card-title">Keyboard</h5>
                                            <p class="card-text">Type with ease and comfort with our responsive keyboard,
                                                perfect for both work and gaming enthusiasts seeking reliability and speed.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col mb-4">
                                <a href="{{ route('products.headphones') }}" class="card-link text-dark">
                                    <div class="card h-100">
                                        <img src="https://images.unsplash.com/photo-1610041321327-b794c052db27?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8Z2FtaW5nJTIwaGVhZHBob25lc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                            class="card-img-top" alt="Headphones">
                                        <div class="card-body">
                                            <h5 class="card-title">Headphone</h5>
                                            <p class="card-text">Immerse yourself in superior sound quality with our premium
                                                headphones, delivering clear, rich audio for an enhanced listening
                                                experience.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
        </section>
        



        <section class="mt-5 mb-5" id="#about">
            {{-- Subscribsion --}}

            <div class="subscribe">
                <div class="titles">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <h5 class="font-weight-bolder">GET THE LATEST TRENDS FIRST</h5>
<form action="{{ route('contact.us.store') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="ENTER YOUR EMAIL" autocomplete="off">
    <button class="arrow" type="submit">→</button>
    <br>
    @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
    @if (session('success'))
        <span class="text-success">{{ session('success') }}</span>
    @endif
</form>

                </div>
                <div class="container mb-5 mt-3">
                    <nav class="navbar justify-content-center" style="background: none; !important">
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a href="https://www.facebook.com" target="_blank" class="nav-link ">
                                    <i class=" social fa-brands fa-square-facebook"></a></i>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.instagram.com" target="_blank" class="nav-link ">
                                    <i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.tiktok.com" target="_blank" class="nav-link ">
                                    <i class="fa-brands fa-tiktok"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.youtube.com" target="_blank" class="nav-link ">
                                    <i class="fa-brands fa-youtube"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.twitter.com" target="_blank" class="nav-link ">
                                    <i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.pinterest.com" target="_blank" class="nav-link ">
                                    <i class="fa-brands fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </div>
@endsection
