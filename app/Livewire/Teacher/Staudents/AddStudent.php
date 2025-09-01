<?php

namespace App\Livewire\Teacher\Staudents;

use App\Models\Grade;
use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Title;
use Masmerise\Toaster\Toaster;
#[Title('Student attendance | Add Student')]

class AddStudent extends Component
{
    public $grades = []; // En supposant que vous récupériez les grades de la base de données dans mount() ou ailleurs
    public $first_name = '';
    public $last_name = '';
    public $age = '';
    public $grade = '';
    public function mount()
    {
        // Récupération des grades depuis la base de données
        $this->grades = Grade::all();
    }

    public function save()
    {
        // Logique de validation des données
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'grade' => 'required|exists:grades,id',
        ]);

        // Logique pour enregistrer l'étudiant dans la base de données
        Student::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'grade_id' => $this->grade,
        ]);

        // Réinitialiser les champs du formulaire après la soumission
        $this->reset();

        // Optionnel: Ajouter une notification de succès et une redirection
        Toaster::success('Student added successfully!');
        return redirect()->route('student.index');
    }
    public function render()
    {
        return view('livewire.teacher.staudents.add-student');
    }
}
