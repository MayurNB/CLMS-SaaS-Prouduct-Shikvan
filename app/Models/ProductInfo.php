<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProductInfo extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'product_infos';

    protected $fillable = [
        'product_name',
        'description',
        'is_active',
    ];

    /**
     * Get the version histories for the product.
     */
    public function versionHistories()
    {
        return $this->hasMany(ProductVersionHistory::class);
    }
}