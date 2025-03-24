<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetAttribute extends Model
{
    protected $table    = 'asset_attribute';
    protected $fillable = ['asset_id', 'attribute_key', 'attribute_value'];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id', 'id');
    }
}
