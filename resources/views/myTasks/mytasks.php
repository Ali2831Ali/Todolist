<style>
    .myTask-box {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        height: auto;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .row {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: var(--card-shadow);
    }

    .task-table {
        width: 100%;
        border-collapse: collapse;
        margin: 10px 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #fff;
        color: #000;
    }

    .task-table th,
    .task-table td {
        padding: 12px 15px;
        text-align: right;
    }

    .task-table th {
        font-weight: 600;
    }

    .action-btn {
        padding: 5px 10px;
        margin: 0 3px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .edit-btn {
        background-color: #666;
        color: white;
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.5);
        padding: 11px;
        border-radius: 14px;
    }

    .delete-btn {
        background-color: red;
        color: white;
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.5);
        padding: 11px;
        border-radius: 14px;
    }

    .action-btn:hover {
        opacity: 0.6;
    }
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .modal-content {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        width: 400px;
        position: relative;
        margin: 0 auto;
        top: 200px;
    }

    .modal-header {
        border-bottom: 1px solid #444;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }
    .modal-header > h3{
        margin: 0 auto;
    }
    .modal-close {
        position: absolute;
        left: 15px;
        top: 15px;
        cursor: pointer;
        color: #666;
    }

    .input-group {
        margin-bottom: 15px;
    }

    .modal-input {
        width: 100%;
        padding: 8px;
        background: #fff;
        border: 1px solid #444;
        color: #5aefcb;
        border-radius: 7px;
        margin-top: 5px;
    }

    .modal-actions {
        display: flex;
        gap: 10px;
        justify-content: left;
        margin-top: 20px;
    }

    .confirm-btn {
        background: #4CAF50;
        color: white;
    }

    .cancel-btn {
        background: #666;
        color: white;
    }
    .action-buttons {
        margin-top: 20px;
        display: flex;
        gap: 10px;
    }

</style>
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
