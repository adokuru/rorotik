<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed company
        $company =  Company::create([
            'name' => 'Bowen University',
            'email' => 'info@bowen.edu.ng',
            'logo' => 'https://bowen.edu.ng/wp-content/uploads/2021/12/bowen-logo-1-awesome-copy.png',
            'website' => 'https://bowen.edu.ng',
            'address' => 'Bowen Ogundipe Street, Ibadan',
            'phone' => '08055636587',
        ]);

        $company1 =  Company::create([
            'name' => 'Kada Plaza Cinema & Entertainment Centre',
            'email' => 'info@kadacinemas.com',
            'logo' => 'https://www.kadacinemas.com/wp-content/uploads/2021/05/Kada-logo-1.png',
            'website' => 'https://www.kadacinemas.com',
            'address' => '111 Old Sapele Rd, Oka 300102, Benin City',
            'phone' => '08055010676',
        ]);



        // Ticket Type
        $ticket_type = $company->ticketTypes()->create([
            'name' => 'Food',
            'description' => 'Food Ticket',
            'company_id' => $company->id,
        ]);
        $ticket_type1 = $company->ticketTypes()->create([
            'name' => 'Transport',
            'description' => 'Transport Ticket',
            'company_id' => $company->id,
        ]);

        // Vendor
        $vendor = $company->vendors()->create([
            'name' => 'Cafeteria 1',
            'email' => 'vendor@bowen.edu.ng',
            'phone' => '08055636587',
            'address' => 'Bowen Ogundipe Street, Ibadan',
            'ticket_type_id' => $ticket_type->id,
        ]);

        $vendor = $company->vendors()->create([
            'name' => 'Cafeteria 2',
            'email' => 'vendor2@bowen.edu.ng',
            'phone' => '08055636582',
            'address' => 'Bowen Ogundipe Street, Ibadan',
            'ticket_type_id' => $ticket_type->id,
        ]);

        // Ticket
        $ticket_type->tickets()->create([
            'name' => 'Food Ticket',
            'description' => 'Food Ticket',
            'company_id' => $company->id,
            'vendor_id' => $vendor->id,
        ]);
        $ticket_type1->tickets()->create([
            'name' => 'Transoprt Ticket',
            'description' => 'Transoprt Ticket',
            'company_id' => $company->id,
            'vendor_id' => $vendor->id,
        ]);
    }
}
