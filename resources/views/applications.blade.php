@extends('layouts.app')

@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <thead class="bg-dark text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full name</th>
            <th scope="col">Contact info</th>
            <th scope="col">Arrive date</th>
            <th scope="col">Departure date</th>
            <th scope="col">Current location</th>
            <th scope="col">Additional info</th>
            <th scope="col">Uploaded documents</th>
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
                <a href="{{ '/storage/' . $application->passport }}" download>Passport</a>
                <br>
                @endif
                @if($application->passport_arrival)
                <a href="{{ '/storage/' . $application->passport_arrival }}" download>Passport copy of arrival date</a>
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