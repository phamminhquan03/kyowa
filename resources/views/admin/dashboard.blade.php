@extends('admin.layout')

@section('content')

<div class="main-card">

    {{-- HEADER --}}
    <div class="dashboard-header mb-4">
        <div class="dashboard-title">
            <h1 class="fw-bold">Dashboard</h1>
            <p class="text-muted">Thống kê tổng quan hệ thống quản trị</p>
        </div>
    </div>

    {{-- KPI CARDS --}}
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center rounded-3">
                <h6 class="text-muted">Liên hệ</h6>
                <h2 class="fw-bold text-primary">{{ $contacts }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center rounded-3">
                <h6 class="text-muted">Dịch vụ</h6>
                <h2 class="fw-bold text-success">{{ $services }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center rounded-3">
                <h6 class="text-muted">Tin tức</h6>
                <h2 class="fw-bold text-danger">{{ $news }}</h2>
            </div>
        </div>

    </div>

    {{-- CHART --}}
    <div class="card border-0 shadow-sm p-4 rounded-3">

        <h5 class="mb-4 fw-bold">Biểu đồ thống kê hệ thống</h5>

        <div style="height: 380px;">
            <canvas id="dashboardChart"></canvas>
        </div>

    </div>

</div>

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const ctx = document.getElementById('dashboardChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Liên hệ', 'Dịch vụ', 'Tin tức'],
            datasets: [{
                label: 'Số lượng',
                data: [
                    {{ $contacts ?? 0 }},
                    {{ $services ?? 0 }},
                    {{ $news ?? 0 }}
                ],
                backgroundColor: [
                    '#0d6efd',
                    '#198754',
                    '#dc3545'
                ],
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

});
</script>

@endsection