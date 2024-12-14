<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        try {
            $contacts = Contact::with('replies')->get();
            // dd($contacts->toArray());
            return view('Dashboard.contact.contacts', compact('contacts'));
        } catch (\Exception $e) {
            return redirect()->route('contacts.index')->with('error', 'Failed to retrieve contacts: ' . $e->getMessage());
        }
    }

    public function replyShow($id){
        $contact = Contact::findOrFail($id);
        // dd($contacts);
        return view('Dashboard.contact.contact-reply',compact('contact'));
    }

    public function reply(Request $request){
    try {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
            'attachments' => 'nullable|array',
            'attachments.*' => 'file|mimes:jpeg,png,pdf,doc,docx,txt', 
        ]);

        // Extract the email, subject, and message from the request
        $recipientEmail = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        // Prepare the email content
        $emailContent = [
            'subject' => $subject,
            'message' => $message,
        ];

          // Send the email using Mail facade with HTML content
          Mail::html($message, function ($mail) use ($recipientEmail, $subject, $request) {
            $mail->to($recipientEmail)
                ->subject($subject);

            // Attach files if provided
            if ($request->hasFile('attachments') && is_array($request->file('attachments'))) {
                foreach ($request->file('attachments') as $attachment) {
                    $mail->attach($attachment->getRealPath(), [
                        'as' => $attachment->getClientOriginalName(),
                        'mime' => $attachment->getMimeType(),
                    ]);
                }
            }
        });

        $contact = Contact::findOrFail($request->id);
        $contact->status = 1;
        $contact->save();

        return redirect()->route('contact.show')->with('success', 	"Reply sent successfully!");

    } catch (\Exception $e) {
        return redirect()->route('contact.show')
        ->with('error', 'Failed to send email. Please try again later. Error: ' . $e->getMessage());
    }

    }
}
