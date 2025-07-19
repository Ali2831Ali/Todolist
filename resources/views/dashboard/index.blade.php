@extends('layouts.master')

@section('head')
    <title>Dashboard</title>
@endsection

@section('content')
<div class="content-section" id="dashboardSection">
    <div class="main-content">
        <div class="welcome-box">
            <div>
                <h2>سلام علی ربانیان خوش اومدی</h2>
                <p class="task-meta">شما 3 تسک انجام نشده دارید</p>
            </div>
            <div class="todo-card">
                <div>لیست کارهای</div>
                <div>امروز</div>
            </div>
        </div>

        <!-- Task Cards -->
        <div class="task-card">
            <div class="task-header">
                <h3>تولد دوست دخترم</h3>
                <span class="task-meta"> پنج بعد از ظهر</span>
            </div>
            <p>خرید کادو برای دوست دخترم که دوستش .</p>
        </div>

        <div class="status-container">
            <div class="status-item">
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 84%"></div>
                </div>
                <div class="status-label"  data-status="completed">تکمیل شده</div>
            </div>
            <div class="status-item">
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 46%"></div>
                </div>
                <div class="status-label" data-status="progress">در حال انجام</div>
            </div>
            <div class="status-item">
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 13%"></div>
                </div>
                <div class="status-label" data-status="not-started"> شروع نشده</div>
            </div>
        </div>


        <div class="task-card">
            <div class="task-header">
                <h3>تسک انجام شده</h3>
                <span class="task-meta">✓ انجام شد</span>
            </div>
            <p>قدم زدن با سگم توی پارک</p>
        </div>
    </div>

</div>
@endsection
