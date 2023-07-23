<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View and Update Issue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .view-issue-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            background-color: #f2039267;
        }
        .view-issue-form {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            background-color: #ffffff;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="view-issue-container">
        <div class="view-issue-form">
            <h4>Update Issue</h4>
            <form action="{{ route('update-issue', ['id' => $issue->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reporter_name">Name of Reporter</label>
                            <input type="text" class="form-control" value="{{ $issue->reporter_name }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input type="text" class="form-control" value="{{ $issue->department }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="issue_name">Issue Name</label>
                    <input type="text" class="form-control" value="{{ $issue->issue_name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="time_of_reporting">Time of Reporting</label>
                    <input type="text" class="form-control" value="{{ $issue->reported_at->format('Y-m-d H:i:s') }}" disabled>
                </div>
                <div class="form-group">
                    <label for="impacted_service">Impacted Service</label>
                    <input type="text" class="form-control" value="{{ $issue->impacted_service }}" disabled>
                </div>
                <div class="form-group">
                    <label for="assigned_to">Assigned To</label>
                    <input type="text" class="form-control" value="{{ $issue->assigned_to }}" disabled>
                </div>
                <!-- ... -->
                <!-- ... -->
                <div class="form-group">
                    <label for="second_assigned_to">Second Assigned To</label>
                    @if ($issue->second_assigned_to)
                        <select class="form-control" name="second_assigned_to">
                            <option value="">Select Resource</option>
                            <option value="stephen.kakaire@interswitchgroup.com" {{ $issue->second_assigned_to == 'stephen.kakaire@interswitchgroup.com' ? 'selected' : '' }}>Stephen Kakaire</option>
                            <option value="marymagdalene.naggita@interswitchgroup.com" {{ $issue->second_assigned_to == 'marymagdalene.naggita@interswitchgroup.com' ? 'selected' : '' }}>Mary Nagitta Magdalene</option>
                            <option value="marvin.sendikaddiwa@interswitchgroup.com" {{ $issue->second_assigned_to == 'marvin.sendikaddiwa@interswitchgroup.com' ? 'selected' : '' }}>Marvin Sendikaddiwa</option>
                            <option value="husseinkadir.mugume@interswitchgroup.com" {{ $issue->second_assigned_to == 'husseinkadir.mugume@interswitchgroup.com' ? 'selected' : '' }}>Hussein Kadir Mugume</option>
                            <option value="denis.kagimu@interswitchgroup.com" {{ $issue->second_assigned_to == 'denis.kagimu@interswitchgroup.com' ? 'selected' : '' }}>Denis Kagimu</option>
                            <option value="morgan.kamoga@interswitchgroup.com" {{ $issue->second_assigned_to == 'morgan.kamoga@interswitchgroup.com' ? 'selected' : '' }}>Morgan Kamoga</option>
                            <option value="james.okoth@interswitchgroup.com" {{ $issue->second_assigned_to == 'james.okoth@interswitchgroup.com' ? 'selected' : '' }}>James Okoth</option>
                            <option value="joseph.lusoma@interswitchgroup.com" {{ $issue->second_assigned_to == 'joseph.lusoma@interswitchgroup.com' ? 'selected' : '' }}>Joseph Lusoma</option>
                            <option value="orla.asiimwe@interswitchgroup.com" {{ $issue->second_assigned_to == 'orla.asiimwe@interswitchgroup.com' ? 'selected' : '' }}>Orla Nerys Asiimwe</option>
                            <option value="mariam.nkamwesiga@interswitchgroup.com" {{ $issue->second_assigned_to == 'mariam.nkamwesiga@interswitchgroup.com' ? 'selected' : '' }}>Mariam Nkamwesiga</option>
                            <option value="denis.oluka@interswitchgroup.com" {{ $issue->second_assigned_to == 'denis.oluka@interswitchgroup.com' ? 'selected' : '' }}>Denis Oluka</option>
                            <option value="jimmy.muyimbwa@interswitchgroup.com" {{ $issue->second_assigned_to == 'jimmy.muyimbwa@interswitchgroup.com' ? 'selected' : '' }}>Jimmy Muyimbwa</option>
                            <!-- Add more options if needed -->
                        </select>
                    @else
                        <select class="form-control" name="second_assigned_to">
                            <option value="">Select Resource</option>
                            <option value="stephen.kakaire@interswitchgroup.com" {{ $issue->second_assigned_to == 'stephen.kakaire@interswitchgroup.com' ? 'selected' : '' }}>Stephen Kakaire</option>
                            <option value="marymagdalene.naggita@interswitchgroup.com" {{ $issue->second_assigned_to == 'marymagdalene.naggita@interswitchgroup.com' ? 'selected' : '' }}>Mary Nagitta Magdalene</option>
                            <option value="marvin.sendikaddiwa@interswitchgroup.com" {{ $issue->second_assigned_to == 'marvin.sendikaddiwa@interswitchgroup.com' ? 'selected' : '' }}>Marvin Sendikaddiwa</option>
                            <option value="husseinkadir.mugume@interswitchgroup.com" {{ $issue->second_assigned_to == 'husseinkadir.mugume@interswitchgroup.com' ? 'selected' : '' }}>Hussein Kadir Mugume</option>
                            <option value="denis.kagimu@interswitchgroup.com" {{ $issue->second_assigned_to == 'denis.kagimu@interswitchgroup.com' ? 'selected' : '' }}>Denis Kagimu</option>
                            <option value="morgan.kamoga@interswitchgroup.com" {{ $issue->second_assigned_to == 'morgan.kamoga@interswitchgroup.com' ? 'selected' : '' }}>Morgan Kamoga</option>
                            <option value="james.okoth@interswitchgroup.com" {{ $issue->second_assigned_to == 'james.okoth@interswitchgroup.com' ? 'selected' : '' }}>James Okoth</option>
                            <option value="joseph.lusoma@interswitchgroup.com" {{ $issue->second_assigned_to == 'joseph.lusoma@interswitchgroup.com' ? 'selected' : '' }}>Joseph Lusoma</option>
                            <option value="orla.asiimwe@interswitchgroup.com" {{ $issue->second_assigned_to == 'orla.asiimwe@interswitchgroup.com' ? 'selected' : '' }}>Orla Nerys Asiimwe</option>
                            <option value="mariam.nkamwesiga@interswitchgroup.com" {{ $issue->second_assigned_to == 'mariam.nkamwesiga@interswitchgroup.com' ? 'selected' : '' }}>Mariam Nkamwesiga</option>
                            <option value="denis.oluka@interswitchgroup.com" {{ $issue->second_assigned_to == 'denis.oluka@interswitchgroup.com' ? 'selected' : '' }}>Denis Oluka</option>
                            <option value="jimmy.muyimbwa@interswitchgroup.com" {{ $issue->second_assigned_to == 'jimmy.muyimbwa@interswitchgroup.com' ? 'selected' : '' }}>Jimmy Muyimbwa</option>
                            <!-- Add more options if needed -->
                        </select>
                    @endif
                </div>
                <!-- ... -->
                @if ($issue->status)
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option value="">Update Status</option>
                            <option value="pending" {{ $issue->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="assigned" {{ $issue->status == 'assigned' ? 'selected' : '' }}>Assigned</option>
                            <option value="closed" {{ $issue->status == 'closed' ? 'selected' : '' }}>Closed</option>
                            <option value="resolved" {{ $issue->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                            <!-- Add more options if needed -->
                        </select>
                    </div>
                @else
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option value="">Update Status</option>
                            <option value="pending">Pending</option>
                            <option value="assigned">Assigned</option>
                            <option value="closed">Closed</option>
                            <option value="resolved">Resolved</option>
                            <!-- Add more options if needed -->
                        </select>
                    </div>
                @endif
                <!-- ... -->
                <div class="form-group">
                    <label for="comment">Other Comments</label>
                    <textarea class="form-control" name="comment" rows="3" disabled>{{ $issue->comment }}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit" name="update_issue" value="1">Update Issue</button>
                </div>
                <br>
                <a href="#">Back to Dashboard</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
