<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationSend;
use Livewire\WithFileUploads;

class ApplicationForm extends Component
{
    use WithFileUploads;

    public $full_name;

    public $contact_info;

    public $arrive;

    public $departure;

    public $current_location;

    public $passport;

    public $passport_arrival;

    public $comment;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'full_name' => 'required|min:6',
            'contact_info' => 'required|min:6',
            'arrive' => 'required',
            'departure' => 'required',
            'current_location' => 'required|min:6',
            'passport' => 'required|mimes:jpg,jpeg,png|max:10000',
            'passport_arrival' => 'required|mimes:jpg,jpeg,png|max:10000'
        ]);
    }

    public function submit() {
        $this->validate([
            'full_name' => 'required|min:6',
            'contact_info' => 'required|min:6',
            'arrive' => 'required',
            'departure' => 'required',
            'current_location' => 'required|min:6',
            'passport' => 'required|mimes:jpg,jpeg,png|max:10000',
            'passport_arrival' => 'required|mimes:jpg,jpeg,png|max:10000'
        ]);

        $passport = $this->passport->store('images', 'public');

        $passport_arrival = $this->passport_arrival->store('images', 'public');

        Application::create([
            'full_name' => $this->full_name,
            'contact_info' => $this->contact_info,
            'arrive' => $this->arrive,
            'departure' => $this->departure,
            'current_location' => $this->current_location,
            'passport' => $passport,
            'passport_arrival' => $passport_arrival,
            'comment' => $this->comment
        ]);

        Mail::to(config('mail.from.address'))
            ->send(new ApplicationSend($this->full_name, $this->contact_info, $this->arrive, $this->departure, $this->current_location, $this->comment, $passport, $passport_arrival));

        session()->flash('message', __('success'));
    }

    public function render()
    {
        return view('livewire.application-form');
    }
}
