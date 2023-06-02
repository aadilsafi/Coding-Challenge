<?php

namespace Database\Seeders;

use App\Models\ConnectionRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=31;$i<=120;$i++){
            if($i <= 60){
            $data = [
                'sender_id' => $i,
                'receiver_id' => 1,
                'status' => 0,
            ];
        }elseif($i<= 90){
            $data = [
                'sender_id' => 1,
                'receiver_id' => $i,
                'status' => 0,
            ];
        }
            ConnectionRequest::create($data);
        }

    }
}
