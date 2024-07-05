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
            'updated_by_id' => 'required|exists:credentials,employee_id',
            'title' => 'required|string',
            'inventory_title_date' => 'required|date|date_format:Y-m-d',
        ];
        return $this->updateRecordById(InventoryTitleModel::class, $request, $rules, 'Inventory Title', $id);
    }
    public function onDelete($id)
    {
        return $this->deleteRecordById(InventoryTitleModel::class, $id, 'Inventory Title');
    }
    public function onGetAll()
    {
        $orderBy = [
            'id' => 'DESC'
        ];
        return $this->readCurrentRecord(InventoryTitleModel::class, null, null, null, $orderBy, 'Inventory Title');
    }

    public function onBulk(Request $request)
    {
        $fields = $request->validate([
            'created_by_id' => 'required',
            'bulk_data' => 'required'
        ]);
        return $this->bulkUpload(InventoryTitleModel::class, 'Inventory Title', $fields);
    }
}
