<?php

namespace App\Livewire\Teacher\Teachers;

use App\Models\User;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class AddTeacher extends Component
{
    public $name = '';
    public $email = '' ;
    public $password = '' ;
    public $password_confirmation = '' ;

    public function save()
    {
        // Logique de validation des données
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Logique pour enregistrer l'enseignant dans la base de données
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => 'teacher',
        ]);

        // Réinitialiser les champs du formulaire après la soumission
        $this->reset();

        // Optionnel: Ajouter une notification de succès et une redirection
        Toaster::success('Teacher added successfully!');
        return redirect()->route('teacher.index');
    }
    public function render()
    {
        return view('livewire.teacher.teachers.add-teacher');
    }
}
