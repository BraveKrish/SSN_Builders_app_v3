<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Listing Mail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center">{{ $mailData['title'] }}</h1>
                <p class="card-text">{{ $mailData['description'] }}</p>



                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cumque perspiciatis numquam quia?
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel quam cum ad architecto perspiciatis
                    deserunt eligendi aliquid corrupti, voluptatem obcaecati aliquam iste a praesentium sed voluptas
                    nemo
                    asperiores. Voluptatibus, quaerat?</p>

                <h3 class="mt-4">Job Listings</h3>
                <table class="table table-bordered mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Job Title</th>
                            <th scope="col">Location</th>
                            <th scope="col">Type</th>
                            <th scope="col">Posted On</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($mailData as $job) --}}
                        <tr>
                            <td>{{ $mailData['title'] }}</td>
                            <td>{{ $mailData['location'] }}</td>
                            <td>{{ $mailData['job_type'] }}</td>
                            <td>{{ $mailData['posted_date'] }}</td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>

                <p class="mt-4">Thank you for considering these opportunities. We hope you find the perfect fit for
                    your skills and career goals.</p>

                <p class="text-muted">If you have any questions, feel free to reply to this email.</p>
            </div>
        </div>
    </div>
</body>

</html>
