<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeInformationModel extends Model
{
    use HasFactory;
    protected $table = 'credential_employee_information';
    protected $fillable = [
        'employee_id',
        'role',
        'prefix',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'company_email',
        'status',
        'updated_by_id',
        'created_by_id',
    ];

    protected $casts = [
        'role' => 'integer',
        'status' => 'integer',
    ];

    public function credentials()
    {
        return $this->belongsTo(CredentialModel::class, 'employee_id', 'employee_id');
    }
}
