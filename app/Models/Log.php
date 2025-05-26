<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    use HasFactory;
    protected $table    = 'log';
    protected $fillable = [
        'asset_id',
        'old_user',
        'new_user',
        'old_assign_date',
        'new_assign_date',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
