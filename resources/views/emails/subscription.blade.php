<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .body {
            padding: 20px;
            text-align: center;
            color: #333;
        }

        .body p {
            font-size: 16px;
            line-height: 1.5;
            margin: 15px 0;
        }

        .button {
            margin-top: 20px;
        }

        .button a {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
        }

        .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #666;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Thank You for Subscribing!</h1>
        </div>

        <div class="body">
            <p>Hello <strong>{{ $email }}</strong>,</p>
            <p>We're thrilled to have you on board! Stay tuned for the latest trends, updates, and exclusive content straight to your inbox.</p>
            <div class="button">
                <a href="{{route("home")}}">Explore More</a>
            </div>
        </div>

        <div class="footer">
            <p>You're receiving this email because you subscribed on our website.</p>
            <p>Need help? <a href="#">Contact us</a>.</p>
        </div>
    </div>
</body>
</html>
