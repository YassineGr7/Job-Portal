<!DOCTYPE html>
<html>

<head>
    <title>Job Poster Credentials</title>
</head>

<body>
    <div style="text-align: center; background-color: #242b5e;padding: 20px; color:azure">
        <h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif "> <span
                style="color: #fa4983">Job</span>
            FInder Administration</h2>
    </div>
    <div style="border: 1px solid #242b5e; border-radius: 10px;padding: 15px">
        <h2>Welcome, <span style="font-style: italic">{{ $name }}!</span></h2>
        <p>Thank You for your trust ! <br> Your account as a Job Poster has been created.</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Password:</strong> {{ $password }}</p>
        <p>You can now log in and start posting jobs on our platform.</p>
    </div>

</body>

</html>
