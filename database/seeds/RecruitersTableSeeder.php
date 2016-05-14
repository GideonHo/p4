<?php

use Illuminate\Database\Seeder;

class RecruitersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recruiters')->insert([
        'created_at' => '2016-03-31',
        'updated_at' => '2016-03-31',
        'name' => 'Austen Wealth Management',
        'email' => 'info@austenwealth.com',
        'address' => '2/F, Ultragrace Building, 5 Jordan Road, Hong Kong',
        'website' => 'http://www.austenwealth.com',
        'logo' => 'photo/austen.jpg',
        ]);

        DB::table('recruiters')->insert([
        'created_at' => '2016-03-31',
        'updated_at' => '2016-03-31',
        'name' => 'First Investment',
        'email' => 'info@firstinvestment.com.hk',
        'address' => '2/F, Ultragrace Building, 5 Jordan Road, Hong Kong',
        'website' => 'http://www.firstinvestment.com.hk',
        'logo' => 'photo/first.png',
        ]);

        DB::table('recruiters')->insert([
        'created_at' => '2016-03-31',
        'updated_at' => '2016-03-31',
        'name' => 'The World Bank',
        'email' => 'info@worldbank.org',
        'address' => '1818 H Street, NW Washington, DC 20433 USA (202) 473-1000',
        'website' => 'https://www.worldbank.org/',
        'logo' => 'photo/world_bank.png',
        ]);
    }
}
