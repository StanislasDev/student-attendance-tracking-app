<?php

namespace App\Livewire\Teacher\Staudents;

use App\Models\Grade;
use App\Models\Student;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditStudent extends Component
{
    public $grades = []; // En supposant que vous récupériez les grades de la base de données dans mount() ou ailleurs
    public $first_name = '';
    public $last_name = '';
    public $age = '';
    public $grade = '';
    public $student_details = '';

    public function mount($id)
    {
        // dd($id);
        $this->student_details = Student::find($id);

        // Récupération des informations dans le formulaire
        $this->fill([
            'first_name' => $this->student_details->first_name,
            'last_name' => $this->student_details->last_name,
            'age' => $this->student_details->age,
            'grade' => $this->student_details->grade_id,
        ]);
        // Récupération des grades depuis la base de données
        $this->grades = Grade::all();
    }

    public function update()
    {
        // Logique de validation des données
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'grade' => 'required|exists:grades,id',
        ]);
        Student::find($this->student_details->id)->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'grade_id' => $this->grade,
        ]);

        // Optionnel: Ajouter une notification de succès et une redirection
        Toaster::success('Student updated successfully!');
        return redirect()->route('student.index');
    }
    public function render()
    {
        return view('livewire.teacher.staudents.edit-student');
    }
}
