<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Str;
use Twilio\Rest\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendOtpSmsController extends Controller
{
    public function sendOTP()
    {
        // $phoneNumber = '385542181';
        $otp = Str::random(6); // Hàm generateOTP() để tạo mã OTP ngẫu nhiên

        // Lưu mã OTP vào session để so sánh sau khi người dùng nhập
        session(['otp' => $otp]);

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

        return response()->json(['message' => 'OTP sent successfully']);
    }
}
