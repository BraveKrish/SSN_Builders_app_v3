<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\InquiryAlertMail;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function createContact(Request $request)
    {
        // dd($request->all());
        try {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|string',
                'subject' => 'required',
                'message' => 'required'
            ]);

            $data['date'] = now()->format('Y-m-d H:i:s');

            // dd($data);

            // $recipients = ['recipient1@example.com', 'recipient2@example.com'];
            $recipients = ['recipient1@example.com'];

            Contact::create($data);

            foreach ($recipients as $recipient) {
                Mail::send('Dashboard.email.inquiryAlertEmail', ['data' => $data], function ($message) use ($recipient) {
                    $message->to($recipient);
                    $message->subject('New Inquiry Alert!');
                });
            }

            // foreach ($recipients as $recipient) {
            //     Mail::to($recipient)->queue(new InquiryAlertMail($data));
            // }

            // dd('email sent successfully');

            return response()->json(['message' => 'Contact created successfully!'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
