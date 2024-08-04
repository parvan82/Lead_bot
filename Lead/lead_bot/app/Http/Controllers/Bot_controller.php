<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\LeadCreatedEvent;
use App\Events\LeadActivityCreatedEvent;
use App\Services\Parser;
use App\Models\Lead;
use App\Models\LeadActivity;

class Bot_controller extends Controller
{
    protected $parser;

    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function handle(Request $request)
    {

        $message = $request->input('message');
        $text = $message['text'] ?? '';
        $message_id = $message['message_id'];
        $telegram_chat_id = $message['chat']['id'];

        $parsedData = $this->parser->parse($text, $message_id , $telegram_chat_id);

        $lead = Lead::create([
            'description' => $parsedData['description'],
            'phone_number' => $parsedData['phone_number'],
            'lead_source_id' => $parsedData['lead_source_id'],
            'email' => $parsedData['email'],
            'message_id' => $message_id,
            'chat_id'=> $telegram_chat_id,
        ]);

        event(new LeadCreatedEvent($lead));

        return response()->json($lead);
    }
    public function Report(Request $request)
    {
        $request->validate([
            'report' => 'required|string|max:255',
            'lead_id' => 'required|exists:leads,id'
        ]);

        $lead = LeadActivity::create([
            'lead_id' => $request->input('lead_id'),

            'description' => $request->input('report'),

        ]);

        event(new LeadActivityCreatedEvent($lead));

        return back()->with('success', 'Report submitted successfully!');

    }

    public function show($id)
    {
        $lead = Lead::find($id);

        return view('lead_details', compact('lead'));
    }


}
