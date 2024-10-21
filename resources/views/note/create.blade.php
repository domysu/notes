<x-layout>
    <div class="create-container">
        <form action="{{ route('note.store') }}" method="POST" class="create-container">
            @csrf
        <textarea name="note" type="text"  class="form-input" placeholder="input your note here"></textarea>
    <div class="create-buttons">
        <button class="note-create-button">Create</button>
        <a href="{{route('note.index')}}" class="note-edit-cancel-button">Cancel</a>
    </div>
        </form>
    </div>
</x-layout>

