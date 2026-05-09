<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

Route::get('/health', function () {

    $result = [];

    $result['app'] = 'Laravel is running';

    // Database
    try {
        DB::connection()->getPdo();
        $result['database'] = 'Ok';
    } catch (\Exception $e) {
        $result['database'] = 'Fail: ' . $e->getMessage();
    }

    // Redis
    try {
        Redis::set('health_check', 'Ok');

        $result['redis'] =
            Redis::get('health_check') == 'Ok'
            ? 'Ok'
            : 'Fail';
    } catch (\Exception $e) {
        $result['redis'] = 'Fail: ' . $e->getMessage();
    }

    // Mail
    try {

        Mail::raw('Health check email', function ($message) {

            $message->to('test@example.com')
                ->subject('Health Check');
        });

        $result['mail'] = 'Sent (Check MailHog)';
    } catch (\Exception $e) {

        $result['mail'] = 'Fail: ' . $e->getMessage();
    }

    return response()->json([
        'status'   => 'Health check completed',
        'services' => $result
    ]);
});
