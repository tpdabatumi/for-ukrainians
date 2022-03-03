@extends('layouts.app')

@section('content')
@if(session('message'))
@include('layouts.message')
@endif
<form class="row" action="{{ route('store') }}" method="post" enctype="multipart/form-data" onsubmit="disableButton()">
    @csrf
    <div class="col-md-12 my-2">
        <label class="my-1" for="full_name">{{ __('name') }} <small class="text-danger">*</small></label>
        <input class="form-control @error('full_name') is-invalid @enderror" type="text" name="full_name" id="full_name" placeholder="John Doe" value="{{ old('full_name') }}" required />

        @error('full_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-12 my-2">
        <label class="my-1" for="contact_info">{{ __('contact') }} <small class="text-danger">*</small></label>
        <input class="form-control @error('contact_info') is-invalid @enderror" type="text" name="contact_info" id="contact_info" placeholder="+995577112233" value="{{ old('contact_info') }}" required />

        @error('contact_info')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 my-2">
        <label class="my-1" for="arrive">{{ __('arrive') }} <small class="text-danger">*</small></label>
        <input class="form-control @error('arrive') is-invalid @enderror" type="date" name="arrive" id="arrive" placeholder="2022-02-15" value="{{ old('arrive') }}" required />

        @error('arrive')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 my-2">
        <label class="my-1" for="departure">{{ __('departure') }} <small class="text-danger">*</small></label>
        <input class="form-control @error('departure') is-invalid @enderror" type="date" name="departure" id="departure" placeholder="2022-02-28" value="{{ old('departure') }}" required />

        @error('departure')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-12 my-2">
        <label class="my-1" for="current_location">{{ __('location') }} <small class="text-danger">*</small></label>
        <input class="form-control @error('current_location') is-invalid @enderror" type="text" name="current_location" id="current_location" placeholder="Batumi, Ajara" value="{{ old('current_location') }}" required />

        @error('current_location')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 my-2">
        <label class="my-1" for="passport">{{ __('passport') }} <small class="text-danger">*</small>
        <br>
        <small class="text-secondary">({{ __('format') }})</small></label>
        <input class="form-control @error('passport') is-invalid @enderror" type="file" name="passport" id="passport" required />

        @error('passport')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 my-2">
        <label class="my-1" for="passport_arrival">{{ __('passport_arrival') }} <small class="text-danger">*</small>
        <br>
        <small class="text-secondary">({{ __('format') }})</small></label>
        <input class="form-control @error('passport_arrival') is-invalid @enderror" type="file" name="passport_arrival" id="passport_arrival" required />

        @error('passport_arrival')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-12 my-2">
        <label class="my-1" for="comment">{{ __('comment') }} <small class="text-secondary">({{ __('optional') }})</small></label>
        <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" id="comment" cols="30" rows="4" placeholder="Lorem ipsum dolor, sit amet...">{{ old('comment') }}</textarea>

        @error('comment')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mt-4 text-center">
        <button class="btn btn-primary rounded-pill px-4 shadow" type="submit">
            {{ __('submit') }}
            <i class="fas fa-paper-plane fa-sm"></i>
        </button>
    </div>
</form>
@endsection

@section('script')
<script>
    function disableButton() {
        let btn = document.querySelector('.btn');
        btn.disabled = true;
        btn.innerText = "{{ __('loading') . '...' }}"
    }
</script>
@endsection