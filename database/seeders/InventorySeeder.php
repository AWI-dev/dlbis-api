<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventory_titles')->insert([
            [
                'title' => 'Inventory Title 1',
                'inventory_title_date' => Carbon::create(2024, 7, 5)->toDateString(),
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'title' => 'Inventory Title 2',
                'inventory_title_date' => Carbon::create(2024, 7, 6)->toDateString(),
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'title' => 'Inventory Title 3',
                'inventory_title_date' => Carbon::create(2024, 7, 7)->toDateString(),
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
        ]);

        $details = [
            [
                'inventory_title_id' => 1,
                'war_pr' => 'PR2024-01',
                'telephone_number' => '123-456-7890',
                'telecom_equipment' => 'Router',
                'recovery_sn' => 'SN123456789',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 1,
                'war_pr' => 'PR2024-02',
                'telephone_number' => '234-567-8901',
                'telecom_equipment' => 'Modem',
                'recovery_sn' => 'SN234567890',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 1,
                'war_pr' => 'PR2024-03',
                'telephone_number' => '345-678-9012',
                'telecom_equipment' => 'Switch',
                'recovery_sn' => 'SN345678901',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 1,
                'war_pr' => 'PR2024-04',
                'telephone_number' => '456-789-0123',
                'telecom_equipment' => 'Access Point',
                'recovery_sn' => 'SN456789012',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 1,
                'war_pr' => 'PR2024-05',
                'telephone_number' => '567-890-1234',
                'telecom_equipment' => 'Firewall',
                'recovery_sn' => 'SN567890123',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 2,
                'war_pr' => 'PR2024-06',
                'telephone_number' => '678-901-2345',
                'telecom_equipment' => 'Router',
                'recovery_sn' => 'SN678901234',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 2,
                'war_pr' => 'PR2024-07',
                'telephone_number' => '789-012-3456',
                'telecom_equipment' => 'Modem',
                'recovery_sn' => 'SN789012345',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 2,
                'war_pr' => 'PR2024-08',
                'telephone_number' => '890-123-4567',
                'telecom_equipment' => 'Switch',
                'recovery_sn' => 'SN890123456',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 2,
                'war_pr' => 'PR2024-09',
                'telephone_number' => '901-234-5678',
                'telecom_equipment' => 'Access Point',
                'recovery_sn' => 'SN901234567',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 2,
                'war_pr' => 'PR2024-10',
                'telephone_number' => '012-345-6789',
                'telecom_equipment' => 'Firewall',
                'recovery_sn' => 'SN012345678',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 3,
                'war_pr' => 'PR2024-11',
                'telephone_number' => '234-567-8901',
                'telecom_equipment' => 'Router',
                'recovery_sn' => 'SN234567891',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 3,
                'war_pr' => 'PR2024-12',
                'telephone_number' => '345-678-9012',
                'telecom_equipment' => 'Modem',
                'recovery_sn' => 'SN345678912',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 3,
                'war_pr' => 'PR2024-13',
                'telephone_number' => '456-789-0123',
                'telecom_equipment' => 'Switch',
                'recovery_sn' => 'SN456789013',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 3,
                'war_pr' => 'PR2024-14',
                'telephone_number' => '567-890-1234',
                'telecom_equipment' => 'Access Point',
                'recovery_sn' => 'SN567890134',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 3,
                'war_pr' => 'PR2024-15',
                'telephone_number' => '678-901-2345',
                'telecom_equipment' => 'Firewall',
                'recovery_sn' => 'SN678901245',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
            [
                'inventory_title_id' => 3,
                'war_pr' => 'PR2024-1S5',
                'telephone_number' => '6S78-901-2345',
                'telecom_equipment' => 'FirewallS',
                'recovery_sn' => 'SN678901245',
                'created_at' => now(),
                'created_by_id' => '0000',
                'updated_at' => now(),
            ],
        ];

        DB::table('inventory_details')->insert($details);
    }
}
