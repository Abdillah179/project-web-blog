<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Home;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Halaman_User;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AdminController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\LoginRegistration;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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

Route::middleware(["guest"])->group(function () {
    Route::get("/", [Home::class, 'index']);

    Route::get('/detailbloghome/{post:slug}', [Home::class, 'DetailBlogHome']);

    Route::get('/categorybloghome/{categoryblog:category_slug}', [Home::class, 'CategoryBlogHome']);

    Route::get('/madeby', [Home::class, 'MadeBy']);

    Route::get('/login', [LoginRegistration::class, 'index'])->name('login');

    Route::get('/registration', [LoginRegistration::class, 'Registration']);
});


Route::post('/postlogin', [LoginRegistration::class, 'PostLogin']);

Route::post('/postregistration', [LoginRegistration::class, 'PostRegistration']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    $id_user = request()->id;

    $user = User::find($id_user);

    if ($user) {
        $user->update([
            'is_online' => 1,
        ]);
    }

    return redirect('/Dashboard')->with('loginberhasil', 'Selamat Datang');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/forgot-password', function () {
    return view('auth.forgot-password', [
        'judul' => 'Halaman Form Forgot Password'
    ]);
})->middleware('guest')->name('password.request');


Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email:dns']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? redirect('/notification')->with(['status' => __('Check Your Email For Reset Password')])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');


Route::get('/notification', [LoginRegistration::class, 'NotificationResetPassword'])->middleware('guest');


Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', [
        'token' => $token,
        'judul' => 'Halaman Reset Password'
    ]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __('Reset Password Berhasil'))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');


// GET HALAMAN USER
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/Dashboard', [Halaman_User::class, 'index'])->name('home');

    Route::get('/profile', [Halaman_User::class, 'Profile']);

    Route::get('/Post', [Halaman_User::class, 'MyPost']);

    Route::get('/tambahblog', [Halaman_User::class, 'TambahBlogPostingan']);

    Route::get('/createSlug', [Halaman_User::class, 'Slugcheck']);

    Route::get('/detailblog/{post:slug}', [Halaman_User::class, 'DetailBlog']);

    Route::get('/EditBlog/{post:slug}', [Halaman_User::class, 'editblog']);

    Route::get('/datapostinganbloguser/{category:category_slug}', [Halaman_User::class, 'DataPostinganBlogUser']);

    Route::delete('/hapuscategorypostbloguser/{post:slug}', [Halaman_User::class, 'HapusCategoryPostBlogUser']);

    Route::get('/editcategorypostbloguser/{post:slug}', [Halaman_User::class, 'EditCategoryPostBlogUser']);

    Route::get('/petunjukpenggunaanblog', [Halaman_User::class, 'PetunjukPenggunaanBlog']);

    Route::get('/editprofilepostbloguser/{post:slug}', [Halaman_User::class, 'EditProfilePostBlogUser']);

    Route::get('/logout', [LoginRegistration::class, 'logout']);
});

// POST HALAMAN USER

Route::post('/postprofile', [Halaman_User::class, 'PostProfile']);

Route::post('/posteditfotoprofile', [Halaman_User::class, 'PostEditFotoProfile']);

Route::post('/tambahpostinganbaru', [Halaman_User::class, 'TambahPostinganBaru']);

Route::delete('/HapusBlog/{dtblg:slug}', [Halaman_User::class, 'DeleteBlog']);

Route::post('/editpostinganblog/{post:slug}', [Halaman_User::class, 'EditPostinganBlog']);

Route::post('/posteditheaderblog/{post:slug}', [Halaman_User::class, 'PostEditHeaderBlog']);

Route::post('/posteditjudulblog/{post:slug}', [Halaman_User::class, 'PostEditJudulBlog']);

Route::post('/posteditfotoblog/{post:slug}', [Halaman_User::class, 'PostEditFotoBlog']);

Route::post('/posteditbodyteksblog/{post:slug}', [Halaman_User::class, 'PostEditBodyTeksBlog']);

Route::post('/updateprofilepostuser/{post:slug}', [Halaman_User::class, 'UpdateProfilePostUser']);

Route::post('/editcategoryheaderblog/{post:slug}', [Halaman_User::class, 'EditCategoryHeaderBlog']);

Route::post('/editpostjudulbloguser/{post:slug}', [Halaman_User::class, 'EditPostJudulBlogUser']);

