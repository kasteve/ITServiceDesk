<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Contracts\HasPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SteveTechUserModel;

class User extends Model
{
    // ...

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}

