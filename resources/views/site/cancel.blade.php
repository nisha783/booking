<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Canceled</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #e0f7fa 100%);
            font-family: Arial, sans-serif;
            color: #333;
        }

        .cancel-section {
            text-align: center;
            padding: 3rem 2rem;
            background-color: #dc3545;
            color: #ffffff;
            border-radius: 12px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 5rem auto;
        }

        .cancel-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .cancel-section p {
            font-size: 1.2rem;
            color: #f5f5f5;
            margin-bottom: 2rem;
        }

        .btn-home {
            background-color: #333;
            color: #ffffff;
            padding: 0.7rem 2rem;
            border-radius: 8px;
            font-size: 1rem;
            text-decoration: none;
        }

        .btn-home:hover {
            transform: scale(1.05);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

<div class="cancel-section">
    <h1>Booking Canceled</h1>
    <p>Your booking was canceled. If you have any questions, please contact support.</p>
    <a href="{{ route('site.home') }}" class="btn-home">Return to Home</a>
</div>

</body>
</html>