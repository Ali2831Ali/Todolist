<div class="modal-overlay" id="addModal">
    <div class="modal-content">
        <h3>🎯 افزودن تسک جدید</h3>
        <input type="text" class="modal-input" id="taskTitle" placeholder="عنوان تسک">
        <textarea class="modal-input" id="taskDescription" placeholder="توضیحات"></textarea>
        <div class="action-buttons">
            <button class="btn confirm-btn" id="saveTask" onclick="saveChanges()">💾 ذخیره</button>
            <button class="btn cancel-btn" id="cancelAdd" wire:click="CloseCreate">❌ لغو</button>
        </div>
    </div>
    <div id="result"></div>
</div>
{{--@push('scripts')
    <script>
        axios.defaults.headers.common['X-CSRF-TOKEN'] =
            document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function saveChanges() {
            axios.post('/submit-contact', {
                title: document.getElementById('taskTitle').value,
                description: document.getElementById('taskDescription').value
            })
                .then(response => {
                    document.getElementById('result').innerText = response.data.message;
                })
                .catch(error => {
                    document.getElementById('result').innerText = 'خطا: ' + JSON.stringify(error.response.data.errors);
                });
        }
    </script>
@endpush--}}


