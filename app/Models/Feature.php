<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'link',
        'score',
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

}
