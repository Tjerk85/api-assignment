<?php

namespace Database\Seeders;

use App\Models\DeliveryOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['PostNL', 'Standard', 'NL', true, 6.95],
            ['PostNL', 'Mailbox', 'NL', true, 3.95],
            ['PostNL', 'Pallet', 'NL', false, 26.95],
            ['PostNL', 'Standard', 'BE', true, 7.95],
            ['PostNL', 'Mailbox', 'BE', true, 4.95],
            ['PostNL', 'Standard', 'EU', true, 10.95],
            ['PostNL', 'Standard', 'ROW', false, 13.95],
            ['DHL', 'Standard', 'NL', true, 7.45],
            ['DHL', 'Mailbox', 'NL', true, 4.45],
            ['DHL', 'Standard', 'BE', true, 8.45],
            ['DHL', 'Mailbox', 'BE', true, 5.45],
            ['DHL', 'Standard', 'EU', false, 10.45],
            ['DHL', 'Standard', 'ROW', false, 12.45],
            ['DPD', 'Standard', 'NL', true, 7.75],
            ['DPD', 'Mailbox', 'NL', false, 4.75],
            ['DPD', 'Pallet', 'NL', true, 21.75],
            ['DPD', 'Standard', 'BE', true, 8.75],
            ['DPD', 'Mailbox', 'BE', false, 5.75],
            ['DPD', 'Pallet', 'BE', true, 23.75],
            ['DPD', 'Standard', 'EU', false, 10.75],
            ['DPD', 'Standard', 'ROW', false, 12.75],
            ['UPS', 'Mailbox', 'NL', false, 4.25],
            ['UPS', 'Mailbox', 'BE', false, 5.25],
            ['UPS', 'Mailbox', 'EU', false, 6.25],
            ['UPS', 'Mailbox', 'ROW', false, 8.25],
        ];

        foreach ($data as $item) {
            DeliveryOption::create([
                'provider' => $item[0],
                'service' => $item[1],
                'country' => $item[2],
                'weekends' => $item[3],
                'price' => $item[4],
            ]);
        }
    }
}
