<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suggestions</title>
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
            <li><a href="myroute">Homepage</a></li>
            <li><a href="detailed_report">Reports</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Suggestions</a></li>
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
                </div>
            </div>
        </div>
    </div>

    <div class="add-issue-container">
        <div class="add-issue-form">
            <h4><center><bold><em>Suggestion(s)</em></bold></center></h4><hr>
            <form action="{{ route('add-issue') }}" method="POST"><br>
                @csrf
                <div class="form-group">
                    <label for="reporter_name">Full Names</label>
                    <input type="text" class="form-control" placeholder="Enter your name" name="suggested_by" value="{{old('suggested_by')}}">
                    <span class="text-danger">@error('suggested_by') {{$message}} @enderror</span>
                </div><br>
                <div class="form-group">
                    <label for="department">Department</label>
                    <select class="form-control" name="department" value="{{old('department')}}">
                        <option value="">Select department</option>
                        <option value="Engineering">Engineering</option>
                        <option value="EFT">EFT</option>
                        <option value="Infrastructure">Infrastructure</option>
                        <option value="Financial Inclusion">Financial Inclusion</option>
                        <option value="Marketing and Branding">Marketing and Branding</option>
                        <option value="Finance">Finance</option>
                        <option value="Human Resource">Human Resource</option>
                        <option value="Administration">Administration</option>
                        <option value="Compliance and Risk">Compliance and Risk</option>
                    </select>
                    <span class="text-danger">@error('department') {{$message}} @enderror</span>
                </div><br>
                <div class="form-group">
                    <label for="comment">Suggestion</label>
                    <textarea class="form-control" name="suggestion" rows="4" placeholder="Please give sufficient details.............">{{old('suggestion')}}</textarea>
                    <span class="text-danger">@error('comment') {{$message}} @enderror</span>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit" name="add_issue">Submit Suggestion</button>
                </div>
                <br>
                <a href="myroute">Back to Homepage</a>
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
    </script>
</body>
</html>
