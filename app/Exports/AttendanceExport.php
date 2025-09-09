<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AttendanceExport implements FromCollection, WithMapping, WithHeadings
{
    protected $year, $month, $grade;
    public function __construct($year, $month, $grade)
    {
        $this->year = $year;
        $this->month = $month;
        $this->grade = $grade;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Attendance::whereYear('date', $this->year)
            ->whereMonth('date', $this->month)
            ->whereHas('student', function($query) {
                $query->where('grade_id', $this->grade);
            })
            ->get();
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
