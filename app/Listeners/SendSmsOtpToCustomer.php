<?php

namespace App\Listeners;

use App\Events\UpdatePhoneEvent;
use Twilio\Rest\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redirect;

class SendSmsOtpToCustomer
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UpdatePhoneEvent $event)
    {
        $request = $event->request;
        session(['update_request' => $request->all()]);
        if ($request->user()->phone == $request->phone) {
            return Redirect::route('profile.edit')->with('message', 'Nothing to update');
        } else {
            $phoneNumber = '+84' . $request->phone;
            $otp = random_int(100000, 999999); // Generate 6 random numbers

            session(['otp' => $otp]); // Save the 6 random numbers to the session

            $twilioSid = env('TWILIO_ACCOUNT_SID');
            $twilioToken = env('TWILIO_AUTH_TOKEN');
            $twilioNumber = env('TWILIO_PHONE_NUMBER');

            $client = new Client($twilioSid, $twilioToken);

            $client->messages->create(
                $phoneNumber,
                [
                    'from' => $twilioNumber,
                    'body' => 'Your OTP is: ' . $otp
                ]
            );
        }
        return Redirect::route('profile.phone.verifyOtp');
    }
}
