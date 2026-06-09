<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Transaction\TransactionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function view(): Response
    {
        $user = Auth::user();
        $recentTransactions = TransactionLog::where('sender_id', $user->receiver->id)
            ->orWhere('receiver_id', $user->receiver->id)
            ->latest()
            ->take(3)
            ->get();
        dd($recentTransactions);
        return Inertia::render('dashboard/HomeView');
    }
}
