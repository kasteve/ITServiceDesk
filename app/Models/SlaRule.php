<?php

namespace App\Models;

use App\Models\Priority;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlaRule extends Model
{
    use HasFactory;

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }
}
