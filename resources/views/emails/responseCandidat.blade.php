<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status Update</title>
</head>

<body>
    <div style="text-align: center; background-color: #242b5e;padding: 20px; color:azure">
        <h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif "> <span
                style="color: #fa4983">Job</span>
            FInder Administration</h2>
    </div>

    <div style="border: 1px solid #242b5e; border-radius: 10px;padding: 15px">
        <h2>Hello, {{ $candidateName }}</h2>

        @if ($status === 'Accepted')
            <p>We are pleased to inform you that you have been <strong style="color: rgb(10, 158, 10)">accepted</strong>
                for
                the position of <b>{{ $jobTitle }}</b> at <b>{{ $companyName }} </b>.
            </p>
            <p>Thank you for applying to <b>{{ $companyName }}</b>. We wish you the best in your New Job.</p>

        @elseif($status === 'Rejected')
            <p>We regret to inform you that your application for the position 
              of <b>{{ $jobTitle }}</b> at <b>{{ $companyName }} </b>
                has been <strong style="color: rgb(222, 14, 14)">rejected</strong>.
            </p>
            <p>We Wish You all the best in the futur .</p>
        @endif


        <p>
          Best regards,<br> <b>{{ $companyName }} Team </b>
        </p>
    </div>
</body>

</html>
