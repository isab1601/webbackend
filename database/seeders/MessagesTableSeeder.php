<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $message= new Message();
        $message->text = "Ich würde gerne am 21.06 einen Termin haben.";


        //get the first subject
        $offer = Offer::all()->first();
        $message->offer()->associate($offer);
        $message->save();

        //get the first user
        $user = User::all()->first();
        $message->user()->associate($user);
        $message->save();
    }

}
