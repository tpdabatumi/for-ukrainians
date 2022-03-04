@extends('layouts.app')

@section('content')
@livewire('application-form')
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