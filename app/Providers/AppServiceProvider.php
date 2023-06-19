<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Swift_Mailer;
use Swift_SmtpTransport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     **/

    public function register()
    {
        $this->app->bind('mailer', function ($app) {
            $transport = new Swift_SmtpTransport(env('MAIL_HOST'), env('MAIL_PORT'), env('MAIL_ENCRYPTION'));
            $transport->setUsername(env('MAIL_USERNAME'));
            $transport->setPassword(env('MAIL_PASSWORD'));

            return new Swift_Mailer($transport);
        });

        $this->app->alias('mailer', Mailer::class);
        $this->app->alias('mailer', MailQueue::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
