<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'session_name',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_user_id');
    }

    public function isAdmin(User $user)
    {
        return $this->admin_user_id === $user->id;
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}

