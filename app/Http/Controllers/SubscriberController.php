<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        $subscribers = Subscriber::query()
            ->where('mail_id', $request->email_id)
            ->paginate(10)->withQueryString();

        return view('subscribers.index', compact('subscribers'));
    }
}
