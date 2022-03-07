<div>
    <div class="row justify-content-between mb-3">
        <div class="col-6 col-md-3 col-lg-2 d-flex align-items-center my-1">
            <select class="form-select" id="paginate" wire:model="paginate" style="width: 80px;">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="75">75</option>
                <option value="100">100</option>
            </select>
            <label class="ms-1" for="paginate">
                <small>{{ __('per_page') }}</small>
            </label>
        </div>
        <div class="col-6 col-md-4 col-lg-3 my-1">
            <input class="form-control" type="text" wire:model="search" placeholder="{{ __('search') }}" />
        </div>
        @if(count($selectedRecords))
        <div class="col-12 my-1">
            <button class="btn btn-sm btn-primary" wire:click="export">
                {{ __('export') }} {{ count($selectedRecords) }}
                @if(count($selectedRecords) > 1)
                {{ __('records') }}
                @else
                {{ __('record') }}
                @endif
            </button>
        </div>
        @endif
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="bg-dark text-white">
            <tr>
                <th scope="col"></th>
                <th scope="col">{{ __('name') }}</th>
                <th scope="col">{{ __('contact') }}</th>
                <th scope="col">{{ __('arrive') }}</th>
                <th scope="col">{{ __('departure') }}</th>
                <th scope="col">{{ __('location') }}</th>
                <th scope="col" class="w-25">{{ __('comment') }}</th>
                <th scope="col">{{ __('registration_date') }}</th>
                <th scope="col">{{ __('documents') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($applications as $application)
            <tr>
                <th scope="row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $application->id }}" wire:model="selectedRecords">
                    </div>
                </th>
                <td>{{ $application->full_name }}</td>
                <td>{{ $application->contact_info }}</td>
                <td>{{ \Carbon\Carbon::parse($application->arrive)->format('d M, Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($application->departure)->format('d M, Y') }}</td>
                <td>{{ $application->current_location }}</td>
                <td title="{{ $application->comment }}">
                    {{ mb_substr($application->comment, 0, 80) }}@if(strlen($application->comment) > 80)...@endif
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($application->created_at)->format('H:i (d M, Y)') }}
                </td>
                <td>
                    @if($application->passport)
                    <div class="d-flex gap-1">
                        {{ __('doc_passport') }}:
                        <div>
                            <a class="text-decoration-none" href="{{ '/storage/' . $application->passport }}" download>
                                <i class="fas fa-download"></i>
                            </a>
                            <a class="text-decoration-none" href="{{ '/storage/' . $application->passport }}" target="_blank">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    @endif
                    @if($application->passport_arrival)
                    <div class="d-flex gap-1">
                        {{ __('doc_arrival') }}:
                        <div>
                            <a class="text-decoration-none" href="{{ '/storage/' . $application->passport_arrival }}" download>
                                <i class="fas fa-download"></i>
                            </a>
                            <a class="text-decoration-none" href="{{ '/storage/' . $application->passport_arrival }}" target="_blank">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex align-items-center flex-wrap justify-content-between">
        <small class="text-muted my-1">
            {{ __('total') }} <span class="fw-bold">{{ $applications->total() }}</span>
        </small>
        <div class="my-1">
            {!! $applications->links() !!}
        </div>
    </div>
</div>