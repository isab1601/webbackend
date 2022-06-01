<?php

namespace Database\Seeders;

use Cassandra\Date;
use Illuminate\Database\Seeder;
use App\Models\Offer;
use App\Models\User;
use App\Models\Subject;
use App\Models\Appointment;
use DateTime;


class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offer = new Offer();
        $offer->title = "Nachhilfe in Java";
        $offer->description = "In diesem Kurs bekommst du Unterstützung für die Grundlagen der Programmiersprache Java. Besonders geeignet ist der Kurs für Erstsemestler.";

        //get the first subject
        $subject = Subject::all()->first();
        $offer->subject()->associate($subject);
        $offer->save();

        //get the first user
        $user = User::all()->first();
        $offer->user()->associate($user);
        $offer->save();


        // add dates to offer
        $appointment1 = new Appointment();
        $appointment1->date = date("Y-m-d H:i:s");
        $appointment1->from = date("Y-m-d H:i:s");
        $appointment1->to = date("Y-m-d H:i:s");

        $appointment2 = new Appointment();
        $appointment2->date = date("Y-m-d H:i:s");
        $appointment2->from = date("Y-m-d H:i:s");
        $appointment2->to = date("Y-m-d H:i:s");

        $offer->appointments()->saveMany([$appointment1,$appointment2]);
        $offer->save();

    }
}
