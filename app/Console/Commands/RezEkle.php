<?php

namespace App\Console\Commands;

use App\Models\Rezervasyon;
use App\Models\User;
use App\Notifications\NewRez;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class RezEkle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:rez-ekle {--queue}' ;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $randomDate = Carbon::now()->subDays(rand(1, 30)); // Son 30 gün içerisinde rastgele bir tarih

// Belirli bir aralık içinde rastgele bir tarih oluşturma
$startDate = Carbon::create(2023, 1, 1); // Başlangıç tarihi
$endDate = Carbon::create(2023, 12, 31); // Bitiş tarihi
$randomDateInRange = Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp));



        $reznumarasi = '888888';
        $alluser = User::all();

        $rezervasyon = new Rezervasyon();
        $rezervasyon->giris =  $randomDateInRange->toDateString();// giris tarihi
        $rezervasyon->cikis = $randomDateInRange->toDateString(); // cikis tarihi
        $rezervasyon->kisi_sayisi = 1;// kisi sayisi
        $rezervasyon->musteri_adi = 'aaaa'; // musteri adi
        $rezervasyon->musteri_id =1; // musteri id
        $rezervasyon->rez_kod = $reznumarasi;
        $rezervasyon->total_fiyat = '9999';// total fiyat
        $rezervasyon->oda_id = '2'; // oda id
        $rezervasyon->save();

        foreach ($alluser as $user) {
            Notification::send($user, new NewRez($reznumarasi));
        }

    }
}
