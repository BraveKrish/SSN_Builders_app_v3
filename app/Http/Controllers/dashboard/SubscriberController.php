<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{

    public function index()
    {
        // $subscribers = Subscriber::where('is_verified', true)->get();
        $subscribers = Subscriber::all();
        // dd($subscribers->toArray());
        return view('Dashboard.subscriber.subscribers', compact('subscribers'));
    }

    public function verifyEmail($token)
    {
        // dd($token);
        $subscriber = Subscriber::where('verification_token', $token)->first();

        if (!$subscriber) {
            return back()->with(['error', 'Verification token not found or not valid']);
        }

        $subscriber->is_verified = true;
        $subscriber->verification_token = null;
        $subscriber->save();

        return view('Dashboard.pages.verified')->with(['success', 'Your email has been verified!']);
    }
}