Route::post('/editpostfotobloguser/{post:slug}', [Halaman_User::class, 'EditPostFotoBlogUser']);

Route::post('/editpostbodyteksbloguser/{post:slug}', [Halaman_User::class, 'EditPostBodyTeksBlogUser']);

Route::post('/posteditprofilebloguser/{post:slug}', [Halaman_User::class, 'PostEditProfileBlogUser']);

Route::post('/posteditfotoprofilebloguser/{post:slug}', [Halaman_User::class, 'PostEditFotoProfileBlogUser']);

Route::delete('/deleteposteditfotoprofilebloguser/{post:slug}', [Halaman_User::class, 'DeletePostEditFotoProfileBlogUser']);

Route::delete('/postdeletefotoprofileuser/{id}', [Halaman_User::class, 'PostDeleteFotoProfileUser']);

Route::post('/tambahdatacategorypostbloguser', [Halaman_User::class, 'TambahDataCategoryPostBlogUser']);



// GET HALAMAN ADMIN

Route::middleware('admin', 'verified')->group(function () {
    Route::get('/Dashboard_Admin', [AdminController::class, 'index']);

    Route::get('/datauser', [AdminController::class, 'DataUser']);

    Route::get('/datauseradmin', [AdminController::class, 'DataUserAdmin']);

    Route::delete('/deletedatauser/{id}', [AdminController::class, 'DeleteDataUser']);

    Route::get('/detaildatauser/{users:email}', [AdminController::class, 'DetailDataUser']);

    Route::get('/detaildatapostinganuser/{users:email}', [AdminController::class, 'DetailDataPostinganUser']);

    Route::get('/DetailPostinganBlogUser/{post:slug}', [AdminController::class, 'DetailPostinganBlogUser']);

    Route::delete('/HapusPostinganBlogUser/{post:slug}', [AdminController::class, 'HapusPostinganBlogUser']);

    Route::get('/editroleuser/{id}', [AdminController::class, 'EditRoleUser']);

    Route::get('/profileuseradmin', [AdminController::class, 'ProfileUserAdmin']);

    Route::delete('/deletedatauseradmin/{id}', [AdminController::class, 'DeleteDataUserAdmin']);

    Route::get('/detaildatauseradmin/{id}', [AdminController::class, 'DetailDataUserAdmin']);

    Route::get('/detaildatapostinganuseradmin/{id}', [AdminController::class, 'DetailDataPostinganUserAdmin']);

    Route::delete('/hapuspostinganbloguseradmin/{post:slug}', [AdminController::class, 'HapusPostinganBlogUserAdmin']);

    Route::get('/detailpostinganbloguseradmin/{post:slug}', [AdminController::class, 'DetailDataPostinganBlogUserAdmin']);

    Route::get('/editroleuseradmin/{id}', [AdminController::class, 'EditRoleUserAdmin']);

    Route::get('/datapostinganblog', [AdminController::class, 'DataPostinganBlog']);

    Route::delete('/deletepostinganbloguser/{post:slug}', [AdminController::class, 'DeletePostinganBlogUser']);

    Route::get('/detailprofilepostbloguser/{user_id}', [AdminController::class, 'DetailProfilePostBlogUser']);

    Route::get('/detaildatapostbloguser/{post:slug}', [AdminController::class, 'DetailDataPostBlogUser']);

    Route::get('/datacategoryblog', [AdminController::class, 'DataCategoryBlog']);

    Route::delete('/deletedatacategoryblog/{id}', [AdminController::class, 'DeleteDataCategoryBlog']);

    Route::get('/editdatacategoryblog/{id}', [AdminController::class, 'EditDataCategoryBlog']);

    Route::get('/tambahcategoryblog', [AdminController::class, 'TambahCategoryBlog']);
});



// POST HALAMAN ADMIN

Route::post('/updateroleuser/{id}', [AdminController::class, 'UpdateRoleUser']);

Route::post('/postupdateprofileuseradmin', [AdminController::class, 'UpdateProfileUserAdmin']);

Route::post('/posteditfotoprofileadmin', [AdminController::class, 'PostEditFotoProfileAdmin']);

Route::post('/updateroleuseradmin/{id}', [AdminController::class, 'UpdateRoleUserAdmin']);

Route::post('/updatedatablogcategory/{id}', [AdminController::class, 'UpdateDataBlogCategory']);

Route::post('/posttambahdatacategoryblog', [AdminController::class, 'PostTambahDataCategoryBlog']);
