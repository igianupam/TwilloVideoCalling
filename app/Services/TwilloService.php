<?php

namespace App\Services;

use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

class TwilioService
{

    public function __construct(){

    }

    public function generateAccessToken(string $identity): string
    {
        $accountSid = env('TWILIO_ACCOUNT_SID');
        $apiKeySid = env('TWILIO_API_KEY');
        $apiKeySecret = env('TWILIO_API_SECRET');

        // Create an access token
        $token = new AccessToken($accountSid, $apiKeySid, $apiKeySecret, 3600, $identity);

        // Create a Video grant
        $videoGrant = new VideoGrant();

        // Attach the grant to the token
        $token->addGrant($videoGrant);

        return $token->toJWT();
    }
}
