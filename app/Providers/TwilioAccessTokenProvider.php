<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Twilio\Jwt\AccessToken;

class TwilioAccessTokenProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AccessToken::class, function ($app) {
                $TWILIO_ACCOUNT_SID = config('services.twilio')['ACab333b605af9c970e6a12553ee56d305'];
                $TWILIO_API_KEY = config('services.twilio')['IS6ed87b2ab0c34690b774460cb61b011e'];
                $TWILIO_API_SECRET = config('services.twilio')['kYgBLgHqyalTBmOFTwp3fbINSI8FCj0b'];

                $token = new AccessToken(
                    $TWILIO_ACCOUNT_SID,
                    $TWILIO_API_KEY,
                    $TWILIO_API_SECRET,
                    3600
                );

                return $token;
            }
        );
    }
}
