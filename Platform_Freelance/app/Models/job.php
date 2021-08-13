<?php

namespace App\Models;

use App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'price', 'user_id'
    ];

    public function scopeOnLine($query)
    {
        return $query->where('status', 1);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class);
    }

    public function isLiked()
    {
        if (auth()->check()) {
            return auth()->user()->likes->contains('id', $this->id);
        }
    }
}
