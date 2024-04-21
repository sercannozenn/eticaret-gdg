<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use \Illuminate\Support\Facades\Schedule;
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('verify:send-mail');

/**
 * Unix tabanlı işletim sistemlerinde zamanlama görevlerini OTOMATİKLEŞTİRMEK için kullanılan bir araç.
 *
 * Cron job'lar, crontab dosyasında tanımlanır. Her cron job satırı beş zaman alanı ve ardından çalıştırılacak komutu içerir. Zaman alanları şu şekildedir:
 *
 * Dakika (0 - 59)
 * Saat (0 - 23)
 * Gün (1 - 31)
 * Ay (1 - 12)
 * Haftanın günü (0 - 7, burada 0 ve 7 Pazar gününü temsil eder)
 *
 * Yalnızca salı günleri  saat 14:30 çalışacak cron tanımlaması nasıl yapılır?
 */

//30 14 * * 2 /home/user/scripts/backup.sh
