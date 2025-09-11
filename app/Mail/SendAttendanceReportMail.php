<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendAttendanceReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $period;
    public $filePath;

    /**
     * Create a new message instance.
     */
    public function __construct($period, $filePath)
    {
        $this->period = $period;
        $this->filePath = $filePath;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {

        return $this->subject("Attendance Report ({$this->period})")
                ->markdown('mail.reports.attendance-report')
                ->with([
                    'period' => $this->period,
                    // URL pour le bouton de téléchargement dans le mail
                    'downloadUrl' => asset("storage/atendance_reports/attendance_report_{$this->period}.xlsx")
                ])
                ->attach(storage_path("app/public/atendance_reports/attendance_report_{$this->period}.xlsx"));  //Attache le fichier Excel
        //      ->attach(asset('storage/' . $this->filePath));
    }
}