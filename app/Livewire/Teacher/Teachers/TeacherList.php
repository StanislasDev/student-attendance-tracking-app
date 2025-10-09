<?php

namespace App\Livewire\Teacher\Teachers;

use App\Models\User;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class TeacherList extends Component
{
    public $totalTeachers;

    public function mount()
    {
        $this->totalTeachers = User::where('role', 'teacher')->count();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        Toaster::success('Teacher deleted successfully!');
        return redirect()->route('teacher.index');
    }
    public function render()
    {
        return view('livewire.teacher.teachers.teacher-list', [
            'teachers' => User::where('role', 'teacher')->get()
        ]);
    }
}
