<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\alumniprofileController;
use App\Http\Controllers\LogangAdminController;
use App\Http\Controllers\LogangController;
use App\Http\Controllers\LokerAdminController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\GrafikStatistikController;


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

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'simpan']);
});

Route::get('/home', function(){
    return redirect('/admin');
});
Route::get('/profile', [AboutController::class, 'profile'])->name('admin-profile');
    Route::post('/profile',[AboutController::class, 'store'])->name('admin-store');
    Route::get('/profilealumni', [alumniprofileController::class, 'profilealumni'])->name('alumni-profile');
    Route::post('/profilealumni',[alumniprofileController::class, 'store'])->name('alumni-store');
    Route::post('/change-password', [alumniprofileController::class, 'changePassword'])->name('alumni.change-password');
    Route::post('/change-password-admin', [AboutController::class, 'changePassword'])->name('admin.change-password');


    

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail-loker/{id}', [HomeController::class, 'showLoker'])->name('loker.detail');
Route::get('/detail-logang/{id}', [HomeController::class, 'showLogang'])->name('logang.detail');

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin')->name('admin');
    Route::get('/alumni', [AdminController::class, 'alumni'])->middleware('userAkses:alumni')->name('alumni');
    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'userAkses:alumni'])->group(function () {
    // route Loker
    Route::get('/loker', [LokerController::class, 'index'])->name('loker.index');
    Route::get('/postLoker',[LokerController::class,'create'])->name('loker.create');
    Route::post('/storeloker',[LokerController::class, 'store'])->name('loker.store');
    Route::get('/loker/{id}', [LokerController::class,'show'])->name('loker.show');
    Route::get('/lokerhome/{id}', [LokerController::class,'showHome'])->name('loker.showHome');
    Route::get('/loker/{id}/edit', [LokerController::class,'edit'])->name('loker.edit');
    Route::put('/loker/{id}/update', [LokerController::class,'update'])->name('loker.update');
    Route::delete('/loker/{id}/delete', [LokerController::class,'destroy']);
    Route::get('/manageLoker', [LokerController::class,'manage'])->name('loker.manage');

    //route Logang
    Route::get('/logang', [LogangController::class, 'index'])->name('logang.index');
    Route::get('/postLogang',[LogangController::class,'create'])->name('logang.create');
    Route::post('/storelogang',[LogangController::class, 'store'])->name('logang.store');
    Route::get('/logang/{id}', [LogangController::class,'show'])->name('logang.show');
    Route::get('/loganghome/{id}', [LogangController::class,'showHome'])->name('logang.showHome');
    Route::get('/logang/{id}/edit', [LogangController::class,'edit'])->name('logang.edit');
    Route::put('/logang/{id}/update', [LogangController::class,'update'])->name('logang.update');
    Route::delete('/logang/{id}/delete', [LogangController::class,'destroy']);
    Route::get('/manageLogang', [LogangController::class,'manage'])->name('logang.manage');

    // Route untuk cv
    Route::get('/cv', function () {
        // Mengambil data dari semua model yang diperlukan
        $academics = \App\Models\academic::paginate(5);
        $jobs = \App\Models\job::paginate(5);
        $internships = \App\Models\internship::paginate(5);
        $organizations = \App\Models\organization::paginate(5);
        $awards = \App\Models\award::paginate(5);   
        $courses = \App\Models\course::paginate(5);
        $skills = \App\Models\skill::paginate(5);

        // Mengirim data ke view
        return view('alumni.tracerstudy.cv.index', compact('academics', 'jobs', 'internships', 'organizations', 'awards', 'courses', 'skills'));
    })->name('cv');

    // Route untuk kuesioner

    Route::get('/kuesioner/index', [\App\Http\Controllers\KuesionerController::class, 'index'])->name('kuesioner.index');
    Route::get('/kuesioner/create', [\App\Http\Controllers\KuesionerController::class, 'create'])->name('kuesioner.create');
    Route::post('/kuesioner', [\App\Http\Controllers\KuesionerController::class, 'store'])->name('kuesioner.store');
    Route::get('/kuesioner/{id}/edit', [\App\Http\Controllers\KuesionerController::class, 'edit'])->name('kuesioner.edit');
    Route::put('/kuesioner/{id}', [\App\Http\Controllers\KuesionerController::class, 'update'])->name('kuesioner.update');

    // Academic Controller
    Route::get('/academic', [\App\Http\Controllers\AcademicController::class, 'index'])->name('academic.index');
    Route::get('/academic/create', [\App\Http\Controllers\AcademicController::class, 'create'])->name('academic.create');
    Route::post('/academic', [\App\Http\Controllers\AcademicController::class, 'store'])->name('academic.store');
    Route::get('/academic/{academic}', [\App\Http\Controllers\AcademicController::class, 'show'])->name('academic.show');
    Route::get('/academic/{academic}/edit', [\App\Http\Controllers\AcademicController::class, 'edit'])->name('academic.edit');
    Route::put('/academic/{academic}', [\App\Http\Controllers\AcademicController::class, 'update'])->name('academic.update');
    Route::delete('/academic/{academic}', [\App\Http\Controllers\AcademicController::class, 'destroy'])->name('academic.destroy');

    // Job Controller
    Route::get('/job', [\App\Http\Controllers\JobController::class, 'index'])->name('job.index');
    Route::get('/job/create', [\App\Http\Controllers\JobController::class, 'create'])->name('job.create');
    Route::post('/job', [\App\Http\Controllers\JobController::class, 'store'])->name('job.store');
    Route::get('/job/{job}', [\App\Http\Controllers\JobController::class, 'show'])->name('job.show');
    Route::get('/job/{job}/edit', [\App\Http\Controllers\JobController::class, 'edit'])->name('job.edit');
    Route::put('/job/{job}', [\App\Http\Controllers\JobController::class, 'update'])->name('job.update');
    Route::delete('/job/{job}', [\App\Http\Controllers\JobController::class, 'destroy'])->name('job.destroy');

    // Internsip controller
    Route::get('/internship', [\App\Http\Controllers\InternshipController::class, 'index'])->name('internship.index');
    Route::get('/internship/create', [\App\Http\Controllers\InternshipController::class, 'create'])->name('internship.create');
    Route::post('/internship', [\App\Http\Controllers\InternshipController::class, 'store'])->name('internship.store');
    Route::get('/internship/{internship}', [\App\Http\Controllers\InternshipController::class, 'show'])->name('internship.show');
    Route::get('/internship/{internship}/edit', [\App\Http\Controllers\InternshipController::class, 'edit'])->name('internship.edit');
    Route::put('/internship/{internship}', [\App\Http\Controllers\InternshipController::class, 'update'])->name('internship.update');
    Route::delete('/internship/{internship}', [\App\Http\Controllers\InternshipController::class, 'destroy'])->name('internship.destroy');

    // Organization controller
    Route::get('/organization', [\App\Http\Controllers\OrganizationController::class, 'index'])->name('organization.index');
    Route::get('/organization/create', [\App\Http\Controllers\OrganizationController::class, 'create'])->name('organization.create');
    Route::post('/organization', [\App\Http\Controllers\OrganizationController::class, 'store'])->name('organization.store');
    Route::get('/organization/{organization}', [\App\Http\Controllers\OrganizationController::class, 'show'])->name('organization.show');
    Route::get('/organization/{organization}/edit', [\App\Http\Controllers\OrganizationController::class, 'edit'])->name('organization.edit');
    Route::put('/organization/{organization}', [\App\Http\Controllers\OrganizationController::class, 'update'])->name('organization.update');
    Route::delete('/organization/{organization}', [\App\Http\Controllers\OrganizationController::class, 'destroy'])->name('organization.destroy');

    // Award controller
    Route::get('/award', [\App\Http\Controllers\AwardController::class, 'index'])->name('award.index');
    Route::get('/award/create', [\App\Http\Controllers\AwardController::class, 'create'])->name('award.create');
    Route::post('/award', [\App\Http\Controllers\AwardController::class, 'store'])->name('award.store');
    Route::get('/award/{award}', [\App\Http\Controllers\AwardController::class, 'show'])->name('award.show');
    Route::get('/award/{award}/edit', [\App\Http\Controllers\AwardController::class, 'edit'])->name('award.edit');
    Route::put('/award/{award}', [\App\Http\Controllers\AwardController::class, 'update'])->name('award.update');
    Route::delete('/award/{award}', [\App\Http\Controllers\AwardController::class, 'destroy'])->name('award.destroy');

    // Organization controller
    Route::get('/course', [\App\Http\Controllers\CourseController::class, 'index'])->name('course.index');
    Route::get('/course/create', [\App\Http\Controllers\CourseController::class, 'create'])->name('course.create');
    Route::post('/course', [\App\Http\Controllers\CourseController::class, 'store'])->name('course.store');
    Route::get('/course/{course}', [\App\Http\Controllers\CourseController::class, 'show'])->name('course.show');
    // Route::get('course/{id}/edit', [\App\Http\Controllers\CourseController::class, 'edit'])->name('course.edit');
    Route::get('/course/{course}/edit', [\App\Http\Controllers\CourseController::class, 'edit'])->name('course.edit');
    Route::put('/course/{course}', [\App\Http\Controllers\CourseController::class, 'update'])->name('course.update');
    Route::delete('/course/{course}', [\App\Http\Controllers\CourseController::class, 'destroy'])->name('course.destroy');

    // Award controller
    Route::get('/skill', [\App\Http\Controllers\SkillController::class, 'index'])->name('skill.index');
    Route::get('/skill/create', [\App\Http\Controllers\SkillController::class, 'create'])->name('skill.create');
    Route::post('/skill', [\App\Http\Controllers\SkillController::class, 'store'])->name('skill.store');
    Route::get('/skill/{skill}', [\App\Http\Controllers\SkillController::class, 'show'])->name('skill.show');
    Route::get('/skill/{skill}/edit', [\App\Http\Controllers\SkillController::class, 'edit'])->name('skill.edit');
    Route::put('/skill/{skill}', [\App\Http\Controllers\SkillController::class, 'update'])->name('skill.update');
    Route::delete('/skill/{skill}', [\App\Http\Controllers\SkillController::class, 'destroy'])->name('skill.destroy');

});

