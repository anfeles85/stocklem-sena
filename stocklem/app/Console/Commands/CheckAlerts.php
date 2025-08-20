<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\User;
use App\Notifications\LowStockAlert;
use Illuminate\Console\Command;

class CheckAlerts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:article-alerts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'verifica que los articulos cuyo stock esta por debajo del minimo y envia una notificacion al administrador';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $articles = Article::whereColumn('quantity', '<=', 'min_quantity')->get();
        if ($articles->isEmpty()) {
            $this->info('No hay artículos con stock mínimo.');
            return;
        }

        $admins = User::where('role_id', '1')->get();
        if ($admins) {
            foreach ($admins as $admin) {
                $admin->notify(new LowStockAlert($articles));
            }
            $this->info('Alertas de stock mínimo verificadas y notificaciones enviadas.');
        } else {
            $this->error('No se encontró un administrador para enviar las notificaciones.');
        }
    }
}
