    <?php
    use App\Http\Controllers\NoteController;
   use App\Http\Controllers\WelcomeController;

    use Illuminate\Support\Facades\Route;

    Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
    Route::get('/note', [NoteController::class, 'index'])->name('note.index'); 
    Route::get('/note/create',[NoteController::class, 'create'])->name('note.create');  
    Route::post('/note', [NoteController::class, 'store'])->name('note.store')         
