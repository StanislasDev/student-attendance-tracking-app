<?php

namespace App\Livewire\Teacher\Grades;

use App\Models\Grade;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class AddGrade extends Component
{
    public $name;

    public function save()
    {
        // Logique de validation des données
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        // Logique pour enregistrer le grade dans la base de données
        Grade::create([
            'name' => $this->name,
        ]);

        // Réinitialiser les champs du formulaire après la soumission
        $this->reset();

        // Optionnel: Ajouter une notification de succès et une redirection
        Toaster::success('Grade added successfully!');
        return redirect()->route('grade.index');
    }
    public function render()
    {
        return view('livewire.teacher.grades.add-grade');
    }
}
