<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryTitleModel extends Model
{
    use HasFactory;

    protected $table = 'inventory_titles';
    protected $fillable = [
        'title',
        'inventory_title_date',
        'created_by_id'
    ];

    public function inventorydetails()
    {
        return $this->hasMany(InventoryDetailsModel::class);
    }
}
