<?php

namespace App\Console;

use App\Console\Commands\KafkaConsumer;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        KafkaConsumer::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(KafkaConsumer::class, ['process', 'process-group'])
            ->everyFiveMinutes();
    }
}
