<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sandar Quarry Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        :root {
            --primary-color: #2A5C8B;
            --secondary-color: #4CAF50;
            --background: #f5f6fa;
            --card-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            background: var(--background);
            padding: 2rem;
        }

        .container {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 2rem;
            max-width: 1440px;
            margin: 0 auto;
        }

        /* Sidebar Styles */
        .sidebar {
            background: white;
            padding: 2rem 1.5rem;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            position: sticky;
            top: 20px;
            height: fit-content;
        }

        .branding {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #eee;
        }

        .branding h1 {
            color: var(--primary-color);
            font-size: 1.8rem;
            margin-bottom: 0.25rem;
        }

        .branding small {
            color: #666;
            font-size: 0.9rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.8rem 1rem;
            margin-bottom: 0.5rem;
            border-radius: 8px;
            color: #555;
            transition: all 0.2s;
            cursor: pointer;
        }

        .nav-item:hover {
            background: #f5f8ff;
            color: var(--primary-color);
        }

        /* Main Content */
        .main-content {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .welcome-box {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .todo-card {
            background: var(--primary-color);
            color: white;
            padding: 1rem 2rem;
            border-radius: 8px;
            text-align: center;
        }

        .todo-card div:first-child {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .todo-card div:last-child {
            font-size: 1.4rem;
            font-weight: bold;
            margin-top: 0.5rem;
        }

        .task-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
        }

        .task-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .task-meta {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }


        .task-table td {
            padding: 1rem;
            border-top: 1px solid #eee;
        }

        .task-table td:last-child {
            text-align: right;
            color: var(--primary-color);
            font-weight: 500;
        }

        .status-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .status-item {
            text-align: center;
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: var(--card-shadow);
        }

        .progress-bar {
            height: 8px;
            background: #eee;
            border-radius: 4px;
            margin: 1rem 0;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--secondary-color);
            border-radius: 4px;
            transition: width 0.5s ease;
        }

        .status-label {
            font-size: 0.9rem;
            color: #666;
            margin-top: 0.5rem;
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
                padding: 1rem;
            }


        }
        .nav-item.active {
            background: #f5f8ff;
            color: var(--primary-color);
            font-weight: 600;
        }

        .task-card.expanded {
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .content-section {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="branding">
            <h1>to do list</h1>
            <small>www.todolist.com</small>
        </div>
        <div class="nav-item" data-target="#dashboardSection">
            <i class="fas fa-passport"></i>
            Visa Task
        </div>
        <div class="nav-item" data-target="#mytaskSection">
            <i class="fas fa-tasks"></i>
            My Task
        </div>
        <div class="nav-item" data-target="#taskCategorySection">
            <i class="fas fa-layer-group"></i>
            Task Categories
        </div>
        <div class="nav-item" data-target="#settingsSection">
            <i class="fas fa-cog"></i>
            Settings
        </div>
        <div class="nav-item" data-target="#helpSection">
            <i class="fas fa-question-circle"></i>
            Help
        </div>
    </div>

    <!-- Main Content -->
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
                </table>
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
</div>

<script>
    $(document).ready(function() {
        // Sidebar Navigation
        const $navItems = $('.nav-item');
        let $activeNavItem = $navItems.first();

        function setActiveNavItem($item) {
            $activeNavItem.removeClass('active');
            $item.addClass('active');
            $activeNavItem = $item;

            // Hide all content sections
            $('.content-section').hide();
            // Show target section
            $($item.data('target')).show();
        }

        $navItems.on('click', function() {
            setActiveNavItem($(this));
        });

        // Task Interactions
        $('.task-card').on('click', function(e) {
            if (!$(e.target).closest('.task-table').length) {
                $(this).toggleClass('expanded');
            }
        });

        // Status Filter
        $('.status-label').on('click', function() {
            const status = $(this).data('status');
            $('.task-card').each(function() {
                $(this).toggle($(this).data('status') === status);
            });
        });

        // Modal Handling
        $('[data-action="back"]').on('click', function() {
            $('#actionModal').modal('show');
        });

        // Initialize
        setActiveNavItem($activeNavItem);
    });
</script>
</body>
</html>
