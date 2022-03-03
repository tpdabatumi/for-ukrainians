@extends('layouts.app')

@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <thead class="bg-dark text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('name') }}</th>
            <th scope="col">{{ __('contact') }}</th>
            <th scope="col">{{ __('arrive') }}</th>
            <th scope="col">{{ __('departure') }}</th>
            <th scope="col">{{ __('location') }}</th>
            <th scope="col">{{ __('comment') }}</th>
            <th scope="col">{{ __('documents') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($applications as $i => $application)
        <tr>
            <th scope="row">{{ $i + 1 }}</th>
            <td>{{ $application->full_name }}</td>
            <td>{{ $application->contact_info }}</td>
            <td>{{ \Carbon\Carbon::parse($application->arrive)->format('d M, Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($application->departure)->format('d M, Y') }}</td>
            <td>{{ $application->current_location }}</td>
            <td>{{ $application->comment }}</td>
            <td>
                @if($application->passport)
                <div>
                    {{ __('passport') }}:
                    <a class="text-decoration-none" href="{{ '/storage/' . $application->passport }}" download>
                        <i class="fas fa-download"></i>
                    </a>
                    <a class="text-decoration-none" href="{{ '/storage/' . $application->passport }}" target="_blank">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
                @endif
                @if($application->passport_arrival)
                <div>
                    {{ __('passport_arrival') }}:
                    <a class="text-decoration-none" href="{{ '/storage/' . $application->passport_arrival }}" download>
                        <i class="fas fa-download"></i>
                    </a>
                    <a class="text-decoration-none" href="{{ '/storage/' . $application->passport_arrival }}" target="_blank">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="flex-wrap">
    {!! $applications->links() !!}
</div>
@endsection