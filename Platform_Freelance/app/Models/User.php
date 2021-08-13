<?php

namespace App\Models;

use App\Models\Job;
use App\Models\Role;
use App\Models\Proposal;
use App\Models\Conversation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function conversations()
    {
        // return $this->hasMany(Conversation::class, ["from","to"]);
        return Conversation::where(function($q) {
            /**
             * @var Builder $q
             */
            $q->where('from',$this->id)
                ->orWhere('to',$this->id);
        });
        // return Conversation::where(function ($q) {
        //     return $q->where('to', $this->is)
        //     ->orwhere('from', $this->id);
        // });
    }
    public function conversationsFrom()
    {
        return $this->hasMany(Conversation::class, "from");
        // return Conversation::where(function ($q) {
        //     return $q->where('to', $this->is)
        //     ->orwhere('from', $this->id);
        // });
    }
    public function conversationsTo()
    {
        return $this->hasMany(Conversation::class, "to");
        // return Conversation::where(function ($q) {
        //     return $q->where('to', $this->is)
        //     ->orwhere('from', $this->id);
        // });
    }
    public function allConversations()
    {
        return $this->conversationsTo->merge($this->conversationsFrom);
        // return Conversation::where(function ($q) {
        //     return $q->where('to', $this->is)
        //     ->orwhere('from', $this->id);
        // });
    }

    public function getConversationsAttribute()
    {
        return $this->conversations()->get();
    }

    public function likes()
    {
        return $this->belongsToMany(Job::class);
    }
}
