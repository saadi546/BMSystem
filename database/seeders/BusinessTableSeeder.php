<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $businesses = [
            [
                'user_id' => 2, // Assuming user with ID 1 exists
                'business_name' => 'Sample Business 1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'contact_number' => '1234567890',
                'email' => 'business1@example.com',
                'website_url' => 'http://www.business1.com',
                'address' => '123 Sample Street, Sample City, Sample Country',
                'operating_hours' => 'Monday - Friday: 9:00 AM - 5:00 PM',
                'employee_detail' => '5 employees',
                'status' => 'approved', // Assuming you want some businesses to be pre-approved
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // Assuming user with ID 2 exists
                'business_name' => 'Sample Business 2',
                'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'contact_number' => '9876543210',
                'email' => 'business2@example.com',
                'website_url' => 'http://www.business2.com',
                'address' => '456 Example Avenue, Example City, Example Country',
                'operating_hours' => 'Monday - Saturday: 8:00 AM - 6:00 PM',
                'employee_detail' => '10 employees',
                'status' => 'pending', // Assuming some businesses are pending approval
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4, // Assuming user with ID 2 exists
                'business_name' => 'Sample Business 2',
                'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'contact_number' => '9876543210',
                'email' => 'business2@example.com',
                'website_url' => 'http://www.business2.com',
                'address' => '456 Example Avenue, Example City, Example Country',
                'operating_hours' => 'Monday - Saturday: 8:00 AM - 6:00 PM',
                'employee_detail' => '10 employees',
                'status' => 'pending', // Assuming some businesses are pending approval
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more dummy businesses if needed
        ];

        // Insert data into the businesses table
        DB::table('businesses')->insert($businesses);
    }
}
