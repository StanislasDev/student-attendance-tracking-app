<div>
    <div class="grid grid-cols-1 md:grid-col-2 lg:grid-cols-4 gap-4">
        <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
            <h3 class="text-xl font-bold">Total Students</h3>
            <p class="text-3xl">{{ $totalStudents }}</p>
        </div>
        @if (auth()->user()->role === 'admin')
            <div class="bg-indigo-800 text-white p-4 rounded-lg shadow-md">
            <h3 class="text-xl font-bold">Total Users</h3>
            <p class="text-3xl">{{ $totalUsers }}</p>
        </div>
        <div class="bg-orange-500 text-white p-4 rounded-lg shadow-md">
            <h3 class="text-xl font-bold">Total Teachers</h3>
            <p class="text-3xl">{{ $totalTeachers }}</p>
        </div>
        @endif
        <div class="bg-green-500 text-white p-4 rounded-lg shadow-md">
            <h3 class="text-xl font-bold">Present Today</h3>
            <p class="text-3xl">{{ $presentToday }}</p>
        </div>
        <div class="bg-red-500 text-white p-4 rounded-lg shadow-md">
            <h3 class="text-xl font-bold">Absent Today</h3>
            <p class="text-3xl">{{ $absentToday }}</p>
        </div>
        <div class="bg-purple-500 text-white p-4 rounded-lg shadow-md">
            <h3 class="text-xl font-bold">Weekly Attendance Rate</h3>
            <p class="text-3xl">{{ $weeklyAttendanceRate }}%</p>
        </div>
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