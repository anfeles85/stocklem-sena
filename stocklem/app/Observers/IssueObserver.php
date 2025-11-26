<?php

namespace App\Observers;

use App\Models\Issue;
use App\Models\Article;
use App\Models\User;
use App\Notifications\LowStockAlert;

class IssueObserver
{
    /**
     * Handle the Issue "created" event.
     */
    public function created(Issue $issue): void
    {
        $this->checkAllLowStock();
    }

    /**
     * Handle the Issue "updated" event.
     */
    public function updated(Issue $issue): void
    {
        $this->checkAllLowStock();
    }

    /**
     * Verifica todos los artículos con stock bajo y envía una sola alerta
     */
    private function checkAllLowStock(): void
    {
        // Obtener todos los artículos con stock bajo
        $lowStockArticles = Article::whereRaw('quantity <= min_quantity')
            ->where('status', 'ACTIVO')
            ->get();
        
        if ($lowStockArticles->isEmpty()) {
            return;
        }
        
        // Obtener administradores y enviar una sola notificación con todos los artículos
        $adminUsers = User::where('role_id', 1)->get();
        
        foreach ($adminUsers as $user) {
            $user->notify(new LowStockAlert($lowStockArticles));
        }
    }
}

