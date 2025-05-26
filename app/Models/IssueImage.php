<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssueImage extends Model
{protected $fillable = ['issue_id', 'image'];
    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }}
