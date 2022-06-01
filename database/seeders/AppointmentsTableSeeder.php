<?php

namespace Database\Seeders;
use App\Models\Appointment;
use DateTime;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appointment = new Appointment();
        $appointment-> date = Carbon::createFromFormat("Y.m.d", "2021.04.10", "Europe/Vienna");
        $appointment-> to = Carbon::createFromTime(13, 00, 00, "Europe/Vienna");
        $appointment-> from = Carbon::createFromTime(17, 00, 00, "Europe/Vienna");

        //get the first user
        $user = User::all()->first();
        $appointment ->user()->associate($user);
        $appointment ->save();

        //get the first offer
        $offer = Offer::all()->first();
        $appointment ->offer()->associate($offer);
        $appointment ->save();

    }
}
