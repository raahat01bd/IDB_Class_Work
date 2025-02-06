@extends('master')

@section('content')

<div class="dashboard-container">
    <h2 class="dashboard-title">Dashboard Overview</h2>

    <div class="dashboard-stats">
        <div class="stat-card">
            <h3>Total Flights</h3>
            <p>120</p>
        </div>
        <div class="stat-card">
            <h3>Total Tickets</h3>
            <p>1500</p>
        </div>
        <div class="stat-card">
            <h3>Total Airlines</h3>
            <p>15</p>
        </div>
        <div class="stat-card">
            <h3>Total Passengers</h3>
            <p>3000</p>
        </div>
        <div class="stat-card">
            <h3>Available Seats</h3>
            <p>2000</p>
        </div>
        <div class="stat-card">
            <h3>Total Profit</h3>
            <p>$120,000</p>
        </div>
        <div class="stat-card">
            <h3>Total Sales Today</h3>
            <p>$5,000</p>
        </div>
        <div class="stat-card">
            <h3>New Ticket Purchases</h3>
            <p>25</p>
        </div>
    </div>

    <div class="chart-container">
        <h3>Sales Today (Bar Chart)</h3>
        <canvas id="salesChart"></canvas>
    </div>
</div>

@endsection

@section('styles')
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f7f9fc;
        margin: 0;
        padding: 20px;
    }

    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .dashboard-title {
        text-align: center;
        font-size: 2.5em;
        color: #2c3e50;
        margin-bottom: 40px;
    }

    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .stat-card {
        background-color: #ffffff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    .stat-card h3 {
        font-size: 1.6em;
        color: #34495e;
        margin-bottom: 15px;
    }

    .stat-card p {
        font-size: 2em;
        color: #2ecc71;
        font-weight: bold;
    }

    .chart-container {
        margin-top: 50px;
    }

    .chart-container h3 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 1.8em;
    }

</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Morning', 'Afternoon', 'Evening', 'Night'],
            datasets: [{
                label: 'Sales Today ($)',
                data: [1200, 1800, 1400, 600], // Sample sales data for each time of the day
                backgroundColor: '#3498db',
                borderColor: '#2980b9',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 500
                    }
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endsection
