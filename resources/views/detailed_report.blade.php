<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Support Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

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
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        #scrollTopButton {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #333;
            color: white;
            cursor: pointer;
            padding: 10px;
            border-radius: 4px;
            opacity: 0.7;
            transition: opacity 0.3s;
        }

        #scrollTopButton:hover {
            opacity: 1;
        }

    .table-container {
      overflow-x: auto;
    }
    .green {
        color: green;
    }

    .red {
        color: red;
    }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li class="active">
                <a href="#">Issues</a>
                <ul class="submenu">
                    <li><a href="add-issue">Add New Issue</a></li>
                    <li><a href="detailed_report">List Issues</a></li>
                </ul>
            </li>
            <li><a href="myroute">Dashboard</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="suggestions">Suggestions</a></li>
            <li class="active">
                <a href="#">Reminders</a>
                <ul class="submenu">
                    <li><a href="reminders">Certificate Life</a></li>
                    <li><a href="#">Outstanding Issues</a></li>
                </ul>
            </li>
            <li><a href="logout">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="container dashboard-container">
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <h4>Tech Support Dashboard</h4>
                    <hr>
                    <div class="user-info">
                        User: {{$user->name}}
                        <a href="logout">Logout</a>
                    </div>
                    <hr>
                    <div class="action-links">
                        <p><strong>Unattended issues:</strong> <span class="record-count">{{ $data->count() }}</span></p>
                        <div class="ms-auto">
                            <a href="add-issue" class="btn btn-primary me-2">New Issue</a>
                            <a href="#" class="btn btn-primary">Download Report</a>
                        </div>
                    </div>
                <div class="col-lg-12 col-md-12 col-sm-12 table-container">
                    <table class="stripe row-border order-column nowrap" id="TechnicalSupport">
                        <thead style="width:100%">
                            <tr>
                                <th>IssueId</th>
                                <th>Reporter</th>
                                <th>Responsible Dept</th>
                                <th>Issue</th>
                                <th>Time</th>
                                <th>Affected Service</th>
                                <th>Assigned To</th>
                                <th>Status</th>
                                <th>Priority</th>
                                <th>Second Assigned</th>
                                <th>SLA</th>
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
                                    <td>{{ $issue->priority }}</td>
                                    <td>{{ $issue->second_assigned_to }}</td>
                                    <td id="sla-{{$issue->id}}"></td>

                                    <td>
                                        <a href="{{ route('update-issue', ['id' => $issue->id]) }}" class="btn btn-primary me-2">Update</a>
                                        <a href="#" class="btn btn-primary" style="background-color: red; color: white;">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle visibility of submenu
        const issuesMenu = document.querySelector('.sidebar li.active');
        const submenu = issuesMenu.querySelector('.submenu');

        issuesMenu.addEventListener('click', () => {
            submenu.classList.toggle('active');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <button onclick="scrollToTop()" id="scrollTopButton" title="Go to Top">Scroll Up</button>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
  <!-- Include DataTables Buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>

<!-- Include other dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
  <script>
    $(document).ready(function () {
        var table = $('#TechnicalSupport').DataTable({
            "aaSorting": [[0, "desc"]],
            dom: "Bfrtip",
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            lengthChange: true,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            //buttons: [ 'copy', 'excel', 'csv', 'pdf', 'colvis' ]
            buttons: [{extend: 'copy', className: 'btn-light-grey'},
                {extend: 'print', className: 'btn-light-grey', title: 'TechnicalSupportReport'},
                {extend: 'pdfHtml5', className: 'btn-light-grey', title: 'TechnicalSupportReport'},
                {extend: 'excelHtml5', className: 'btn-light-grey', title: 'TechnicalSupportReport'},
                {extend: 'csv', className: 'btn-light-grey', title: 'TechnicalSupportReport'},
                {extend: 'colvis', className: 'btn-light-grey'}]
        });
        table.buttons().container()
                .appendTo('#reportresult_wrapper .col-md-6:eq(0)');
    });

            // Function to calculate and populate SLA value
        function calculateSLA(reportedAt, priority, issueId) {
            // Priority to SLA time mapping
            const prioritySLA = {
                'low': 48,      // 48 hours
                'medium': 12,   // 12 hours
                'high': 6       // 6 hours
            };

            const responseTime = prioritySLA[priority];
            const reportedDateTime = new Date(reportedAt);
            const responseDateTime = new Date(reportedDateTime.getTime() + responseTime * 60 * 60 * 1000);

            // Get current date and time
            const now = new Date();

            let slaStatus;
            if (now <= responseDateTime) {
                slaStatus = 'Within SLA';
                document.getElementById('sla-' + issueId).classList.add('green'); // Add green class
            } else {
                slaStatus = 'SLA Expired';
                document.getElementById('sla-' + issueId).classList.add('red'); // Add red class
            }

            // Populate the SLA value in the table cell
            document.getElementById('sla-' + issueId).innerText = slaStatus;
        }

        // Call the calculateSLA function for each issue
        @foreach($data as $issue)
            calculateSLA("{{$issue->reported_at}}", "{{$issue->priority}}", "{{$issue->id}}");
        @endforeach


  </script>

</body>
    <script>
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        window.addEventListener('scroll', function () {
            var scrollTopButton = document.getElementById('scrollTopButton');
            if (window.pageYOffset > 200) {
                scrollTopButton.style.display = 'block';
            } else {
                scrollTopButton.style.display = 'none';
            }
        });
    </script>

</html>
