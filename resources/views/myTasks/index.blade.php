@extends('layouts.master')

@section('head')
    <title>myCats</title>
    <link rel="stylesheet" href="{{asset('app/myTasks/taskStyle.css')}}">
@endsection

@section('content')
<div class="content-section" id="mytaskSection">
    <div class="main-content">
        <div class="myTask-box">
            <button id="addTaskBtn" class="btn">➕ افزودن تسک جدید</button>

            <!-- مدال افزودن تسک -->
            <div class="modal-overlay" id="addModal">
                <div class="modal-content">
                    <h3>🎯 افزودن تسک جدید</h3>
                    <input type="text" class="modal-input" id="taskTitle" placeholder="عنوان تسک">
                    <textarea class="modal-input" id="taskDescription" placeholder="توضیحات"></textarea>
                    <div class="action-buttons">
                        <button class="btn confirm-btn" id="saveTask">💾 ذخیره</button>
                        <button class="btn cancel-btn" id="cancelAdd">❌ لغو</button>
                    </div>
                </div>
            </div>
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
                    <?php
                    foreach ($Tasks as $Task) {
                    ?>
                    <tr>
                        <td><?= $Task->id ?></td>
                        <td><?= $Task->name ?></td>
                        <td><?= $Task->description ?></td>
                        <td>
                            <button class="action-btn edit-btn" onclick="openEditModal('1', 'تسک نمونه', 'این یک توضیح تستی است')">ویرایش</button>
                            <button class="action-btn delete-btn" onclick="opendeleteModalTask('1')">حذف</button>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="modal-overlay" id="editModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>ویرایش تسک</h3>
                        <span class="modal-close" onclick="closeModal('editModal')">✖</span>
                    </div>
                    <input type="hidden" id="editTaskId">
                    <div class="input-group">
                        <label>اسم تسک:</label>
                        <input type="text" class="modal-input" id="editTaskName">
                    </div>
                    <div class="input-group">
                        <label>توضیحات:</label>
                        <textarea class="modal-input" id="editTaskDesc" rows="3"></textarea>
                    </div>
                    <div class="modal-actions">
                        <button class="btn confirm-btn" onclick="saveChanges()">ذخیره تغییرات</button>
                        <button class="btn cancel-btn" onclick="closeModal('editModal')">لغو</button>
                    </div>
                </div>
            </div>

            <div class="modal-overlay" id="deleteModalTask">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>حذف تسک</h3>
                        <span class="modal-close" onclick="closeModal('deleteModalTask')">✖</span>
                    </div>
                    <p>آیا مطمئنید میخواهید تسک شماره <span id="deleteTaskId"></span> را حذف کنید؟</p>
                    <div class="modal-actions">
                        <button class="btn confirm-btn" onclick="confirmDelete()">بله، حذف شود</button>
                        <button class="btn cancel-btn" onclick="closeModal('deleteModalTask')">خیر</button>
                    </div>
                </div>
            </div>

        </div>


    </div>

</div>

<script>
    let currentTaskId = null;

    function openEditModal(taskId, taskName, taskDesc) {
        currentTaskId = taskId;
        $('#editTaskId').val(taskId);
        $('#editTaskName').val('taskName');
        $('#editTaskDesc').val(taskDesc);
        $('#editModal').fadeIn(300);
    }

    function opendeleteModalTask(taskId) {
        currentTaskId = taskId;
        $('#deleteTaskId').text(taskId);
        $('#deleteModalTask').fadeIn(300);
    }

    function closeModal(modalId) {
        $('#' + modalId).fadeOut(300);
    }

    function saveChanges() {
        const newName = $('#editTaskName').val().trim();
        const newDesc = $('#editTaskDesc').val().trim();

        if(!newName) {
            alert('لطفا نام تسک را وارد کنید');
            return;
        }

        $(`.task-table>tbody>tr:has(td:first-child:contains('${currentTaskId}'))`)
            .find('td:nth-child(2)').text(newName)
            .next('td').text(newDesc);

        closeModal('editModal');
    }

    function confirmDelete() {
        $(`.task-table>tbody>tr:has(td:first-child:contains('${currentTaskId}'))`).fadeOut(300, function() {
            $(this).remove();
        });
        closeModal('deleteModalTask');
    }

    $(document).ready(function() {
        $(document).on('click', '.modal-overlay', function(e) {
            if($(e.target).hasClass('modal-overlay')) {
                closeModal($(this).attr('id'));
            }
        });

        $('.modal-content').on('click', function(e) {
            e.stopPropagation();
        });
    });
    $(document).ready(function() {
        // باز کردن مدال
        $('#addTaskBtn').click(() => $('#addModal').fadeIn(200));

        // بستن مدال
        $('#cancelAdd').click(() => $('#addModal').fadeOut(200));

        // ذخیره تسک
        $('#saveTask').click(function() {
            const title = $('#taskTitle').val().trim();
            const desc = $('#taskDescription').val().trim();

            if(!title) {
                alert('لطفا عنوان تسک را وارد کنید');
                return;
            }

            // اینجا کد افزودن به جدول/دیتابیس
            console.log('تسک جدید:', {title, desc});

            // پاک کردن فیلدها
            $('#taskTitle, #taskDescription').val('');
            $('#addModal').fadeOut(200);
        });

        // بستن مدال با کلیک خارج
        $(document).on('click', '.modal-overlay', function(e) {
            if($(e.target).hasClass('modal-overlay')) {
                $('#addModal').fadeOut(200);
            }
        });
    });
</script>
@endsection
