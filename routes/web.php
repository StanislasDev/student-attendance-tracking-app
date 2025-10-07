<?php

use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Teacher\Grades\AddGrade;
use App\Livewire\Teacher\Grades\EditGrade;
use App\Livewire\Teacher\Grades\GradeList;
use App\Livewire\Teacher\Staudents\AddStudent;
use App\Livewire\Teacher\Staudents\EditStudent;
use App\Livewire\Teacher\Staudents\StudentList;
use App\Livewire\Teacher\Attendance\AttendancePage;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    // Attendances
    Route::prefix('attendance')->group(function(){
        Route::get('/', AttendancePage::class)->name('attendance.page');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
    // students
    Route::get('/student-list', StudentList::class)->name('student.index');
    Route::get('/create/student', AddStudent::class)->name('student.create');
    Route::get('/edit/student/{id}', EditStudent::class)->name('student.edit');

    // Grades
    Route::prefix('grade')->group(function(){
        Route::get('/list', GradeList::class)->name('grade.index');
        Route::get('/create', AddGrade::class)->name('grade.create');
        Route::get('/edit/{id}', EditGrade::class)->name('grade.edit');
    });

});

require __DIR__.'/auth.php';
