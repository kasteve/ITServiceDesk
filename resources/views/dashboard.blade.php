<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Support Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .dashboard-container {
            margin-top: 20px;
        }
        .user-info {
            text-align: right;
            margin-bottom: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        .record-count {
            color: red;
            font-weight: bold;
        }
        .action-links {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 10px;
        }
        .action-links > * {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container dashboard-container">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <h4>Tech Support Dashboard</h4>
                <hr>
                <div class="user-info">
                    User: {{$user->email}}
                    <a href="logout">Logout</a>
                </div>
                <hr>
                <div class="action-links">
                    <p><strong>Unattended issues:</strong> <span class="record-count">{{ count($data) }}</span></p>
                    <div class="ms-auto">
                        <a href="add-issue" class="btn btn-primary me-2">New Issue</a>
                        <a href="#" class="btn btn-primary">Download Report</a>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead style="background-color: blue; color: white;">
                        <tr>
                            <th>IssueId</th>
                            <th>Reporter</th>
                            <th>Responsible Dept</th>
                            <th>Issue</th>
                            <th>Time</th>
                            <th>Affected Service</th>
                            <th>Assigned To</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $issue)
                            <tr>
                                <td>{{ $issue->id }}</td>
                                <td>{{ $issue->reporter_name }}</td>
                                <td>{{ $issue->department }}</td>
                                <td>{{ $issue->issue_name }}</td>
                                <td>{{ $issue->reported_at }}</td>
                                <td>{{ $issue->impacted_service }}</td>
                                <td>{{ $issue->assigned_to }}</td>
                                <td>{{ $issue->status }}</td>
                                <td>
                                    <a href="update-issue" class="btn btn-primary me-2">Update</a>
                                    <a href="#" class="btn btn-primary" style="background-color: red; color: white;">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
