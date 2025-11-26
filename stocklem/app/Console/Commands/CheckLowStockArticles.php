<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use App\Models\User;
use App\Notifications\LowStockAlert;

class CheckLowStockArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:check-low';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica artículos con stock bajo y envía alerta por email a los administradores';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Verificando artículos con stock bajo...');

        $lowStockArticles = Article::whereRaw('quantity <= min_quantity')
            ->where('status', 'ACTIVO')
            ->get();

        if ($lowStockArticles->isEmpty()) {
            $this->info('✓ No hay artículos con stock bajo');
            return 0;
        }

        $this->warn("✗ Se encontraron {$lowStockArticles->count()} artículo(s) con stock bajo:");
        
        foreach ($lowStockArticles as $article) {
            $this->line("  - {$article->name}: {$article->quantity} / {$article->min_quantity}");
        }

        // Obtener administradores
        $adminUsers = User::where('role_id', 1)->get();

        if ($adminUsers->isEmpty()) {
            $this->error('No se encontraron administradores para enviar la alerta');
            return 1;
        }

        $this->info("\nEnviando alertas a {$adminUsers->count()} administrador(es)...");

        // Enviar notificación a cada administrador
        foreach ($adminUsers as $admin) {
            $admin->notify(new LowStockAlert($lowStockArticles));
            $this->info("  ✓ Email enviado a: {$admin->email}");
        }

        $this->info("\n✓ Proceso completado exitosamente");
        return 0;
    }
}
