<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_id = Company::first()->id;

        Data::create([
            'company_id'=> $company_id,
            'address'   => 'San Pedro 274 , Sarandí Buenos Aires, Argentina',
            'email'     => 'info@fabencor.com.ar',
            'phone1'    => '011 4353-0507|011 4353-0507',
            'phone2'    => '011 4353-4626|011 4353-4626',
            'instagram' => '#',
            'linkedin' => '#',
            'logo_header'=> 'images/data/logo_fabencor_Mesa_de_trabajo_1.svg',
            'logo_footer'=> 'images/data/logo_fabencor_Mesa_de_trabajo_2.svg'
        ]);
    }
}