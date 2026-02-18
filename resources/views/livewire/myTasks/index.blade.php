<div class="content-section" id="mytaskSection">
    <div class="main-content">
        <div class="myTask-box">
            <button id="addTaskBtn" class="btn" wire:click="ShowCreate">➕ افزودن تسک جدید</button>

            @if($showCreate)
                <livewire:myTasks.create />
            @endif


            <div class="row">
                <table class="task-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>اسم تسک</th>
                        <th>توضیحات</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Tasks as $Task)
                    <tr>
                        <td>{{$Task['id']}}</td>
                        <td>{{$Task['name']}}</td>
                        <td>{{$Task['description']}}</td>
                        <td>
                            <button class="action-btn edit-btn" wire:click="ShowEdit({{$Task['id']}},'{{$Task['name']}}','{{$Task['description']}}')">ویرایش
                            </button>
                            <button class="action-btn delete-btn"
                                    wire:click="ShowDelete({{$Task['id']}})">حذف
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            @if($showEdit)
                <livewire:myTasks.Edit :taskId="$editTaskId" :name="$editTaskName" :description="$editTaskDesc" />
            @endif


            @if($showDelete)
                <livewire:myTasks.Delete  :deleteId="$DeleteTaskId"/>
            @endif


        </div>


    </div>

</div>

