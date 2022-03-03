<?php

namespace App\Http\Livewire;

use App\Exports\ApplicationExport;
use App\Models\Application;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ApplicationList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 10;

    public $search = '';

    public $selectedRecords = [];

    public function render()
    {
        return view('livewire.application-list', [
            'applications' => Application::orderBy('id', 'desc')
                ->where('full_name', 'LIKE', "%$this->search%")
                ->paginate($this->paginate)
        ]);
    }

    public function export() {
        return Excel::download(new ApplicationExport($this->selectedRecords), 'applications-' . Carbon::parse(now())->format('d-m-y-H-i-s') . '.xlsx');
    }
}
