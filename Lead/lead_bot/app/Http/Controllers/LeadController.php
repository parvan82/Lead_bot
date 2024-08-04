<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = lead::all();
        
        return view('table', compact('leads'));
    }
    public function  report($id)
    {
        
        $lead = Lead::findOrFail($id);
        return view('report', ['lead' => $lead]);
    }
}
