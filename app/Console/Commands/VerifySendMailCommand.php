<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\WelcomeMailNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class VerifySendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verify:send-mail {user? : UserId değernini alır.} {--Q|queue} {--T|kimlik_no=} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email adresini doğrulamayan kullanıcılara mail atan command.';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $users = User::query()
            ->whereNull('email_verified_at')
            ->get();

        foreach ($users as $user)
        {
            $token = Str::random(40);

            Cache::put('verify_token_' . $token, $user->id, 3600);

            $user->notify(new WelcomeMailNotification($token));
        }
    }
}
