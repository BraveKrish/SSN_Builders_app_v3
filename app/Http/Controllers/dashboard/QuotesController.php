<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Quotes;
use App\Models\ResponseQuote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuotesController extends Controller
{
    /**
     * Display a listing of the quotes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            $quotes = Quotes::all();
            return view('Dashboard.quote.quotes', compact('quotes'));
        } catch (\Exception $e) {
            Log::error("Error fetching quotes: " . $e->getMessage());
            return view('errors.generic');
        }
    }

    /**
     * Show the form for creating a new quote.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('quotes.create');
    }

    /**
     * Store a newly created quote in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            // Add other validation rules as needed
        ]);

        try {
            Quotes::create($request->all());
            return redirect()->route('quotes.index')->with('success', 'Quote created successfully.');
        } catch (\Exception $e) {
            Log::error("Error creating quote: " . $e->getMessage());
            return redirect()->back()->with('error', 'Error creating quote.');
        }
    }

    /**
     * Display the specified quote.
     *
     * @param \App\Models\Quote $quote
     * @return \Illuminate\View\View
     */
    public function show(Quotes $quote)
    {
        try {
            return view('quotes.show', compact('quote'));
        } catch (\Exception $e) {
            Log::error("Error fetching quote details: " . $e->getMessage());
            return view('errors.generic');
        }
    }

    /**
     * Show the form for editing the specified quote.
     *
     * @param \App\Models\Quote $quote
     * @return \Illuminate\View\View
     */
    public function edit(Quotes $quote)
    {
        try {
            return view('quotes.edit', compact('quote'));
        } catch (\Exception $e) {
            Log::error("Error fetching quote for editing: " . $e->getMessage());
            return view('errors.generic');
        }
    }

    /**
     * Update the specified quote in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Quote $quote
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Quotes $quote)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            // Add other validation rules as needed
        ]);

        try {
            $quote->update($request->all());
            return redirect()->route('quotes.index')->with('success', 'Quote updated successfully.');
        } catch (\Exception $e) {
            Log::error("Error updating quote: " . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating quote.');
        }
    }

    /**
     * Remove the specified quote from storage.
     *
     * @param \App\Models\Quote $quote
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Quotes $quote)
    {
        try {
            $quote->delete();
            return redirect()->route('quotes.index')->with('success', 'Quote deleted successfully.');
        } catch (\Exception $e) {
            Log::error("Error deleting quote: " . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting quote.');
        }
    }

    // Methods for ResponseQuote

    /**
     * Show the form for creating a new response quote.
     *
     * @return \Illuminate\View\View
     */
    public function createResponse(Quotes $quote)
    {
        return view('response_quotes.create', compact('quote'));
    }

    /**
     * Store a newly created response quote in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Quote $quote
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeResponse(Request $request, Quotes $quote)
    {
        $request->validate([
            'total_cost' => 'required|numeric',
            'cost_breakdown' => 'nullable|string',
            'timeline_estimate' => 'nullable|string',
            'terms_and_conditions' => 'nullable|string',
            'additional_notes' => 'nullable|string',
            'response_format' => 'required|in:pdf,upload',
            // Add other validation rules as needed
        ]);

        try {
            $responseQuote = new ResponseQuote($request->all());
            $responseQuote->quote_id = $quote->id;
            $responseQuote->save();

            return redirect()->route('quotes.show', $quote->id)->with('success', 'Response quote created successfully.');
        } catch (\Exception $e) {
            Log::error("Error creating response quote: " . $e->getMessage());
            return redirect()->back()->with('error', 'Error creating response quote.');
        }
    }

    /**
     * Display the specified response quote.
     *
     * @param \App\Models\ResponseQuote $responseQuote
     * @return \Illuminate\View\View
     */
    public function showResponse(ResponseQuote $responseQuote)
    {
        try {
            return view('response_quotes.show', compact('responseQuote'));
        } catch (\Exception $e) {
            Log::error("Error fetching response quote details: " . $e->getMessage());
            return view('errors.generic');
        }
    }
}
