<div class="modal-overlay" id="addModal">
    <div class="modal-content">
        <h3>🎯 افزودن تسک جدید</h3>
        <input wire:model="name" type="text" class="modal-input" id="taskTitle" placeholder="عنوان تسک">
        <textarea wire:model="description" class="modal-input" id="taskDescription" placeholder="توضیحات"></textarea>
        @error('name')
        <div class="error-btn">
            خطا: {{ $message }}
        </div>
        @enderror
        <div class="action-buttons">
            <button class="btn confirm-btn" id="saveTask" wire:click="saveChanges">💾 ذخیره</button>
            <button class="btn cancel-btn" id="cancelAdd" wire:click="CloseCreate">❌ لغو</button>
        </div>
    </div>
</div>


