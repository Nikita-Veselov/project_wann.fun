<?php

namespace App\Console;

use App\Models\Link;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;
use Symfony\Component\VarDumper\Caster\LinkStub;

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
        Log::info("Working");
        // $schedule->call(function () {
        //     Link::where('updated_at', '<', Carbon::now()->subDays(14))
        //         ->where('user_id', '=', 'guest')
        //         ->delete();
        // })->daily();
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
