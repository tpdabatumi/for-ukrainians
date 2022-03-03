<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationSend;

class ApplicationController extends Controller
{
    public function index() {
        return view('index');
    }

    public function store(Request $request) {
        $request->validate([
            'full_name' => 'required',
            'contact_info' => 'required',
            'arrive' => 'required',
            'departure' => 'required',
            'current_location' => 'required',
            'passport' => 'required|mimes:jpg,jpeg,png|max:10000',
            'passport_arrival' => 'required|mimes:jpg,jpeg,png|max:10000',
        ]);

        $name = $request->full_name;
        $contact = $request->contact_info;
        $arrive = $request->arrive;
        $departure = $request->departure;
        $location = $request->current_location;
        $comment = $request->comment;

        if($request->file('passport')) {
            $passport = $request->file('passport')->store('images', 'public');
        }

        if($request->file('passport_arrival')) {
            $passport_arrival = $request->file('passport_arrival')->store('images', 'public');
        }

        Application::create([
            'full_name' => $name,
            'contact_info' => $contact,
            'arrive' => $arrive,
            'departure' => $departure,
            'current_location' => $location,
            'passport' => $passport,
            'passport_arrival' => $passport_arrival,
            'comment' => $comment
        ]);

        Mail::to(config('mail.from.address'))
            ->send(new ApplicationSend($name, $contact, $arrive, $departure, $location, $comment, $passport, $passport_arrival));

        return redirect()->route('index')->with('message', __('success'));
    }

    public function applications() {
        return view('applications');
    }
}
