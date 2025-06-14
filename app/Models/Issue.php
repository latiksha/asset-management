<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    protected $guarded = ['id'];
    protected $table   = 'issue';

    public function images()
    {
        return $this->hasMany(IssueImage::class);
    }

    use SoftDeletes;

}
