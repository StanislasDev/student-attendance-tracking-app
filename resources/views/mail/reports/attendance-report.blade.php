<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Attendance Report</title>
    </head>

    <body style="font-family: Arial, sans-serif; background-color: #f9fafb; margin: 0; padding: 20px;">
        <table align="center" width="600" cellpadding="0" cellspacing="0"
            style="background: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <tr>
                <td align="center">
                    <h2 style="color: #111827; font-size: 22px; margin-bottom: 20px;">
                        Attendance report : {{ $period }}
                    </h2>
                    <p style="font-size: 16px; color: #374151; margin: 10px 0;">
                        Hello,
                    </p>
                    <p style="font-size: 16px; color: #374151; margin: 10px 0;">
                        Attached is the attendance report for <b>{{ $period }}</b>.
                    </p>
                    <p style="margin: 25px 0;">
                        <a href="{{ $downloadUrl }}" target="_blank" style="background-color: #4F46E5; color: #ffffff; 
                            padding: 12px 24px; border-radius: 8px; 
                            font-size: 16px; text-decoration: none;
                            display: inline-block; font-weight: bold;">
                            Download Report
                        </a>
                    </p>
                    <p style="font-size: 14px; color: #6b7280; margin-top: 20px;">
                        Thanks,<br>
                        <strong>{{ config('app.name') }}</strong>
                    </p>
                </td>
            </tr>
        </table>
    </body>

</html>



{{-- @component('mail::message')
# Attendance report : {{ $period }}

Hello,

Attached is the attendance report for **{{ $period }}**.

@component('mail::button', ['url' => $downloadUrl])
Download Report
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}