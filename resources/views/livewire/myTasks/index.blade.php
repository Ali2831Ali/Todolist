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

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="action-btn edit-btn" wire:click="ShowEdit">ویرایش

                            </button>
                            <button class="action-btn delete-btn"
                                    wire:click="ShowDelete">حذف
                            </button>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

            @if($showEdit)
                <livewire:myTasks.edit />
            @endif


            @if($showDelete)
                <livewire:myTasks.Delete />
            @endif


        </div>


    </div>

</div>

