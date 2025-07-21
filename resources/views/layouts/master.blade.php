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
        <div class="nav-item @if(request()->route()->getName() == 'dashboard') active @endif">
            <i class="fas fa-passport"></i>
            <a href="{{route('dashboard')}}">Dashboard</a>
        </div>
        <div class="nav-item @if(request()->route()->getName() == 'task.index') active @endif">
            <i class="fas fa-tasks"></i>
            <a href="{{route('task.index')}}">My Task</a>
        </div>
        <div class="nav-item @if(request()->route()->getName() == 'category.index') active @endif">
            <i class="fas fa-layer-group"></i>

            <a href="{{route('category.index')}}">Task Categories</a>
        </div>
        <div class="nav-item @if(request()->route()->getName() == 'Setting') active @endif">
            <i class="fas fa-cog"></i>

            <a href="{{route('Setting')}}">Settings</a>
        </div>
        <div class="nav-item @if(request()->route()->getName() == 'Help') active @endif">
            <i class="fas fa-question-circle"></i>

            <a href="{{route('Help')}}">Help</a>
        </div>
    </div>


    @yield('content')

</div>

</body>
</html>
