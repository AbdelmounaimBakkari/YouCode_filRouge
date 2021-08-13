<?php

namespace App\Models;

use App\Models\Message;
use App\Models\job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to', 'job_id'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function job()
    {
        return $this->belongsTo(job::class);
    }
}
