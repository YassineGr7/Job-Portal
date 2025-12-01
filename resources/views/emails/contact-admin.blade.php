<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Message</title>
</head>
<body>
    <div style="text-align: center; background-color: #242b5e;padding: 20px; color:azure">
        <h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif "> <span
                style="color: #fa4983">Job</span>
            FInder Contact Page</h2>
    </div>
    <div style="border: 1px solid #242b5e; border-radius: 10px;padding: 15px">
        <h2>New Contact Message</h2>
        <p><strong>From : </strong> {{ $name }} - {{ $email }} </p>
        <p><strong>Subject:</strong> {{ $subject }}</p>
        <p><strong>Message:</strong> <br> {{ $messageContent }}</p>
    </div>
</body>
</html>
