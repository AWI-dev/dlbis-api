<?php

namespace Database\Seeders;

use App\Models\Auth\EmployeeInformationModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Auth\CredentialModel;

class CredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CredentialModel::create([
            'employee_id' => '0000',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        EmployeeInformationModel::create([
            'employee_id' => '0000',
            'role' => 2, // 1 - guest, 2 - admin
            'prefix' => null,
            'first_name' => 'DLBIS',
            'middle_name' => null,
            'last_name' => 'ADMIN',
            'suffix' => null,
            'company_email' => 'admin-dlbis@pldt.com.ph',
            'status' => 1,
            'created_by_id' => '0000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
