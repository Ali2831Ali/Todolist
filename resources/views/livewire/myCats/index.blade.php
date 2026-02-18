<div class="content-section" id="CategorySection">
    <div class="main-content">
        <div class="myCategory-box">
            <button id="addCategoryBtn" class="btn" wire:click="ShowCreate">➕ افزودن کتگوری جدید</button>

            @if($showCreate)
                <livewire:myCats.create />
            @endif

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
                    @foreach($Cats as $Cat)
                        <tr>
                            <td>{{$Cat['id']}}</td>
                            <td>{{$Cat['name']}}</td>
                            <td>{{$Cat['description']}}</td>
                            <td>
                                <button class="action-btn edit-btn" wire:click="ShowEditCat({{$Cat['id']}},'{{$Cat['name']}}','{{$Cat['description']}}')">ویرایش
                                </button>
                                <button class="action-btn delete-btn"
                                        wire:click="ShowDelete({{$Cat['id']}})">حذف
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>


            @if($showEdit)
                <livewire:myCats.Edit :CatId="$editCatId" :name="$editCatName" :description="$editCatDesc" />
            @endif


            @if($showDelete)
                <livewire:myCats.Delete  :deleteId="$DeleteCatId"/>
            @endif



        </div>


    </div>

</div>
