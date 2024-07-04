<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryDetailsModel extends Model
{
    use HasFactory;

    protected $table = 'inventory_details';
    protected $fillable = [
        'updated_by_id',
        'created_by_id',
        'inventory_title_id',
        'war_pr',
        'telephone_number',
        'telecom_equipment',
        'recovery_sn',
    ];

    public function inventoryTitle()
    {
        return $this->belongsTo(InventoryTitleModel::class);
    }
}
