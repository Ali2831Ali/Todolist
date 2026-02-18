<div class="modal-overlay" id="deleteModalTask">
    <div class="modal-content">
        <div class="modal-header">
            <h3>حذف تسک</h3>
            <span class="modal-close" wire:click="CloseDelete">✖</span>
        </div>
        <p> آیا مطمئنید میخواهید تسک شماره {{$taskId}}<span id="deleteTaskId"></span> را حذف کنید؟</p>
        <div class="modal-actions">
            <button class="btn confirm-btn" wire:click="ConfirmDelete">بله، حذف شود</button>
            <button class="btn cancel-btn" wire:click="CloseDelete">خیر</button>
        </div>
    </div>
</div>
