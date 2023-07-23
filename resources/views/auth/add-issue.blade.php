<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Issue/Complaint</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .add-issue-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding-top: 50px; /* Add some space from the top */
        }
        .add-issue-form {
            width: 100%; /* Set width to 100% to cover the entire page */
            max-width: 600px; /* Optionally set a maximum width */
            margin: 0 auto; /* Center the form horizontally */
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
        }
        /* Sidebar Styles */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar li {
            padding: 8px 10px;
            color: #fff;
        }
        .sidebar li a {
            color: #fff;
            text-decoration: none;
        }
        .sidebar li a:hover {
            color: #f8f9fa;
        }
        .sidebar .submenu {
            display: none;
        }
        .sidebar .active .submenu {
            display: block;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li>
                <a href="#">Issues</a>
                <ul class="submenu">
                    <li><a href="add-issue">Add New Issue</a></li>
                    <li><a href="#">List Issues</a></li>
                </ul>
            </li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Suggestions</a></li>
            <li><a href="logout">Logout</a></li>
        </ul>
    </div>
    <div class="add-issue-container">
        <div class="add-issue-form">
            <h4>New Issue</h4>
            <form action="{{ route('add-issue') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reporter_name">Name of Reporter</label>
                            <input type="text" class="form-control" placeholder="Enter reporter's name" name="reporter_name" value="{{old('reporter_name')}}">
                            <span class="text-danger">@error('reporter_name') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="department">Department</label>
                            <select class="form-control" name="department" value="{{old('department')}}">
                                <option value="">Select department</option>
                                <option value="Engineering">Engineering</option>
                                <option value="EFT">EFT</option>
                                <option value="Projects Management">Projects Management</option>
                                <option value="Infrastructure">Infrastructure</option>
                                <option value="Financial Inclusion">Financial Inclusion</option>
                                <option value="Marketing and Branding">Marketing and Branding</option>
                                <option value="Finance">Finance</option>
                                <option value="Human Resource">Human Resource</option>
                                <option value="Administration">Administration</option>
                                <option value="Compliance and Risk">Compliance and Risk</option>
                            </select>
                            <span class="text-danger">@error('department') {{$message}} @enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="issue_name">Issue Category</label>
                            <select class="form-control" name="issue_name" value="{{old('issue_name')}}">
                                <option value="">-- Issue Category --</option>
                                <option value="category1">Service Outage</option>
                                <option value="category1">Exposure</option>
                                <option value="category2">Reports</option>
                                <option value="category3">User Access Mgt</option>
                                <option value="category3">Projects</option>
                                <option value="category3">Others</option>
                            </select>
                            <span class="text-danger">@error('issue_name') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="time_of_reporting">Time of Reporting</label>
                            <input type="datetime-local" class="form-control" name="time_of_reporting" value="{{ old('time_of_reporting') ? \Carbon\Carbon::parse(old('time_of_reporting'))->format('Y-m-d\TH:i') : '' }}">
                            <span class="text-danger">@error('time_of_reporting') {{$message}} @enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="impacted_service">Impacted Service</label>
                            <input type="text" class="form-control" placeholder="Enter impacted service" name="impacted_service" value="{{old('impacted_service')}}">
                            <span class="text-danger">@error('impacted_service') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="assigned_to">Assigned To</label>
                            <select class="form-control" name="assigned_to" value="{{old('assigned_to')}}">
                                <option value="">Select Resource</option>
                                <option value="stephen.kakaire@interswitchgroup.com">Technical Support(Stephen K)</option>
                            </select>
                            <span class="text-danger">@error('assigned_to') {{$message}} @enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="assigned_to">Default Escalation</label>
                            <select class="form-control" name="second_assigned_to" value="{{old('second_assigned_to')}}">
                                <option value="">Select Resource</option>
                                <option value="alibakastephen256@gmail.com">Technical Support(Stephen K)</option>
                            </select>
                            <span class="text-danger">@error('second_assigned_to') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" value="{{old('status')}}">
                                <option value="">-- Status --</option>
                                <option value="new">New</option>
                                <option value="pending">Pending</option>
                                <option value="assigned">Assigned</option>
                                <option value="closed">Closed</option>
                                <option value="resolved">Resolved</option>
                                <option value="On Hold">On Hold</option>
                            </select>
                            <span class="text-danger">@error('status') {{$message}} @enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Priority</label>
                            <select class="form-control" name="priority" value="{{old('priority')}}">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                            <span class="text-danger">@error('priority') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="comment">Other Comments</label>
                            <textarea class="form-control" name="comment" rows="2">{{old('comment')}}</textarea>
                            <span class="text-danger">@error('comment') {{$message}} @enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-block btn-primary" type="submit" name="add_issue">Add Issue</button>
                            <a href="myroute">Back to Dashboard</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle visibility of submenu
        const submenuItems = document.querySelectorAll('.submenu');
        submenuItems.forEach(item => {
            const parentLink = item.parentNode.firstElementChild;
            parentLink.addEventListener('click', (e) => {
                e.preventDefault();
                item.style.display = item.style.display === 'none' ? 'block' : 'none';
            });
        });

            // Function to calculate the SLA based on the priority
        function calculateSLA(priority) {
            switch (priority) {
                case 'high':
                    return '2 hours';
                case 'medium':
                    return '12 hours';
                case 'low':
                    return '48 hours';
                default:
                    return '';
            }
        }

        // Event listener for priority selection
        const prioritySelect = document.getElementById('priority');
        const slaElement = document.createElement('div');
        slaElement.style.marginTop = '8px';
        prioritySelect.parentNode.appendChild(slaElement);

        prioritySelect.addEventListener('change', () => {
            const selectedPriority = prioritySelect.value;
            const status = document.querySelector('select[name="status"]').value;

            // Check if the status is not "Resolved"
            if (status !== 'resolved') {
                const calculatedSLA = calculateSLA(selectedPriority);
                slaElement.innerText = `SLA: ${calculatedSLA}`;
            } else {
                slaElement.innerText = ''; // Status is "Resolved," so SLA is not applicable
            }
        });
    </script>
</body>
</html>
