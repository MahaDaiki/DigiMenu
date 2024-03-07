<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;



class SubscriptionController extends Controller
{
    public function show()
    {
        $subscriptions = DB::table('subscriptions')
            ->orderBy('price')
            ->get();
        return view('subscriptions', compact('subscriptions'));
    }
    public function create()
    {
        return view('add_subscription');
    }

    public function store(Request $request)
    {
        Subscription::create([
            'name' => $request->name,
            'price' => $request->price,
            'article_number' => $request->article_number,
            'scan_limit' => $request->scan_limit,
            'media_type' => $request->media_type,
        ]);

        Mail::to('test@gmail.com')->send(new UserMail());


        return back();
    }

    public function edit($id)
    {
        $subscription = Subscription::find($id);

        return view('edit_subscription', compact('subscription'));
    }

    public function update(Request $request)
    {
        $subscription = Subscription::find($request->id);

        $subscription->name = $request->name;
        $subscription->price = $request->price;
        $subscription->article_number = $request->article_number;
        $subscription->scan_limit = $request->scan_limit;
        $subscription->media_type = $request->media_type;
        $subscription->save();

        return to_route('subscriptions.show');
    }
}
