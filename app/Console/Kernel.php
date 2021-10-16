<?php

namespace App\Console;

use App\Mail\EmailAgainConfirmation;
use App\Models\User;
use App\Models\EmailsVerifications;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Str;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $user = User::where('updated_at', '<', date('Y-m-d', time()))->get();

            foreach ($user as $elem) {
                if (date('Y-m-d', strtotime($elem->updated_at . "+20 days")) < date('Y-m-d', time())) {
                    $hash = Str::random();
                    
                    $emailsVerifications = new EmailsVerifications;
                    $emailsVerifications->email = $elem->email;
                    $emailsVerifications->hash = $hash;
                    $emailsVerifications->user_id = $elem->id;
                    $emailsVerifications->save();

                    Mail::to($elem->email)->send(new EmailAgainConfirmation($hash));
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
