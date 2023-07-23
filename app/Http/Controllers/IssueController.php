<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\SlaRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\IssueAssignedNotification;
use App\Mail\IssueUpdated;
use Carbon\Carbon;
use Illuminate\Support\Str;

class IssueController extends Controller
{
    // ...

    public function newissue()
    {
        return view('auth.add-issue');
    }

    public function add(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'reporter_name' => 'required',
            'department' => 'required',
            'issue_name' => 'required', // Ensure the issue_name is required and selected from the dropdown.
            'time_of_reporting' => 'required',
            'impacted_service' => 'required',
            'assigned_to' => 'required',
            'second_assigned_to' => 'required',
            'comment' => 'nullable',
            'status' => 'required',
        ]);

        // Automatically set the priority based on the issue_name
        $priority = $this->getPriorityFromIssueName($validatedData['issue_name']);

        // Create a new instance of the Issue model
        $issue = new Issue;

        // Set the model properties with the validated form data
        $issue->reporter_name = $validatedData['reporter_name'];
        $issue->department = $validatedData['department'];
        $issue->issue_name = $validatedData['issue_name'];
        $issue->reported_at = $validatedData['time_of_reporting'];
        $issue->impacted_service = $validatedData['impacted_service'];
        $issue->assigned_to = $validatedData['assigned_to'];
        $issue->second_assigned_to = $validatedData['second_assigned_to'];
        $issue->comment = $validatedData['comment'];
        $issue->status = $validatedData['status'];

        // Set the priority based on the mapping
        $issue->priority = $priority;

        // Save the model to the database
        $issue->save();

        // Retrieve the issue from the database
        $issue = Issue::findOrFail($issue->id);

        // Calculate the SLA based on the issue_name value
        $slaStatus = $this->calculateSLA($validatedData['time_of_reporting'], $validatedData['issue_name']);

        // Set the SLA status on the issue
        $issue->sla_status = $slaStatus;

        // Send a notification email to the assigned person
        $assignedTo = $issue->assigned_to;
        Mail::to($assignedTo)->send(new IssueAssignedNotification($issue));

        // Redirect back with success message
        return redirect()->back()->with('success', 'Issue added successfully!');
    }

    public function showUpdateForm($issueId)
    {
        // Find the issue by ID
        $issue = Issue::findOrFail($issueId);

        // Authorize the "view" action for the given issue
        $this->authorize('view', $issue);

        // Retrieve all issues with pagination
        $data = Issue::paginate(10); // 10 items per page

        // Pass the issues and the current issue to the view
        return view('auth.update-issue', compact('data', 'issue'));
    }

    public function update(Request $request, $id)
    {
        // Find the issue by ID
        $issue = Issue::findOrFail($id);

        // Authorize the "update" action for the given issue
        $this->authorize('update', $issue);

        // Update the issue
        $issue->status = $request->input('status');
        $issue->second_assigned_to = $request->input('second_assigned_to');
        $issue->comment = $request->input('comment');
        $issue->save();

        // Redirect back with success message
        return redirect()->route('issues.show', $issue->id)->with('success', 'Issue updated successfully!');
    }

    // ...

    protected function getPriorityFromIssueName($issueName)
    {
        // Convert the issue_name to lowercase and remove spaces for case-insensitive matching
        $formattedIssueName = Str::lower(str_replace(' ', '', $issueName));

        // Create a mapping of issue_name to priority
        $priorityMapping = [
            'category1' => 'high',
            'category2' => 'medium',
            'category3' => 'low',
            // Add more mappings as needed...
        ];

        // Check if there is a match in the mapping
        if (isset($priorityMapping[$formattedIssueName])) {
            return $priorityMapping[$formattedIssueName];
        }

        // If no match found, default to low priority
        return 'low';
    }

    protected function calculateSLA($reportedAt, $issueName)
    {
        // Get the priority based on the issue_name
        $priority = $this->getPriorityFromIssueName($issueName);

        // Priority to SLA time mapping
        $prioritySLA = [
            'low' => 48,      // 60 minutes
            'medium' => 24,   // 30 minutes
            'high' => 6       // 15 minutes
        ];

        $responseTime = $prioritySLA[$priority];
        $reportedDateTime = Carbon::parse($reportedAt);
        $responseDateTime = $reportedDateTime->addMinutes($responseTime);

        // Get current date and time
        $now = Carbon::now();

        if ($now <= $responseDateTime) {
            $slaStatus = 'Within SLA';
        } else {
            $slaStatus = 'SLA Expired';
        }

        return $slaStatus;
    }
}
