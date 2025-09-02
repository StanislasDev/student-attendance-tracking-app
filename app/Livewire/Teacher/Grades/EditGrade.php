<?php

namespace App\Livewire\Teacher\Grades;

use App\Models\Grade;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditGrade extends Component
{
    public $name;
    public $grade_details;
    public function mount($id)
    {
        // dd($id);
        $this->grade_details = Grade::find($id);

        // Récupération des informations dans le formulaire
        $this->fill([
            'name' => $this->grade_details->name,
        ]);
    }

    public function update()
    {
        // Logique de validation des données
        $this->validate([
            'name' => 'required|string|max:255',
        ]);
        Grade::find($this->grade_details->id)->update([
            'name' => $this->name,
        ]);

        // Optionnel: Ajouter une notification de succès et une redirection
        Toaster::success('grade updated successfully!');
        return redirect()->route('grade.index');
    }
    public function render()
    {
        return view('livewire.teacher.grades.edit-grade');
    }
}
