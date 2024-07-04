<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryDetailsModel extends Model
{
    use HasFactory;

    protected $table = 'inventory_details';
    protected $fillable = [
        'inventory_title_id',
        'reference_code',
        'item_name',
        'item_code',
        'other_text',
        'remarks',
    ];

    public function inventoryTitle()
    {
        return $this->belongsTo(InventoryTitleModel::class);
    }
}
