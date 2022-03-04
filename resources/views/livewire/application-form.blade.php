<div>
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <div>
            <a href="{{ route('index') }}">{{ __('back') }}</a>
        </div>
    </div>
    @else
    <form class="row" wire:submit.prevent="submit" enctype="multipart/form-data" onsubmit="disableButton()">
        @csrf
        <div class="col-md-12 my-2">
            <label class="my-1" for="full_name">{{ __('name') }} <small class="text-danger">*</small></label>
            <input class="form-control @error('full_name') is-invalid @enderror" type="text" wire:model="full_name" name="full_name" id="full_name" placeholder="John Doe" value="{{ old('full_name') }}" />

            @error('full_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-12 my-2">
            <label class="my-1" for="contact_info">{{ __('contact') }} <small class="text-danger">*</small></label>
            <input class="form-control @error('contact_info') is-invalid @enderror" type="text" wire:model="contact_info" name="contact_info" id="contact_info" placeholder="+995577112233" value="{{ old('contact_info') }}" />

            @error('contact_info')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-6 my-2">
            <label class="my-1" for="arrive">{{ __('arrive') }} <small class="text-danger">*</small></label>
            <input class="form-control @error('arrive') is-invalid @enderror" type="date" wire:model="arrive" name="arrive" id="arrive" placeholder="2022-02-15" value="{{ old('arrive') }}" />

            @error('arrive')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-6 my-2">
            <label class="my-1" for="departure">{{ __('departure') }} <small class="text-danger">*</small></label>
            <input class="form-control @error('departure') is-invalid @enderror" type="date" wire:model="departure" name="departure" id="departure" placeholder="2022-02-28" value="{{ old('departure') }}" />

            @error('departure')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-12 my-2">
            <label class="my-1" for="current_location">{{ __('location') }} <small class="text-danger">*</small></label>
            <input class="form-control @error('current_location') is-invalid @enderror" type="text" wire:model="current_location" name="current_location" id="current_location" placeholder="Batumi, Ajara" value="{{ old('current_location') }}" />

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
            <input class="form-control @error('passport') is-invalid @enderror" type="file" wire:model="passport" name="passport" id="passport" />

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
            <input class="form-control @error('passport_arrival') is-invalid @enderror" type="file" wire:model="passport_arrival" name="passport_arrival" id="passport_arrival" />

            @error('passport_arrival')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-12 my-2">
            <label class="my-1" for="comment">{{ __('comment') }} <small class="text-secondary">({{ __('optional') }})</small></label>
            <textarea class="form-control @error('comment') is-invalid @enderror" wire:model="comment" name="comment" id="comment" cols="30" rows="4" placeholder="Lorem ipsum dolor, sit amet...">{{ old('comment') }}</textarea>

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
    @endif
</div>
