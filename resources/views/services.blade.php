@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5">Our Services</h1>

    <!-- Service Section -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <img src="{{ asset('images/display.jpg') }}" class="card-img-top" alt="Screens">
                <div class="card-body">
                    <h5 class="card-title text-center">Screens</h5>
                    <p class="card-text">Our high-definition screens offer crisp visuals and vibrant colors, perfect for gaming, design, or professional use. Explore a variety of sizes and resolutions tailored to your needs.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <img src="{{ asset('images/mouse.jpg') }}" class="card-img-top" alt="Mouse">
                <div class="card-body">
                    <h5 class="card-title text-center">Mouse</h5>
                    <p class="card-text">Ergonomically designed, our mice provide precision, comfort, and durability. Whether you're a gamer or a professional, find the perfect fit for your hand and workflow.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <img src="{{ asset('images/ram.jpg') }}" class="card-img-top" alt="RAM">
                <div class="card-body">
                    <h5 class="card-title text-center">RAM</h5>
                    <p class="card-text">Boost your computer's performance with high-quality RAM. Designed for speed and reliability, our RAM options are perfect for multitasking, gaming, or professional workloads.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Shop Now Button -->
    <div class="text-center mt-4">
        <a href="{{ route('products.allProducts') }}" class="btn btn-primary btn-lg">Shop Now</a>
    </div>
    

   <!-- Why Choose Us Section -->
<div class="mt-5 text-center p-4" style="background-color: #f8f9fa; padding: 50px 0;">
    <h2 class="display-4 text-primary font-weight-bold">Why Choose Us?</h2>
    <p class="lead text-muted mb-4">We offer unmatched expertise, personalized attention, and a commitment to excellence.</p>
    
    <div class="row">
        <div class="col-md-4 mb-4 d-flex">
            <div class="card shadow-sm border-light rounded w-100 d-flex flex-column">
                <div class="card-body flex-grow-1">
                    <h4 class="card-title text-success font-weight-bold">Expertise</h4>
                    <p class="card-text">Our team brings years of industry experience to deliver top-notch solutions.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4 d-flex">
            <div class="card shadow-sm border-light rounded w-100 d-flex flex-column">
                <div class="card-body flex-grow-1">
                    <h4 class="card-title text-info font-weight-bold">Innovation</h4>
                    <p class="card-text">We use cutting-edge technology and approaches to create solutions that work for you.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4 d-flex">
            <div class="card shadow-sm border-light rounded w-100 d-flex flex-column">
                <div class="card-body flex-grow-1">
                    <h4 class="card-title text-warning font-weight-bold">Customer Focused</h4>
                    <p class="card-text">We prioritize your needs and tailor every service to fit your unique requirements.</p>
                </div>
            </div>
        </div>
    </div>
</div>


   <!-- Contact Us Section -->
<div class="mt-5 text-center" style="background-color: #f8f9fa; padding: 50px 0;">
    <h2 class="display-4 text-primary font-weight-bold">Contact Us</h2>
    <p class="lead text-muted mb-4">If you have any questions or would like to get started with our services, reach out to us!</p>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-light rounded">
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-row">
                                <!-- Name Field -->
                                <div class="form-group col-md-6">
                                    <label for="name" class="font-weight-bold">Your Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                                </div>
                                
                                <!-- Email Field -->
                                <div class="form-group col-md-6">
                                    <label for="email" class="font-weight-bold">Your Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                                </div>
                            </div>

                            <!-- Subject Field -->
                            <div class="form-group">
                                <label for="subject" class="font-weight-bold">Subject</label>
                                <input type="text" class="form-control" id="subject" placeholder="Enter subject" required>
                            </div>

                            <!-- Message Field -->
                            <div class="form-group">
                                <label for="message" class="font-weight-bold">Your Message</label>
                                <textarea class="form-control" id="message" rows="4" placeholder="Write your message here" required></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary btn-block">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Add this to your custom CSS file or inside <style> in the Blade view */
/* Card hover effect */
.card {
    border: none;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-10px) scale(1.05); /* Slightly elevate and scale up */
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2); /* Add a shadow on hover */
}

/* Styling for card images */
.card-img-top {
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease; /* Smooth transition for images */
}

.card:hover .card-img-top {
    transform: scale(1.1); /* Slight zoom effect on the image */
}

/* Card body padding */
.card-body {
    padding: 20px;
}

h2, h1 {
    color: #333;
    font-weight: bold;
}

h4 {
    color: #555;
}

.text-center {
    text-align: center;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}


</style>

@endsection
