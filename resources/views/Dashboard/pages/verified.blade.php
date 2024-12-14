<!-- resources/views/emails/verified.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verified</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .verification-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .verification-container h1 {
            font-size: 2.5rem;
            color: #28a745;
        }

        .verification-container p {
            font-size: 1.2rem;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .btn-home {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-home:hover {
            background-color: #218838;
            color: white;
        }
    </style>
</head>

<body>

    <div class="verification-container">
        <img src="https://img.icons8.com/fluency/96/000000/ok.png" alt="Verified" class="mb-4">
        <h1>Email Verified!</h1>
        <p>Thank you for verifying your email address. Your subscription has been successfully activated.</p>
        <a href="{{ url('/') }}" class="btn-home">Go Home</a>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
