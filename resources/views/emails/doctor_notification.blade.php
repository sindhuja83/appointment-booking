<!DOCTYPE html>
<html>
<head>
    <title>Doctor Appointment Notification</title>
</head>
<body>
    <p>Hello, {{ $appointment->user->user_name }}</p>
    
    <p>A new appointment has been scheduled:</p>
    
    <ul>
        <li><strong>Patient Name:</strong> {{ $appointment->users->user_name }}</li>
        <li><strong>Date:</strong> {{ $appointment->date }}</li>
        <li><strong>Time:</strong> {{ $appointment->timeslot->start_time }} - {{ $appointment->timeslot->end_time }}</li>
    </ul>
 
    
    <p>If you have any questions or need assistance, please feel free to contact us.</p>
    
    <p>Best regards,<br>Your Website Team</p>
</body>
</html>
