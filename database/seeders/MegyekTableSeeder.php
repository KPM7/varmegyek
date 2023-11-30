<?php

namespace Database\Seeders;

use App\Models\Megyek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MegyekTableSeeder extends Seeder
{
    const ITEMS = [
        'Bács-Kiskun',
        'Baranya',
        'Békés',
        'Borsod-Abaúj-Zemplén',
        'Csongrád-Csanád',
        'Fejér',
        'Győr-Moson-Sopron',
        'Hajdú-Bihar',
        'Heves',
        'Jász-Nagykun-Szolnok',
        'Komárom-Esztergom',
        'Nógrád',
        'Pest',
        'Somogy',
        'Szabolcs-Szatmár-Bereg	',
        'Tolna',
        'Vas',
        'Veszprém',
        'Zala',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ITEMS as $item) {
            $entity = new Megyek(['name' => $item]);
            $entity->save();
        }
    }
}
