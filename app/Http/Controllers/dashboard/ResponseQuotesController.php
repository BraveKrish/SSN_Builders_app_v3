<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Mail\QuoteResponseMail;
use App\Models\Quotes;
use App\Models\ResponseQuote;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ResponseQuotesController extends Controller
{

    public function prepareQuote($id)
    {
        // dd($id);
        $quote = Quotes::find($id);
        // dd($quote->toArray());
        return view('Dashboard.quote.prepare_quote', compact('quote'));
    }

    public function sendQuoteResponse(Request $request)
    {
        // dd('hello world');
        // dd($request->all());
        // $action = $request->input('action');
        switch ($request->input('action')) {
            case 'save':
                Session::put('form_data', $request->all());
                // Redirect back to the form
                return redirect()->route('quotes.prepare', $request->quote_id)->withInput($request->all());

            case 'preview_pdf':
                // $formData = $request->all();
                $pdf = PDF::loadView('Dashboard.email.quote_response_mail', $request->all());
                return $pdf->stream('quote_response.pdf');

            case 'generate_send':
                try {
                    $formData = $request->all();

                    // Generate the PDF
                    $pdf = PDF::loadView('Dashboard.email.quote_response_mail', $formData);
                    $pdfFileName = 'quote_response_' . time() . '.pdf'; // Create a unique file name
                    $filePath = public_path('uploads/QuoteResponseFile/' . $pdfFileName); // Define the file path

                    $pdf->save($filePath); // Save the PDF

                    // Add the PDF path to the formData
                    $formData['pdf'] = $pdf;
                    $formData['generated_pdf'] = 'uploads/QuoteResponseFile/' . $pdfFileName; // Save only the relative path for the database

                    $quoteResult = ResponseQuote::create($formData);

                    if($quoteResult){
                       $quote =  Quotes::findOrFail($request->quote_id);
                       $quote->status = 'quote_sent';
                       $quote->save();
                    }

                    // Send the email with the PDF attached if needed
                    Mail::to($formData['email'])->send(new QuoteResponseMail($formData));

                    dd("Mail sent successfully");

                    // Redirect to a specified route with a success message
                    // return redirect()->route('quotes.prepare',$request->quote_id)->with('message', 'Mail sent successfully!');

                } catch (\Exception $e) {
                    // Redirect to a specified route with an error message
                    // return back()->with('message', 'An error occurred: ' . $e->getMessage());
                    return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
                }



                // return redirect()->route('dashboard.response_quotes.prepare_quote', $save->id)->with('success', 'Quote Response Saved Successfully');
            default:
                return redirect()->back()->withErrors('Invalid action');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
