<!DOCTYPE html>
<html>

<head>
    <title>Verify Your Email</title>
</head>

<body>
    <h2>Thank you for subscribing to our newsletter!</h2>
    <p>Please click the link below to verify your email address:</p>
    <a href="{{ route('verify.email', $token) }}">Verify Email</a>
</body>

</html>
