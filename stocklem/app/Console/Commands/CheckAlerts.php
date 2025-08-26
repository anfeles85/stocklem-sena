<?php

namespace App\Console\Commands;

use App\Mail\LowStockAlertMail;
use App\Models\Article;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail; // Asegúrate de tener este use

class CheckAlerts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:article-alerts';
    protected $description = 'Verifica artículos con stock bajo y envía correo a administradores';

    
    public function handle()
    {
        // Obtener artículos con stock <= mínimo
        $articles = Article::whereColumn('quantity', '<=', 'min_quantity')->get();

        if ($articles->isEmpty()) {
            $this->info('No hay artículos con stock por debajo del mínimo.');
            return;
        }

        // Obtener administradores (role_id = 1)
        $admins = User::where('role_id', 1)->get(); // Nota: usa 1 como entero

        if ($admins->isEmpty()) {
            $this->error('No se encontraron administradores (role_id = 1).');
            return;
        }

        // Enviar correo a cada administrador
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(
                new LowStockAlertMail($articles, $admin->name)
            );
        }

        $this->info("Correo enviado a {$admins->count()} administrador(es) con {$articles->count()} artículo(s) en stock crítico.");
    }
}
