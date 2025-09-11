<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AutomatedAttendanceReportExport implements FromCollection, WithMapping, WithHeadings
{
    protected $startDate, $endDate;
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Attendance::with(['student', 'grade'])
            ->whereDate('date', '>=', $this->startDate)
            ->whereDate('date', '<=', $this->endDate)
            ->get();

            // dd($this->startDate, $this->endDate, $data->toArray());
    }

    public function map($row): array
    {
        return [
            $row->student ? $row->student->first_name . ' ' . $row->student->last_name : 'N/A',
            // $row->grade ? $row->grade->name : 'N/A', // si tu veux aussi la classe
            $row->date,
            ucfirst($row->status),
            $row->reason ?? 'N/A'
        ];
    }


    public function headings(): array
    {
        return [
            'Student Name',
            // 'Grade',
            'Date',
            'Status',
            'Reason'
        ];
    }
}
