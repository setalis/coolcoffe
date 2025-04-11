<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coffee;

class CoffeeSeeder extends Seeder
{
    public function run()
    {
        Coffee::create([
            'name' => 'Nescafé Taster\'s Choice Gourmet Roast Café de gano Molido Americano Bolsa 300g',
            'weight' => '300g',
            'price' => 19.00,
            'delivery_price' => 2.00,
            'description' => '',
            'image' => 'coffees/1xktZX3KTtrlfccwyC8cKdUEaWrcsIO29QGycSIG.jpg',
            'active' => true
        ]);

        Coffee::create([
            'name' => 'Blason Ground and Roasted Espresso Coffee 400g',
            'weight' => '400g',
            'price' => 18.00,
            'delivery_price' => 2.00,
            'description' => '',
            'image' => 'coffees/6qnCpDKu3VYUyq77R7nHBnaI2DcOgmilDqMtR9lM.jpg',
            'active' => true
        ]);

        Coffee::create([
            'name' => 'Nescafe Taster\'s Choice Oscuro 100g + Tasters Choice',
            'weight' => '100g',
            'price' => 153.00,
            'delivery_price' => 2.00,
            'description' => '',
            'image' => 'coffees/QsyD0KJw8lZG51ndO92JEoqbyHQVcqArybK6aPFf.jpg',
            'active' => true
        ]);
    }
} 