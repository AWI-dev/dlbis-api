<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\InventoryDetailsModel;
use App\Traits\CrudOperationsTrait;
use Illuminate\Http\Request;

class InventoryDetailsController extends Controller
{
    use CrudOperationsTrait;
    public function getRules()
    {
        return [
            'inventory_title_id' => 'required|exists:inventory_titles,id',
            'reference_code' => 'required|string',
            'item_name' => 'required|string',
            'item_code' => 'required|string',
            'other_text' => 'required|string',
            'remarks' => 'required|string',
            'created_by_id' => 'required|exists:credentials,employee_id'
        ];
    }
    public function onCreate(Request $request)
    {
        return $this->createRecord(InventoryDetailsModel::class, $request, $this->getRules(), 'Inventory Details');
    }
    public function onUpdate(Request $request, $id)
    {
        $rules = [
            'updated_by_id' => 'required|exists:credentials,employee_id',
            'reference_code' => 'required|string',
            'item_name' => 'required|string',
            'item_code' => 'required|string',
            'other_text' => 'required|string',
            'remarks' => 'required|string',
        ];
        return $this->updateRecordById(InventoryDetailsModel::class, $request, $rules, 'Inventory Details', $id);
    }
    public function onDelete($id)
    {
        return $this->deleteRecordById(InventoryDetailsModel::class, $id, 'Inventory Details');
    }
    public function onGetCurrent($employeeId, $id)
    {
        $whereFields = [
            'inventory_title_id' => $id,
            'created_by_id' => $employeeId
        ];
        $orderBy = [
            'id' => 'DESC'
        ];
        return $this->readCurrentRecord(InventoryDetailsModel::class, null, $whereFields, null, $orderBy, 'Inventory Details');
    }

    public function onBulk(Request $request)
    {
        $fields = $request->validate([
            'created_by_id' => 'required',
            'inventory_title_id' => 'required|exists:inventory_titles,id',
            'bulk_data' => 'required'
        ]);
        return $this->bulkUpload(InventoryDetailsModel::class, 'Inventory Details', $fields);
    }
}