Route::middleware(['auth', 'userAkses:admin'])->group(function () {
    Route::get('/profile', [AboutController::class, 'profile'])->name('alumni-profile');
    Route::post('/profile',[AboutController::class, 'store'])->name('alumni-store');

    //  Route::middleware(['auth', 'userAkses:alumni'])->group(function () {
    //     Route::get('/profile', [AboutController::class, 'profile'])->name('alumni-profile');
    //     Route::post('/profile', [AboutController::class, 'store'])->name('alumni-store');
    // });  



    //route Loker Admin
    Route::get('/lokeradmin',[LokerAdminController::class, 'indexadmin'])->name('lokeradmin.index');
    Route::get('/lokeradmin/{id}', [LokerAdminController::class,'show'])->name('lokeradmin.showAdmin');
    Route::delete('/lokeradmin/{id}/delete', [LokerAdminController::class, 'destroy']);
    Route::post('/adminLoker/{id}/verify', [LokerAdminController::class, 'verify']);
    Route::get('/manageLokerAdmin', [LokerAdminController::class, 'manage'])->name('lokeradmin.manage');

    //route Logang Admin
    Route::get('/logangadmin',[LogangAdminController::class, 'indexadmin'])->name('logangadmin.index');
    Route::get('/logangadmin/{id}', [LogangAdminController::class,'show'])->name('logangadmin.showAdmin');
    Route::delete('/logangadmin/{id}/delete', [LogangAdminController::class, 'destroy']);
    Route::post('/adminLogang/{id}/verify', [LogangAdminController::class, 'verify']);
    Route::get('/manageLogangAdmin', [LogangAdminController::class, 'manage'])->name('logangadmin.manage');

    //kuesioner
    Route::get('/kuesioner', [\App\Http\Controllers\KuesionerAdminController::class, 'index'])->name('kuesionerAdmin.index');
    Route::get('/kuesioner/{kuesioner}', [\App\Http\Controllers\KuesionerAdminController::class, 'show'])->name('kuesionerAdmin.show');
});