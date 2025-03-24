<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    protected $guarded = ['id'];
    protected $table   = 'location';

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
