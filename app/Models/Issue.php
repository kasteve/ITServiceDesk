<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['reporter_name', 'department', 'issue_name', 'reported_at', 'impacted_service', 'assigned_to', 'comment','status', 'second_assigned_to'];


    // Define the reported_at property as a date
    protected $dates = ['reported_at'];

    // Add a method to retrieve the assigned user
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}


