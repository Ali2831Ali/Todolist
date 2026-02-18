<div class="modal-overlay" id="editModalCat">
    <div class="modal-content">
        <div class="modal-header">
            <h3>ویرایش کتگوری</h3>
            <span class="modal-close" wire:click="CloseEdit">✖</span>
        </div>
        <input type="hidden" id="editCategoryId">
        <div class="input-group">
            <label>اسم کتگوری:</label>
            <input wire:model="name" type="text" class="modal-input" id="editCategoryName">
        </div>
        <div class="input-group">
            <label>توضیحات:</label>
            <textarea wire:model="description" class="modal-input" id="editCategoryDesc" rows="3"></textarea>
        </div>
        <div class="modal-actions">
            <button class="btn confirm-btn" wire:click="saveChanges">ذخیره تغییرات</button>
            <button class="btn cancel-btn" wire:click="CloseEdit">لغو</button>
        </div>
    </div>
</div>
