<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubscriberController extends Controller
{
    public function index(Request $request): View
    {
        $subscribers = Subscriber::query()
            ->where('mail_id', $request->subscriber)
            ->paginate(10)->withQueryString();

        return view('subscribers.index', compact('subscribers'));
    }

    public function edit(Request $request, Subscriber $subscriber): View
    {
       $subscriber =  Subscriber::query()->where('id', $request->subscriber)->firstOrFail();

        return view('subscribers.edit', [
            'subscriber' => $subscriber
        ]);
    }

    public function update(Request $request, Subscriber $subscriber)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $subscriber->update($data);

        return redirect()->route('mail.index');
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route('mail.subscribers', [
            'subscriber' => $subscriber
        ]);
    }
}
