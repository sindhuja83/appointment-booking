<!DOCTYPE html>
<html>
<head>
    <title>Patient Appointment Notification</title>
</head>
<body>
    <p>Dear {{ $appointment->users->user_name }},</p>
    
    <p>Your appointment has been booked successfully.</p>
    
    <ul>
        <li><strong>Doctor Name:</strong> {{ $appointment->user->user_name }}</li>
        <li><strong>Date:</strong> {{ $appointment->date }}</li>
        <li><strong>Time:</strong> {{ $appointment->timeslot->start_time }} - {{ $appointment->timeslot->end_time }}</li>
    </ul>
    
    <p>If you have any questions or need assistance, please feel free to contact us.</p>
    
    <p>Best regards,<br>Your Website Team</p>
</body>
</html>
