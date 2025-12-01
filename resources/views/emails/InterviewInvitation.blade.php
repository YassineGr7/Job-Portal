<!DOCTYPE html>
<html>

<head>
    <title>Application New News</title>
</head>

<body>
    <div style="text-align: center; background-color: #242b5e;padding: 20px; color:azure">
        <h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif "> <span
                style="color: #fa4983">Job</span>
            FInder Administration</h2>
    </div>
    <div style="border: 1px solid #242b5e; border-radius: 10px;padding: 15px">
        <p>Dear {{ $application->user->first_name }} {{ $application->user->last_name }},</p>
        <p>We are pleased to inform you that you have been invited to interview for the position of
            <strong>{{ $jobTitle }}</strong> at <strong>{{ $companyName }}</strong>.</p>
        <p>Your interview is scheduled for: <strong>{{ $interviewDate }}</strong>.</p>
        

        <p>Please contact us if you have any questions or need to reschedule.</p>

        <p>Best regards,</p>
        <p>{{ $companyName }} Team</p>
        
        <p>Thank You for your trust ! <br> Your account as a Job Poster has been created.</p>
    </div>

</body>

</html>
