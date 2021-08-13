<?php

namespace App\Models;

use App\Models\Proposal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coverletter extends Model
{
    use HasFactory;

    protected $fillable = ['proposal_id', 'content'];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}
