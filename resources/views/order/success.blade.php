<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <style>
        /* Success Box Styling */
        .container h2 {
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.5px;
            font-weight: 600;
        }
    
        .container p {
            font-family: 'Roboto', sans-serif;
            color: #6c757d; /* Light gray for secondary text */
        }
    
        .btn {
            transition: all 0.3s ease-in-out;
            border-radius: 50px;
            font-size: 1rem;
        }
    
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
    
        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }
    
        .btn-outline-success {
            color: #28a745;
            border-color: #28a745;
        }
    
        .btn-outline-success:hover {
            background-color: #28a745;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }
    
        .shadow-lg {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    
        .bg-white {
            background: #fff;
        }
    
        body {
            background-color: #f8f9fa; /* Light background for contrast */
            margin: 0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    
        /* Center the container */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    
        /* Adjust button gap for better spacing */
        .gap-3 {
            gap: 1.2rem;
        }
    
        /* Border around the box for better visibility */
        .text-center {
            border-radius: 15px;
            border: 2px solid #e9ecef;
        }
    
        /* Add hover effect for better interactivity */
        .btn-lg:hover {
            transform: scale(1.05);
            transition: transform 0.2s ease;
        }
    </style>
</head>
<body>
    <div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="text-center shadow-lg p-5 rounded bg-white" style="max-width: 600px; border: 2px solid #e9ecef;">
            <!-- Success Icon -->
            <div class="d-inline-block mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="#28a745" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.293 9.293l-2.5-2.5a1 1 0 0 0-1.415 1.415l3 3a1 1 0 0 0 1.415 0l6-6a1 1 0 0 0-1.415-1.415l-5.293 5.293z"/>
                </svg>
            </div>
    
            <!-- Success Message -->
            <h2 class="mb-3 text-success font-weight-bold" style="font-size: 2rem;">Order Placed Successfully!</h2>
            <p class="mb-4 text-secondary" style="font-size: 1.2rem; line-height: 1.5;">
                Thank you for shopping with us! You will receive a confirmation email shortly with the details of your order.
            </p>
    
            <!-- Action Buttons -->
            <div class="mt-4 d-flex flex-column flex-sm-row justify-content-center gap-3">
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-sm" style="
                    background-color: #007bff;
                    border: none;
                    border-radius: 8px;
                    color: white;
                    font-size: 1rem;
                    font-weight: 600;
                    padding: 12px 24px;
                    box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
                    text-align: center;
                    transition: all 0.2s ease-in-out;
                " onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 14px rgba(0, 123, 255, 0.4)';" 
                   onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 10px rgba(0, 123, 255, 0.3)';">
                    Continue Shopping
                </a>
                <a href="{{ route('order.show') }}" class="btn btn-outline-success btn-lg px-5 py-3 rounded-pill shadow-sm" style="
                    border: 2px solid #28a745;
                    border-radius: 8px;
                    color: #28a745;
                    font-size: 1rem;
                    font-weight: 600;
                    padding: 12px 24px;
                    text-align: center;
                    box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
                    transition: all 0.2s ease-in-out;
                " onmouseover="this.style.backgroundColor='#28a745'; this.style.color='white'; this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 14px rgba(40, 167, 69, 0.4)';" 
                   onmouseout="this.style.backgroundColor='transparent'; this.style.color='#28a745'; this.style.transform='scale(1)'; this.style.boxShadow='0 4px 10px rgba(40, 167, 69, 0.3)';">
                    View Your Orders
                </a>
            </div>
            
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-lZN37fLJ6W6oapFztF3zW30AX4Y+nNLvCOGzQdxE9P4Lt+omHUco92Izj0O3On9z" crossorigin="anonymous"></script>

</body>
</html>







