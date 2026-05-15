<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function index()
    {
        $search = request()->query('search');

        $emails = Mail::query()->withCount('subscribers')
            ->when($search, fn($q) => $q
                ->where('title', 'ilike', "%{$search}%")
                ->orWhere('id', is_numeric($search) ? $search : null)
            )
            ->paginate(5)
            ->withQueryString();


        $emails->isNotEmpty();

        return view('mail.index', [
            'emails' => $emails
        ]);
    }

    public function create()
    {
        return view('mail.create');
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file',
        ]);

        $csv = request()->file('file');
        $csvHandle = fopen($csv->getRealPath(), 'r');

        $items = [];

        while (($row = fgetcsv($csvHandle, null, ',')) !== false) {
            if ($row[0] === 'name' && $row[1] === 'email') {
                continue;
            }

            $items[] = [
                'name' => $row[0],
                'email' => $row[1]
            ];
        }

        DB::transaction(function () use ($data, $items) {
            $request = Mail::create([
                'title' => $data['title'],
            ]);

            $request->subscribers()->createMany($items);
        });

        return to_route('index');
    }
}
