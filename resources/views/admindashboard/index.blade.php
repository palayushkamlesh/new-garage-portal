@extends('layouts.master')

@section('styles')
<!-- Add any additional styles if needed -->
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Stats Cards -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Customers</h5>
                    <p class="card-text">{{ $totalCustomers }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Monthly Customers</h5>
                    <p class="card-text">{{ $monthlyCustomers }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Cars</h5>
                    <p class="card-text">{{ $totalCars }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- More Stats Cards -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Employees</h5>
                    <p class="card-text">{{ $totalEmployees }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Active Parts</h5>
                    <p class="card-text">{{ $activeParts }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Inactive Parts</h5>
                    <p class="card-text">{{ $inactiveParts }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Job Status Chart
                </div>
                <div class="card-body">
                    <canvas id="jobStatusChart" style="max-width: 100%; height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Monthly Job Creation
            </div>
            <div class="card-body">
                <canvas id="monthlyJobChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Job Distribution by Employee
            </div>
            <div class="card-body">
                <canvas id="jobEmployeeChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- Part Usage Overview Chart -->
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Job Parts Usage Overview</h5>
            </div>
            <div class="card-body">
                <canvas id="jobPartsChart" width="100%" height="60"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Top 5 Most Used Parts</h5>
        <canvas id="topPartsChart" height="100"></canvas>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Monthly Revenue Trend</h5>
        <canvas id="monthlyRevenueChart" height="100"></canvas>
    </div>
</div>




@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('jobStatusChart').getContext('2d');
    const jobStatusChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode(array_keys($jobStatusData->toArray())) !!},
            datasets: [{
                label: 'Job Status Count',
                data: {!! json_encode(array_values($jobStatusData->toArray())) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(255, 206, 86, 0.7)'
                ],
                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Job Status Overview'
                }
            }
        }
    });
</script>
<script>
    const monthlyJobCtx = document.getElementById('monthlyJobChart').getContext('2d');
    new Chart(monthlyJobCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($monthlyJobData->toArray())) !!},
            datasets: [{
                label: 'Jobs Created',
                data: {!! json_encode(array_values($monthlyJobData->toArray())) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Jobs Created Per Month'
                },
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Jobs'
                    }
                }
            }
        }
    });
</script>
<script>
    const jobEmpCtx = document.getElementById('jobEmployeeChart').getContext('2d');
    new Chart(jobEmpCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode(array_keys($jobPerEmployee->toArray())) !!},
            datasets: [{
                label: 'Jobs Assigned',
                data: {!! json_encode(array_values($jobPerEmployee->toArray())) !!},
                backgroundColor: [
                    '#FF6384', '#36A2EB', '#FFCE56', '#8BC34A', '#FF9800', '#9C27B0'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Jobs Assigned to Employees'
                },
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctxJobParts = document.getElementById('jobPartsChart').getContext('2d');
    const jobPartsChart = new Chart(ctxJobParts, {
        type: 'bar',
        data: {
            labels: ['Active Parts', 'Inactive Parts', 'Used in Completed Jobs', 'Used in In-Progress Jobs'],
            datasets: [{
                label: 'Count',
                data: [
                    {{ $activePartsCount }},
                    {{ $inactivePartsCount }},
                    {{ $partsInCompletedJobs }},
                    {{ $partsInInProgressJobs }}
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)'
                ],
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Job Part Usage by Status and Activity'
                },
                legend: {
                    display: false
                }
            }
        }
    });
</script>
<script>
    const ctxParts = document.getElementById('topPartsChart').getContext('2d');
    const topPartsChart = new Chart(ctxParts, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($topParts->toArray())) !!},
            datasets: [{
                label: 'Total Quantity Used',
                data: {!! json_encode(array_values($topParts->toArray())) !!},
                backgroundColor: 'rgba(255, 159, 64, 0.7)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Top 5 Most Used Parts in Jobs'
                }
            }
        }
    });
</script>
<script>
    const ctxRevenue = document.getElementById('monthlyRevenueChart').getContext('2d');
    const monthlyRevenueChart = new Chart(ctxRevenue, {
        type: 'line',
        data: {
            labels: {!! json_encode(array_keys($monthlyRevenue->toArray())) !!},
            datasets: [{
                label: 'Revenue (₹)',
                data: {!! json_encode(array_values($monthlyRevenue->toArray())) !!},
                fill: true,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Monthly Revenue Trend'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Revenue (₹)'
                    }
                }
            }
        }
    });
</script>


@endsection
