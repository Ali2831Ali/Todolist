<div class="modal-overlay" id="addModalCat">
    <div class="modal-content">
        <h3>🎯 افزودن کتگوری جدید</h3>
        <input type="text" wire:model="name" class="modal-input" id="CategoryTitle" placeholder="عنوان کتگوری">
        <textarea wire:model="description" class="modal-input" id="CategoryDescription" placeholder="توضیحات"></textarea>
        @error('name')
        <div class="error-btn">
            خطا: {{ $message }}
        </div>
        @enderror
        @error('description')
        <div class="error-btn">
            خطا: {{ $message }}
        </div>
        @enderror
        <div class="action-buttons">
            <button class="btn confirm-btn" id="saveCategoryCat" wire:click="saveChanges">💾 ذخیره</button>
            <button class="btn cancel-btn" id="cancelAddCat" wire:click="CloseCreate">❌ لغو</button>
        </div>
    </div>
</div>
