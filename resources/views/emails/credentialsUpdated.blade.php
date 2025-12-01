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
        <h2>Welcome, <span style="font-style: italic">{{ $user->first_name . ' ' . $user->last_name }}!</span></h2>
        <p>Your account credentials have been successfully updated.</p>
        <p>If you did not make this change, please contact our support team immediately.</p>
        <p>Thank you,</p>
        <p>Job Finder Team</p>
    </div>

</body>

</html>
