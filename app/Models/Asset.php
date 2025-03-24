<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    protected $guarded = ['id'];
    protected $table   = 'assets';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function attributes()
    {
        return $this->hasMany(AssetAttribute::class, 'asset_id', 'id');
    }
}
