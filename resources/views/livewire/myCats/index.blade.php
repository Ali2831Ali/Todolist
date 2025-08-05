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
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button class="action-btn edit-btn" onclick="openeditModalCat('1', 'کتگوری نمونه', 'این یک توضیح تستی است')">ویرایش</button>
                                <button class="action-btn delete-btn" onclick="opendeleteModalCat('1')">حذف</button>
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
