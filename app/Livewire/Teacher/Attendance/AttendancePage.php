<?php

namespace App\Livewire\Teacher\Attendance;

use Carbon\Carbon;
use App\Models\Grade;
use App\Models\Student;
use Livewire\Component;
use App\Models\Attendance;
use Masmerise\Toaster\Toaster;
use App\Exports\AttendanceExport;
use Maatwebsite\Excel\Facades\Excel;

class AttendancePage extends Component
{
    public $year, $month, $grade;
    public $students = [];
    public $attendance = [];
    public $grades = [];

    public function mount()
    {
        $this->grades = Grade::all();
    }

    public function fetchStudents()
{
        if ($this->year && $this->month && $this->grade) {
            $this->students = Student::where('grade_id', $this->grade)->get();

            $today = Carbon::today()->format('Y-m-d');

            // Initialiser tous les étudiants présents aujourd'hui si non encore enregistrés
            foreach ($this->students as $student) {
                Attendance::firstOrCreate(
                    [
                        'student_id' => $student->id,
                        'date' => $today,
                    ],
                    [
                        'status' => 'present',
                        'grade_id' => $this->grade,
                    ]
                );
            }

            // Charger les présences pour le mois choisi
            foreach ($this->students as $student) {
                foreach (range(1, Carbon::create($this->year, $this->month)->daysInMonth) as $day) {
                    $date = Carbon::create($this->year, $this->month, $day)->format('Y-m-d');
                    $this->attendance[$student->id][$day] = Attendance::where('student_id', $student->id)
                        ->whereDate('date', $date)
                        ->value('status') ?? 'present';
                        // dd($this->attendance[$student->id][$day]);
                }
            }
        }
    }


    public function updateAttendance($studentId, $day, $status)
    {
        $date = Carbon::create($this->year, $this->month, $day)->format('Y-m-d');

        $record = Attendance::updateOrCreate(
            [
                'student_id' => $studentId,
                'date' => $date,
            ],
            [
                'status' => $status,
                'grade_id' => $this->grade,
            ]
        );

        // Met à jour l’état local pour refléter immédiatement la modification
        $this->attendance[$studentId][$day] = $record->status;

        // Rafraîchir les données du tableau (utile pour le jour courant)
        $this->fetchStudents();

        // // Optionnel: Ajouter une notification de succès
        Toaster::success("Attendance updated for student ID: $studentId on $date → $status");
    }

    public function markAll($day, $status)
    {
        // Implémentation de la fonction pour marquer tous les étudiants avec un statut spécifique
        foreach ($this->students as $student) {
            $this->updateAttendance($student->id, $day, $status);
        }
    }

    public function exportToExcel()
    {
        // Implémentation de l'exportation vers Excel
        Toaster::info('Export to Excel functionality is not implemented yet.');
        return Excel::download(new AttendanceExport($this->year, $this->month, $this->grade), 'attendance.xlsx');
    }

    public function render()
    {
        $this->fetchStudents();        // Pour s'assurer que les étudiants sont toujours chargés lors du rendu
        return view('livewire.teacher.attendance.attendance-page', [
            'dayInMonth' => $this->month ? Carbon::create($this->year, $this->month)->daysInMonth : 0,
        ]);
    }
}
