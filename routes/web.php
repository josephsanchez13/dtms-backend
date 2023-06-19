<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    //return view('welcome');
    //$users = DB::select("select * from users");
    //$users = DB::table('users')->where('id', 1)->first();
    //$user = User::find(24);

    // $user = DB::insert('insert into users (name, email, password) value (?,?,?)',[
    //     'Sarthak',
    //     'sarthak100@bitfumes.com',
    //     'password',
    // ]);
    // $user = DB::table('users')->insert([
    //     'name'      => 'Sarthak',
    //     'email'     => 'sarthak101@bitfumes.com',
    //     'password'  => 'password',
    // ]);
    // $user = User::create([
    //     'name'      => 'Sarthak',
    //     'email'     => 'sarthak104@bitfumes.com',
    //     'password'  => 'password',
    // ]);

    //$user = DB::update("update users set email='abc@bitfumes.com' where id=3");
    //$user = DB::table('users')->where('id', 5)->update(['email' => 'sarthak134@bitfumes.com']);
    // $user = User::find(10);
    // $user->update([
    //     'email' => 'sarthak134@bitfumes.com'
    // ]);

    //$user = DB::delete("delete from users where id=3");
    // $user = DB::table('users')->where('id', 5)->delete();
    //$user = User::find(10);
    //$user->delete();
    //dd($user->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
