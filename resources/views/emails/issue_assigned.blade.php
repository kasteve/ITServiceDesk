<!DOCTYPE html>
<html>
<head>
    <title>New Issue Assigned</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            color: #333333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h2 {
            color: #333333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        .highlight {
            color: #ff6600;
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }

        .footer p {
            color: #999999;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>New Issue Assigned</h3>
        <p>
            Hello <span class="highlight">{{ $issue->assigned_to }}</span>,
            <br><br>
            This issue <span class="highlight">[{{ $issue->issue_name }}]</span> has been assigned to you.
            <br>
            Please look into it and update the status <a href="http://localhost:8000/myroute">here</a>
            <br><br>
            <u><bold><emp>Issue Details:</emp></bold></u>
            <ul>
                <li>Reporter: {{ $issue->reporter_name }}</li>
                <li>Department: {{ $issue->department }}</li>
                <li>Issue Name: {{ $issue->issue_name }}</li>
                <li>Time of Reporting: {{ $issue->time_of_reporting }}</li>
                <li>Impacted Service: {{ $issue->impacted_service }}</li>
                <li>Other Comments: {{ $issue->comment }}</li>
            </ul>
            <br><br>
            Thank you,
            <br>
            <bold>{{ $issue->reporter_name }}</bold>
        </p>
    </div>
    <div class="footer">
        <p>Developed by Stephen Kakaire. All rights reserved @2023</p>
    </div>
</body>
</html>
