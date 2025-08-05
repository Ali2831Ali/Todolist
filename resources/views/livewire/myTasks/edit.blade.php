<div class="modal-overlay" id="editModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>ویرایش تسک</h3>
            <span class="modal-close" wire:click="CloseEdit">✖</span>
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
            <button class="btn cancel-btn" wire:click="CloseEdit">لغو</button>
        </div>
    </div>
</div>
