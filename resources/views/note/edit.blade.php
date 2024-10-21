<div>
    <x-layout>
        <div class="create-container">
            <form action="{{route('note.update', $notes)}}" method="POST">
                @csrf
                @method('PUT')
            <textarea name="note" type="text"  class="form-input" placeholder="input your note here">{{$notes->note}}</textarea>
        <div class="create-buttons">
            <button class="note-change-button">Edit</button>
            <a href="{{route('note.index')}}" class="note-edit-cancel-button">Cancel</a>
        </div>
    </form>     
        </div>
    </x-layout>
</div>
