<x-layout>
    <div class = "note-header">
        <h1>Note: {{$notes->created_at}}</h1>
    </div>
            <div class="note-container single-note">
                <div class="note">
                <div class="note-body">
                    {{ $notes->note }}
                 
                </div>
                    <div class="note-buttons">
                    <a href="{{route('note.edit', $notes)}}" class="note-edit-button">Edit</a>
                    <button class="note-delete-button">Delete</button>
                    </div>
                </div>
            </div>
  
    </x-layout>
