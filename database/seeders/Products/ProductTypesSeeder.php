<?php

namespace Database\Seeders\Products;

use App\Models\ProductTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $shoesNumber = '';
        for ($i=31;$i<51; $i++){
            if ($i == 50)
            {
                $shoesNumber.=$i;
            }
            else
            {
                $shoesNumber.=$i.',';
            }
        }

        $childDress = '';
        for ($i=56;$i<183; $i+=6){
            if ($i == 182)
            {
                $childDress.=$i;
            }
            else
            {
                $childDress.=$i.',';
            }
        }

        $data = [
            [
                'name' => 'Elbise',
                'size_range' => 'xs,s,m,l,xl,xxl,3xl,4xl,5xl'
            ],
            [
                'name' => 'Ayakkabı',
                'size_range' => $shoesNumber

            ],
            [
                'name' => 'Standart',
                'size_range' => 'standart'
            ],
            [
                'name' => 'Çocuk Giyim',
                'size_range' => $childDress
            ]
        ];
        ProductTypes::insert($data);
    }
}
