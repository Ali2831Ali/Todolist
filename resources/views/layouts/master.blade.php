<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('head')
    <title>head</title>
    <link rel="stylesheet" href="{{asset('app/master/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
            Dashboard
        </div>
        <div class="nav-item" data-target="#mytaskSection">
            <i class="fas fa-tasks"></i>
            My Task
        </div>
        <div class="nav-item" data-target="#CategorySection">
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
</div>

@yield('content')

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
