<?php

namespace App\Http\Livewire;

use App\Models\Application;
use Livewire\Component;
use Livewire\WithPagination;

class ApplicationList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 10;

    public $search = '';

    public function render()
    {
        return view('livewire.application-list', [
            'applications' => Application::orderBy('id', 'desc')
                ->where('full_name', 'LIKE', "%$this->search%")
                ->paginate($this->paginate)
        ]);
    }
}
