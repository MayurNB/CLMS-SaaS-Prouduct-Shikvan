<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProductVersionHistory extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'product_version_histories';

    protected $fillable = [
        'product_info_id',
        'version_number',
        'changes_summary',
        'release_date',
    ];

    /**
     * Get the product info that this version history belongs to.
     */
    public function productInfo()
    {
        return $this->belongsTo(ProductInfo::class);
    }
}