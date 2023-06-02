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
        $all_connections = [];
        for ($i = 2; $i <= 30; $i++) {
            $data =
                [
                    'sender_id' => $i,
                    'receiver_id' => 1,
                    'status' => 1,
                ];
            array_push($all_connections, $data);
            if ($i >= 3) {
                $data =
                    [
                        'sender_id' => $i,
                        'receiver_id' => 2,
                        'status' => 1,
                    ];
                array_push($all_connections, $data);
            }
        }
        ConnectionRequest::insert($all_connections);
    }
}
