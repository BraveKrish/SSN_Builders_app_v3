<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        $token = Str::random(32);

        $subscriber = Subscriber::create([
            'email' => $request->email,
            'verification_token' => $token,
        ]);

        // Send verification email
        Mail::send('Dashboard.email.verify-subscriber', ['token' => $token], function ($message) use ($subscriber) {
            $message->to($subscriber->email);
            $message->subject('Verify your email address');
        });

        // dd("Email sent. Verify your email address");

        return response()->json(['success', 'Subscription successful! Please check your email to verify your address.']);
    }

    // Verify email
    public function verifyEmail($token)
    {
        // dd($token);
        $subscriber = Subscriber::where('verification_token', $token)->first();

        if (!$subscriber) {
            return response()->json('error', 'Verification token not found or not valid');
        }

        $subscriber->is_verified = true;
        $subscriber->verification_token = null;
        $subscriber->save();

        return response('/')->json('success', 'Your email has been verified!');
    }
}
