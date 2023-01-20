<?php

namespace App\Console;

use App\Models\Order;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {

            $hora = now()->subMinute(10);

            $orders = Order::where('status', 1)->whereTime('created_at', '<=', $hora)->get();

            foreach ($orders as $order) {

                $items = json_decode($order->content);

                foreach ($items as $item) {
                    increase($item);
                }

                $order->status = 5;

                $order->save();
            }

        })->everyMinute();

        $schedule->command('cambiar:rango')->dailyAt('00:00'); //a diario a las 00:00
        $schedule->command('comisionar:global')->quarterly(); // primer dia de cada trimestre 
        $schedule->command('desactivar_comision:users')->monthly(28,'00:00'); // dia 28 de cada mes a las 00:000
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
