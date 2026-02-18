@once
    @push('styles')
        <title>Dashboard</title>
    @endpush
@endonce

<div class="container">

    <div class="sidebar">
        <div class="branding">
            <h1>to do list</h1>
            <small>www.todolist.com</small>
        </div>
        <div class="nav-item @if($this->view == 'dashboard') active @endif"  wire:click="setview('dashboard')">
            <i class="fas fa-passport"></i>
                Dashboard
        </div>
        <div class="nav-item @if($this->view == 'myTasks') active @endif" wire:click="setview('myTasks')">
            <i class="fas fa-tasks"></i>
                My Task
        </div>
        <div class="nav-item @if($this->view == 'myCats') active @endif" wire:click="setview('myCats')">
            <i class="fas fa-layer-group"></i>
                Task Categories
        </div>


    </div>


    @if($this->view == 'dashboard')
        @livewire('dashboard')
    @elseif($this->view == 'myTasks')
        @livewire('myTasks.index')
    @elseif($this->view == 'myCats')
        @livewire('myCats')
    @endif


</div>
