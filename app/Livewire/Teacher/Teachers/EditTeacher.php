<?php

namespace App\Livewire\Teacher\Teachers;

use App\Models\User;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditTeacher extends Component
{
    public $name = '';
    public $email = '' ;
    public $password = '' ;
    public $password_confirmation = '' ;
    public $teacher_details = '';

    public function mount($id)
    {
        $this->teacher_details = User::find($id);

        // Récupération des informations de l'enseignant dans le formulaire
        $this->fill([
            'name' => $this->teacher_details->name,
            'email' => $this->teacher_details->email,
            'password' => $this->teacher_details->password,
            'password_confirmation' => $this->teacher_details->password_confirmation,
        ]);
    }

    public function update()
    {
        // Logique de validation des données
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->teacher_details->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if (!empty($this->password)) {
            $data['password'] = bcrypt($this->password);
        }

        User::find($this->teacher_details->id)->update($data);

        // Optionnel: Ajouter une notification de succès et une redirection
        Toaster::success('Teacher updated successfully!');
        return redirect()->route('teacher.index');
    }
    public function render()
    {
        return view('livewire.teacher.teachers.edit-teacher');
    }
}
