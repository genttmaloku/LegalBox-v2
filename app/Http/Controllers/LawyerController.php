<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lawyer;
use App\Models\Client;
use App\Models\LegalCase;
use App\Models\Meetings;

class LawyerController extends Controller
{
    public function dashboard()
    {
           $latestClients = Client::latest()->take(5)->get();
           $latestLegalCases = LegalCase::latest()->take(5)->get();
           $totalCases = LegalCase::count();
           $totalClients = Client::count();
           $totalMeetings = Meetings::where('status', 'pending')->count();
           return view('lawyerdash', compact('latestClients', 'latestLegalCases', 'totalCases', 'totalClients','totalMeetings'));
    }
}
