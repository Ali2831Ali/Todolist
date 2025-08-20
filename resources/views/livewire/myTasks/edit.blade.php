<div class="modal-overlay" id="editModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>ویرایش تسک</h3>
            <span class="modal-close" wire:click="CloseEdit">✖</span>
        </div>
        <input type="hidden" id="editTaskId">
        <div class="input-group">
            <label>اسم تسک:</label>
            <input wire:model="title" type="text" class="modal-input" id="editTaskName">
        </div>
        <div class="input-group">
            <label>توضیحات:</label>
            <textarea wire:model="description" class="modal-input" id="editTaskDesc" rows="3">

            </textarea>
        </div>
        @error('title')
        <div style="color: red; font-size: 14px; margin-top: 5px;">
            خطا: {{ $message }}
        </div>
        @enderror
        <div class="modal-actions">
            <button class="btn confirm-btn" wire:click="saveChanges">ذخیره تغییرات</button>
            <button class="btn cancel-btn" wire:click="CloseEdit">لغو</button>
        </div>
    </div>
</div>
