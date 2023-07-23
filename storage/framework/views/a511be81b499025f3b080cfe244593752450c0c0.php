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
            Hello <span class="highlight"><?php echo e($issue->assigned_to); ?></span>,
            <br><br>
            This issue <span class="highlight">[<?php echo e($issue->issue_name); ?>]</span> has been assigned to you.
            <br>
            Please look into it and update the status <a href="http://localhost:8000/myroute">here</a>
            <br><br>
            <u><bold><emp>Issue Details:</emp></bold></u>
            <ul>
                <li>Reporter: <?php echo e($issue->reporter_name); ?></li>
                <li>Department: <?php echo e($issue->department); ?></li>
                <li>Issue Name: <?php echo e($issue->issue_name); ?></li>
                <li>Time of Reporting: <?php echo e($issue->time_of_reporting); ?></li>
                <li>Impacted Service: <?php echo e($issue->impacted_service); ?></li>
                <li>Other Comments: <?php echo e($issue->comment); ?></li>
            </ul>
            <br><br>
            Thank you,
            <br>
            <bold><?php echo e($issue->reporter_name); ?></bold>
        </p>
    </div>
    <div class="footer">
        <p>Developed by Stephen Kakaire. All rights reserved @2023</p>
    </div>
</body>
</html>
<?php /**PATH C:\Users\stephen.kakaire\Documents\SteveTech\resources\views/emails/issue_assigned.blade.php ENDPATH**/ ?>