<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Inquiry Alert</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .email-body {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }

        .email-footer {
            padding: 15px;
            text-align: center;
            font-size: 0.9em;
            color: #6c757d;
        }

        .email-content {
            margin-top: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f1f1f1;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 15px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .divider {
            margin: 20px 0;
            border-top: 1px solid #ddd;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container email-body">
        <div class="email-header">
            <h1>New Inquiry Received</h1>
        </div>
        <div class="email-content">
            <p>Dear Admin,</p>
            <p>You have received a new inquiry from a visitor on the construction website. Below are the details:</p>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $data['name'] }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $data['email'] }}</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>{{ $data['message'] }}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{ $data['date'] }}</td>
                    </tr>
                </tbody>
            </table>

            <p>If you wish to reply to this inquiry, please use one of the following options:</p>

            <a href="mailto:{{ $data['email'] }}?subject=Hello Sir/Madam:%20Your%20Inquiry%20on%20Our%20Website"
                class="btn-primary">Reply to Inquiry</a>

            <div class="divider"></div>

            <p class="text-center">Alternatively, you can manage this inquiry from the dashboard:</p>
            <a href="{{ route('testimonials.index') }}" class="btn-primary">Go to Dashboard</a>

            <p class="mt-4">Thank you,</p>
            <p>The Construction Website Team</p>
        </div>
        <div class="email-footer">
            <p>For any questions or additional support, please contact us at <a
                    href="mailto:support@constructionwebsite.com">support@constructionwebsite.com</a>.</p>
        </div>
    </div>
</body>

</html>
