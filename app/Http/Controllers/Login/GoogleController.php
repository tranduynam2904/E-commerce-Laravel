<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        // try {
        //     $url = Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
        //     return response()->json(['url' => $url,])->setStatusCode(Response::HTTP_OK);
        // } catch (\Exception $exception) {
        //     return $exception;
        // }
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            // Lấy thông tin người dùng từ Google
            $user = Socialite::driver('google')->user();

            // Kiểm tra xem người dùng đã tồn tại trong database hay chưa
            $findUser = User::where('google_id', $user->id)->first();
            if ($findUser) {
                // Nếu tồn tại, đăng nhập người dùng vào ứng dụng
                Auth::login($findUser);

                return redirect('/');
            } else {
                // Nếu không tồn tại, tạo một tài khoản mới cho người dùng và lưu vào database
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                // Đăng nhập người dùng vào ứng dụng
                Auth::login($newUser);
                return redirect('/');
            }
        } catch (Exception $e) {
            // Nếu có lỗi, hiển thị thông báo lỗi
            dd($e->getMessage());
        }
    }
}
