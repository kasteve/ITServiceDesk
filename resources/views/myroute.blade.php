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
    </style>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.10.2/jspdf.umd.min.js"></script>
</head>
<body>
        
    <div class="sidebar">
        <ul>
            @auth <!-- Check if the user is authenticated -->
                <li class="active">
                    <a href="#">Issues</a>
                    <ul class="submenu">
                        <!-- Show "Add New Issue" link to regular user -->
                        @if (auth()->check() && auth()->user()->role->name === 'regular user')
                            <li><a href="add-issue">Add New Issue</a></li>
                        @endif
                        <!-- Show "List Issues" link to all users -->
                        <li><a href="detailed_report">List Issues</a></li>
                    </ul>
                </li>
            @endauth
            <!-- ... Other sidebar links ... -->
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
                        <p><strong>Accumulated issues:</strong> <span class="record-count">{{ $data->count() }}</span></p>
                        <div class="ms-auto">
                            <a href="add-issue" class="btn btn-primary me-2">New Issue</a>
                            <a href="detailed_report" class="btn btn-primary">Detailed Report</a>
                        </div>
                    </div>

                    <canvas id="issueStatusChart"></canvas>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.10.2/jspdf.umd.min.js"></script>
    
    <script>
        // Toggle visibility of submenu
        const issuesMenu = document.querySelector('.sidebar li.active');
        const submenu = issuesMenu.querySelector('.submenu');

        issuesMenu.addEventListener('click', () => {
            submenu.classList.toggle('active');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const issueStatusChart = document.getElementById('issueStatusChart').getContext('2d');
        new Chart(issueStatusChart, {
            type: 'bar',
            data: {
                labels: ['New', 'Assigned', 'Pending', 'Closed', 'Resolved'],
                datasets: [{
                    label: 'Issue Status',
                    data: [
                        {{ $newCount }},
                        {{ $assignedCount }},
                        {{ $pendingCount }},
                        {{ $closedCount }},
                        {{ $resolvedCount }},
                    ],
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.5)',       // Red for 'New'
                        'rgba(75, 192, 192, 0.5)',    // Green for 'Assigned'
                        'rgba(255, 105, 180, 0.5)',   // Pink for 'Pending'
                        'rgba(128, 0, 128, 0.5)',     // Purple for 'Closed'
                        'rgba(0, 0, 255, 0.5)',       // Blue for 'Resolved'
                    ],
                    borderColor: [
                        'rgba(255, 0, 0, 1)',         // Red for 'New'
                        'rgba(75, 192, 192, 1)',      // Green for 'Assigned'
                        'rgba(255, 105, 180, 1)',     // Pink for 'Pending'
                        'rgba(128, 0, 128, 1)',       // Purple for 'Closed'
                        'rgba(0, 0, 255, 1)',         // Blue for 'Resolved'
                    ],
                    borderWidth: 1,
                }],
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                    },
                },
            },
        });

        // Function to generate and download the report as a PDF
        function downloadReport() {
            // Create a new jsPDF instance
            const doc = new jsPDF();

            // Get the chart canvas
            const chartCanvas = document.getElementById('issueStatusChart');

            // Get the base64 image data of the chart canvas
            const chartImage = chartCanvas.toDataURL('image/png');

            // Add the chart image to the PDF document
            doc.addImage(chartImage, 'PNG', 10, 10, 190, 100); // Adjust the position and size as needed

            // Save the PDF document
            doc.save('issue_report.pdf');
        }

        // Add an event listener to the "Download Report" button
        const downloadReportButton = document.getElementById('downloadReportButton');
        downloadReportButton.addEventListener('click', downloadReport);

        // Toggle visibility of submenu
        const submenuItems = document.querySelectorAll('.submenu');
        submenuItems.forEach(item => {
            const parentLink = item.parentNode.firstElementChild;
            parentLink.addEventListener('click', (e) => {
                e.preventDefault();
                item.style.display = item.style.display === 'none' ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>
