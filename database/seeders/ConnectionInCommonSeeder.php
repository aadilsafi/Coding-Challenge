<?php

namespace Database\Seeders;

use App\Models\ConnectionRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConnectionInCommonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    for($i=60;$i<=100;$i++){
        $data = [
            'sender_id' => $i,
            'receiver_id' => 1,
            'status' => 1,
        ];
        ConnectionRequest::create($data);
    }
    }
}
