<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	'Accounting & Finance',
        	'Asset Management',
        	'Capital Markets',
        	'Commodities',
        	'Compliance/Legal',
        	'Consultancy',
        	'Corporate Banking',
        	'Credit',
        	'Debt/Fixed Income',
        	'Derivatives',
        	'Equities',
        	'FX & Money Markets',
        	'Global Custody',
        	'Graduates & Internships',
        	'HR & Recruitment',
        	'Hedge Funds',
        	'Industry & Commerce',
        	'Information Services',
        	'Information Technology',
        	'Insurance',
        	'Investment Banking/M&A',
        	'Investment Consulting',
        	'Investor Relations & PR',
        	'Islamic Finance',
        	'Operations',
        	'Private Banking & Wealth Management',
        	'Private Equity & Venture Capital',
        	'Public Sector',
        	'Quantitative Analytics',
        	'Real Estate',
        	'Research',
        	'Retail Banking',
        	'Risk Management',
        	'Sales & Marketing',
        	'Trading'
        ];

        foreach($data as $tagName) {
            $tag = new \App\Tag();
            $tag->name = $tagName;
            $tag->save();
        }
    }
}
