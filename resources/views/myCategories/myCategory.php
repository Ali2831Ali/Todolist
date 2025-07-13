<style>
    .myCategory-box {
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

    .Category-table {
        width: 100%;
        border-collapse: collapse;
        margin: 10px 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #fff;
        color: #000;
    }

    .Category-table th,
    .Category-table td {
        padding: 12px 15px;
        text-align: right;
    }

    .Category-table th {
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
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        padding: 11px;
        border-radius: 14px;
    }

    .delete-btn {
        background-color: red;
        color: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
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

<div class="content-section" id="CategorySection">
    <div class="main-content">
        <div class="myCategory-box">
            <button id="addCategoryBtn" class="btn">➕ افزودن کتگوری جدید</button>

            <!-- مدال افزودن کتگوری -->
            <div class="modal-overlay" id="addModalCat">
                <div class="modal-content">
                    <h3>🎯 افزودن کتگوری جدید</h3>
                    <input type="text" class="modal-input" id="CategoryTitle" placeholder="عنوان کتگوری">
                    <textarea class="modal-input" id="CategoryDescription" placeholder="توضیحات"></textarea>
                    <div class="action-buttons">
                        <button class="btn confirm-btn" id="saveCategoryCat">💾 ذخیره</button>
                        <button class="btn cancel-btn" id="cancelAddCat">❌ لغو</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="Category-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>اسم کتگوری</th>
                        <th>توضیحات</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>کتگوری نمونه</td>
                        <td>این یک توضیح تستی است</td>
                        <td>
                            <button class="action-btn edit-btn" onclick="openeditModalCat('1', 'کتگوری نمونه', 'این یک توضیح تستی است')">ویرایش</button>
                            <button class="action-btn delete-btn" onclick="opendeleteModalCat('1')">حذف</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>کتگوری دیگر</td>
                        <td>توضیحات تکمیلی برای کتگوری</td>
                        <td>
                            <button class="action-btn edit-btn" onclick="openeditModalCat('2', 'کتگوری نمونه', 'این یک توضیح تستی است')">ویرایش</button>
                            <button class="action-btn delete-btn" onclick="opendeleteModalCat('2')">حذف</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal-overlay" id="editModalCat">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>ویرایش کتگوری</h3>
                        <span class="modal-close" onclick="closeModal('editModalCat')">✖</span>
                    </div>
                    <input type="hidden" id="editCategoryId">
                    <div class="input-group">
                        <label>اسم کتگوری:</label>
                        <input type="text" class="modal-input" id="editCategoryName">
                    </div>
                    <div class="input-group">
                        <label>توضیحات:</label>
                        <textarea class="modal-input" id="editCategoryDesc" rows="3"></textarea>
                    </div>
                    <div class="modal-actions">
                        <button class="btn confirm-btn" onclick="saveChangesCat()">ذخیره تغییرات</button>
                        <button class="btn cancel-btn" onclick="closeModal('editModalCat')">لغو</button>
                    </div>
                </div>
            </div>

            <div class="modal-overlay" id="deleteModalCat">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>حذف کتگوری</h3>
                        <span class="modal-close" onclick="closeModal('deleteModalCat')">✖</span>
                    </div>
                    <p>آیا مطمئنید میخواهید کتگوری شماره <span id="deleteCategoryId"></span> را حذف کنید؟</p>
                    <div class="modal-actions">
                        <button class="btn confirm-btn" onclick="confirmDeleteCat()">بله، حذف شود</button>
                        <button class="btn cancel-btn" onclick="closeModal('deleteModalCat')">خیر</button>
                    </div>
                </div>
            </div>

        </div>


    </div>

</div>

<script>
    let currentCategoryId = null;

    function openeditModalCat(CategoryId, CategoryName, CategoryDesc) {
        currentCategoryId = CategoryId;
        $('#editCategoryId').val(CategoryId);
        $('#editCategoryName').val('CategoryName');
        $('#editCategoryDesc').val(CategoryDesc);
        $('#editModalCat').fadeIn(300);
    }

    function opendeleteModalCat(CategoryId) {
        currentCategoryId = CategoryId;
        $('#deleteCategoryId').text(CategoryId);
        $('#deleteModalCat').fadeIn(300);
    }

    function closeModal(modalId) {
        $('#' + modalId).fadeOut(300);
    }

    function saveChangesCat() {
        const newName = $('#editCategoryName').val().trim();
        const newDesc = $('#editCategoryDesc').val().trim();

        if(!newName) {
            alert('لطفا نام کتگوری را وارد کنید');
            return;
        }

        $(`.Category-table>tbody>tr:has(td:first-child:contains('${currentCategoryId}'))`)
            .find('td:nth-child(2)').text(newName)
            .next('td').text(newDesc);

        closeModal('editModalCat');
    }

    function confirmDeleteCat() {
        $(`.Category-table>tbody>tr:has(td:first-child:contains('${currentCategoryId}'))`).fadeOut(300, function() {
            $(this).remove();
        });
        closeModal('deleteModalCat');
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
        $('#addCategoryBtn').click(() => $('#addModalCat').fadeIn(200));

        // بستن مدال
        $('#cancelAddCat').click(() => $('#addModalCat').fadeOut(200));

        // ذخیره کتگوری
        $('#saveCategoryCat').click(function() {
            const title = $('#CategoryTitle').val().trim();
            const desc = $('#CategoryDescription').val().trim();

            if(!title) {
                alert('لطفا عنوان کتگوری را وارد کنید');
                return;
            }

            // اینجا کد افزودن به جدول/دیتابیس
            console.log('کتگوری جدید:', {title, desc});

            // پاک کردن فیلدها
            $('#CategoryTitle, #CategoryDescription').val('');
            $('#addModalCat').fadeOut(200);
        });

        // بستن مدال با کلیک خارج
        $(document).on('click', '.modal-overlay', function(e) {
            if($(e.target).hasClass('modal-overlay')) {
                $('#addModalCat').fadeOut(200);
            }
        });
    });
</script>
