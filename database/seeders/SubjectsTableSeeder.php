<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Subject;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $subject = new Subject();
        $subject->title = "Webentwicklung";
        $subject->description = "Alle Angebote im Bereich Webentwicklung";
        $subject->save();

        $subject2 = new Subject();
        $subject2->title = "E-Learning";
        $subject2->description = "Alle Angebote im Bereich E-Learning";
        $subject2->save();


        $subject3 = new Subject();
        $subject3->title = "UI/UX-Design";
        $subject3->description = "Alle Angebote im Bereich UI/UX-Design";
        $subject3->save();


        $subject4 = new Subject();
        $subject4->title = "Online-Marketing";
        $subject4->description = "Alle Angebote im Bereich Online-Marketing";
        $subject4->save();
    }
}
