<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\SendAttendanceReportMail;
use App\Exports\AutomatedAttendanceReportExport;

class SendAttendanceReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:send-report {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send dailly or weekly attendance report via email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Logique pour envoyer le rapport de présence par e-mail en fonction du type (quotidien ou hebdomadaire)  <!--Par exemple, récupérer les données de présence, générer un rapport et l'envoyer -->
        $type = $this->argument('type');
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        if ($type == 'daily') {
            $startDate = $yesterday;
            $endDate = $today;
        } elseif ($type == 'weekly') {
            $startDate = $today->copy()->startOfWeek();
            $endDate = $today->copy()->endOfWeek();
        } else {
            $this->error('Invalid type of report. Use "daily" or "weekly".');
            return;
        }

        // Générer le fichier Excel
        $fileName = "attendance_report_{$type}.xlsx";
        $filePath = "atendance_reports/{$fileName}";

        Excel::store(new AutomatedAttendanceReportExport($startDate, $endDate), $filePath, 'public');

        // Envoyer le mail avec la pièce jointe
        Mail::to('simostanley91@gmail.com')->send(new SendAttendanceReportMail($type, storage_path("app/public/{$filePath}")));

        $this->info("{$type} attendance report has been sent successfully!");
    }
}
