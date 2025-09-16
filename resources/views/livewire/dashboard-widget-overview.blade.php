<div>
    <div class="grid grid-cols-1 md:grid-col-2 lg:grid-cols-4 gap-4">
        <x-stats-card title="Total Students" tooltip="Showing number of all active Students" value="{{ $totalStudents }}" percentage="" />
        @if (auth()->user()->role === 'admin')
            <x-stats-card title="Total Users" tooltip="Showing number of all active Users" value="{{ $totalUsers }}" percentage="" />
            <x-stats-card title="Total Teachers" tooltip="Showing number of all active Teachers" value="{{ $totalTeachers }}" percentage="" />
        @endif
        <x-stats-card title="Attendance Today" tooltip="" value="{{ $attendanceToday }}" percentage="" />
        <x-stats-card title="Present Today" tooltip="" value="{{ $presentToday }}" percentage="" />
        <x-stats-card title="Absent Today" tooltip="" value="{{ $absentToday }}" percentage="" />
        <x-stats-card title="Weekly Attendance Rate" tooltip="" value="{{ $weeklyAttendanceRate }}" percentage="{{ $weeklyAttendanceRate }}" />
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Tableau de présence mensuelles -->
    <div class="mt-8 bg-white p-4 rounded-lg shadow-md">
        <h3 class="text-xl font-bold mb-4">Monthly Attendance Trends</h3>
        <canvas id="monthlyAttendanceChart" class="w-full h-64"></canvas>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('monthlyAttendanceChart').getContext('2d');
            var chartData = @json($monthlyTrends);
            var labels = chartData.map(data => data.month );
            var values = chartData.map(data => data.count);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Attendance Count',
                        data: values,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2,
                        // tension: 0.3, // Courbure de la ligne [0 pour des lignes droites, 0.4 pour des courbes(rend la ligne ligne lisse)
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            beginAtZero: true,
                            suggestedMax: Math.max(...values) + 8
                        }
                    }
                }
            })
        });
    </script>
</div>