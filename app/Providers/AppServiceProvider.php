<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function( $url)
        {
            return(new MailMessage)
            ->subject('Verificar Cuenta')
            ->line('Haga clic en el boton a continuacion para verificar su direccion de Correo electronico.')
            ->action('Confirmar cuenta', $url)
            ->line('Si no creaste esta cuenta, puedes ignorar este corro.');
        });
    }
}
