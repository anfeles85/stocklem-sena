<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\User;
use App\Notifications\LowStockAlert;

class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     */
    public function created(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "updated" event.
     */
    public function updated(Article $article): void
    {
        // Se detecta si la cantidad cambio, con isDirty se lee la propiedad 'quantity'
        if ($article->isDirty('quantity')){
        
            if ($article->quantity <= $article->min_quantity) {
                // Se obtienen los usuarios con rol de administrador y se les envia la notificacion
                $admin_users = User::where('role_id', 1)->get();

                foreach ($admin_users as $user) {
                    $user->notify(new LowStockAlert(collect([$article])));
                }
            }
        }
    }

    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "restored" event.
     */
    public function restored(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     */
    public function forceDeleted(Article $article): void
    {
        //
    }
}
