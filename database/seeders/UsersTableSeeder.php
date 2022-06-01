<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->firstname = 'Andreas';
        $user->lastname = 'Hainzel';
        $user->role = 1;
        $user->url = 'https://img.freepik.com/fotos-kostenlos/schoener-mann-laechelnd-glueckliches-gesichtsportraet-hautnah_53876-139608.jpg?t=st=1653651177~exp=1653651777~hmac=5c5cc86e6a94c4f26270eddcca176067bd1ed1aadd3a1e551b1514dadec23fe0&w=996';
        $user->information = 'Hallo liebe Leute! Ich bin hier, um euch bei allem rund ums Thema Programmieren zu helfen. Meine Spezialgebiete sind Java, JavaScript und PHP. Zusätzlich habe ich auch hilfreiche Tipps zum Thema Online-Markteting.';
        $user->phonenumber= '0676/3378780';
        $user->email = 'test@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();


        $user2 = new User();
        $user2->firstname = 'Lara';
        $user2->lastname = 'Hintersteiner';
        $user2->role = 1;
        $user2->url = 'https://img.freepik.com/fotos-kostenlos/indischer-abstammung-glueckliche-frau-portraet_53876-153598.jpg?t=st=1653630928~exp=1653631528~hmac=39f3f832b192975f63ea61add2b702d345e70a1573ee146cdc9c8e3715595296&w=996';
        $user2->information = 'Liebe Schüler:innen! Ich bin Lara und freue mich euch unterstützen zu können. Ich biete Nachhilfe vor allem im Bereich E-Learning / UI/UX und Marketing. Derzeit arbeite ich in einer E-Learning-Agentur in Linz und habe daher schon Erfahrung im Berufsleben. ';
        $user2->phonenumber= '0664/856444';
        $user2->email = 'hintersteiner@gmail.com';
        $user2->password = bcrypt('secret2');
        $user2->save();

        $user3 = new User();
        $user3->firstname = 'Earl';
        $user3->lastname = 'Landl';
        $user3->role = 0;
        $user3->url = 'https://img.freepik.com/fotos-kostenlos/portrait-des-freundlichen-kaukasischen-mannes_53876-13440.jpg?t=st=1653651152~exp=1653651752~hmac=4bd313f3dabebdda7e95ae6ab49e76b131a269e992464538a6d20c31b4e39246&w=1380';
        $user3->information = 'Hallo allerseits! Ich bin Earl und auf der Suche nach Unterstützung im Studium sowie netten Leuten. Am meisten interessiert mich der Bereich UI/UX in KWM.';
        $user3->phonenumber= '0667/123644';
        $user3->email = 'landl@gmail.com';
        $user3->password = bcrypt('secret3');
        $user3->save();


        $user4 = new User();
        $user4->firstname = 'Mathilda';
        $user4->lastname = 'Stock';
        $user4->role = 0;
        $user4->url = 'https://img.freepik.com/fotos-kostenlos/glueckliche-afrikanische-junge-frau-gesichtsportraet_53876-148024.jpg?t=st=1653651433~exp=1653652033~hmac=66edbfb4bb36169f2b3fd9ea1b01fd72bce845d877d1467eb3a1897bd9384fa6&w=996';
        $user4->information = 'Ich bin derzeit im dritten Semester KWM und möchte auf dieser Plattform Kontakte knüpfen.';
        $user4->phonenumber= '0664/984562';
        $user4->email = 'stock@gmail.com';
        $user4->password = bcrypt('secret4');
        $user4->save();

    }
}
