<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\InventoryTitleModel;
use App\Traits\CrudOperationsTrait;
use Illuminate\Http\Request;

class InventoryTitleController extends Controller
{
    use CrudOperationsTrait;
    public function getRules()
    {
        return [
            'title' => 'required|string',
            'inventory_title_date' => 'required|date|date_format:Y-m-d',
            'created_by_id' => 'required|exists:credentials,employee_id'
        ];
    }
    public function onCreate(Request $request)
    {
        return $this->createRecord(InventoryTitleModel::class, $request, $this->getRules(), 'Inventory Title');
    }
    public function onUpdate(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string',
            'inventory_title_date' => 'required|date|date_format:Y-m-d',
        ];
        return $this->updateRecordById(InventoryTitleModel::class, $request, $rules, 'Inventory Title', $id);
    }
    public function onGetAll()
    {
        return $this->readRecord(InventoryTitleModel::class, 'Inventory Title');
    }
}
