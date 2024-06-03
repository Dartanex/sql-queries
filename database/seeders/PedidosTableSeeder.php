<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pedidos')->insert([
            ['product_name' => 'Laptop', 'quantity' => 2, 'total_price' => 2000, 'id_usuario' => 1],
            ['product_name' => 'Headphones', 'quantity' => 1, 'total_price' => 150, 'id_usuario' => 2],
            ['product_name' => 'Keyboard', 'quantity' => 1, 'total_price' => 100, 'id_usuario' => 3],
            ['product_name' => 'Monitor', 'quantity' => 2, 'total_price' => 400, 'id_usuario' => 4],
            ['product_name' => 'Mouse', 'quantity' => 3, 'total_price' => 75, 'id_usuario' => 5],
            ['product_name' => 'Webcam', 'quantity' => 1, 'total_price' => 80, 'id_usuario' => 6],
            ['product_name' => 'USB Hub', 'quantity' => 2, 'total_price' => 50, 'id_usuario' => 7],
            ['product_name' => 'External Hard Drive', 'quantity' => 1, 'total_price' => 120, 'id_usuario' => 8],
            ['product_name' => 'Printer', 'quantity' => 1, 'total_price' => 200, 'id_usuario' => 9],
            ['product_name' => 'Desk Chair', 'quantity' => 1, 'total_price' => 300, 'id_usuario' => 10],
            ['product_name' => 'Smartphone', 'quantity' => 2, 'total_price' => 1500, 'id_usuario' => 1],
            ['product_name' => 'Tablet', 'quantity' => 1, 'total_price' => 600, 'id_usuario' => 2],
            ['product_name' => 'Speakers', 'quantity' => 2, 'total_price' => 250, 'id_usuario' => 3],
            ['product_name' => 'Smartwatch', 'quantity' => 1, 'total_price' => 350, 'id_usuario' => 4],
            ['product_name' => 'Router', 'quantity' => 1, 'total_price' => 100, 'id_usuario' => 5],
            ['product_name' => 'Gaming Console', 'quantity' => 1, 'total_price' => 500, 'id_usuario' => 6],
            ['product_name' => 'Digital Camera', 'quantity' => 1, 'total_price' => 700, 'id_usuario' => 7],
            ['product_name' => 'Bluetooth Adapter', 'quantity' => 3, 'total_price' => 45, 'id_usuario' => 8],
            ['product_name' => 'Microphone', 'quantity' => 1, 'total_price' => 150, 'id_usuario' => 9],
            ['product_name' => 'Projector', 'quantity' => 1, 'total_price' => 900, 'id_usuario' => 10],
            ['product_name' => 'Laptop Bag', 'quantity' => 1, 'total_price' => 50, 'id_usuario' => 1],
            ['product_name' => 'Docking Station', 'quantity' => 1, 'total_price' => 120, 'id_usuario' => 2],
            ['product_name' => 'Wireless Charger', 'quantity' => 2, 'total_price' => 40, 'id_usuario' => 3],
            ['product_name' => 'Smart Light Bulbs', 'quantity' => 4, 'total_price' => 80, 'id_usuario' => 4],
            ['product_name' => 'Fitness Tracker', 'quantity' => 1, 'total_price' => 200, 'id_usuario' => 5],
            ['product_name' => 'Noise Cancelling Headphones', 'quantity' => 1, 'total_price' => 300, 'id_usuario' => 6],
            ['product_name' => 'VR Headset', 'quantity' => 1, 'total_price' => 400, 'id_usuario' => 7],
            ['product_name' => 'E-Reader', 'quantity' => 1, 'total_price' => 100, 'id_usuario' => 8],
            ['product_name' => 'Electric Kettle', 'quantity' => 1, 'total_price' => 60, 'id_usuario' => 9],
            ['product_name' => 'Air Purifier', 'quantity' => 1, 'total_price' => 150, 'id_usuario' => 10],
        ]);
    }
}
