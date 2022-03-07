<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Models\Application;
use Carbon\Carbon;

class ApplicationExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize, WithStyles
{
    use Exportable;

    public $selectedRecords = [];

    public function __construct($selectedRecords) {
        $this->selectedRecords = $selectedRecords;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true
                ]
            ],
            'H' => [
                'alignment' => [
                    'wrapText' => true
                ]
            ],
        ];
    }

    public function headings(): array {
        return [
            'Full name',
            'Contact info',
            'Arrive date',
            'Departure date',
            'Current location',
            'Additional info',
            'Registration date',
            'Uploaded documents'
        ];
    }

    public function map($application): array {
        return [
            $application->full_name,
            $application->contact_info,
            $application->arrive,
            $application->departure,
            $application->current_location,
            $application->comment,
            Carbon::parse($application->created_at)->format('H:i (d M, Y)'),
            config('app.url') . '/storage/' . $application->passport . "\n" . config('app.url') . '/storage/' . $application->passport_arrival
        ];
    }

    public function query()
    {
        return Application::orderBy('id', 'desc')
            ->whereIn('id', $this->selectedRecords);
    }
}
