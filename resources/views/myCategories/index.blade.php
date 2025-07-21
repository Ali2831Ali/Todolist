@extends('layouts.master')

@section('head')
    <title>myCats</title>
    <link rel="stylesheet" href="{{asset('app/myCats/categoryStyle.css')}}">
@endsection

@section('content')
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
                    @foreach($Category as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->description}}</td>
                            <td>
                                <button class="action-btn edit-btn" onclick="openeditModalCat('1', 'کتگوری نمونه', 'این یک توضیح تستی است')">ویرایش</button>
                                <button class="action-btn delete-btn" onclick="opendeleteModalCat('1')">حذف</button>
                            </td>
                        </tr>
                    @endforeach

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
@endsection
