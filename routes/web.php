<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BelanjaKontraktualController;
use App\Http\Controllers\CapaianOutputController;
use App\Http\Controllers\DeviasiTigaDipaController;
use App\Http\Controllers\DispensasiSpmController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\PenyerapanAnggaranController;
use App\Http\Controllers\QnaController;
use App\Http\Controllers\RevisiDipaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\UpTupController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'login'])->name('auth');
});

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::get('/roles', [AdminController::class, 'roles'])->name('roles');
    Route::get('/teams', [AdminController::class, 'teams'])->name('teams');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/m_qna', [AdminController::class, 'm_qna'])->name('m_qna');
    Route::get('/m_knowledge', [AdminController::class, 'm_knowledge'])->name('m_knowledge');
    Route::get('/adk', [AdminController::class, 'adk'])->name('adk');


    Route::post('/upload_adk', [AdminController::class, 'upload_adk'])->name('upload_adk');

    Route::get('/home', [FeatureController::class, 'home'])->name('home');

    Route::get('/revisi_dipa', [FeatureController::class, 'revisi_dipa'])->name('revisi_dipa');
    Route::get('/belanja_kontraktual', [FeatureController::class, 'belanja_kontraktual'])->name('belanja_kontraktual');
    Route::get('/tagihan', [FeatureController::class, 'tagihan'])->name('tagihan');
    Route::get('/uptup', [FeatureController::class, 'uptup'])->name('uptup');
    Route::get('/spm', [FeatureController::class, 'spm'])->name('spm');

    Route::get('/faq', [FeatureController::class, 'faq'])->name('faq');
    Route::get('/knowledge', [FeatureController::class, 'knowledge'])->name('knowledge');

    Route::get('/deviasi_tiga_dipa', [FeatureController::class, 'deviasi_tiga_dipa'])->name('deviasi_tiga_dipa');
    Route::get('/penyerapan_anggaran', [FeatureController::class, 'penyerapan_anggaran'])->name('penyerapan_anggaran');
    Route::get('/capaian_output', [FeatureController::class, 'capaian_output'])->name('capaian_output');

    Route::post('/input_revisi_dipa', [RevisiDipaController::class, 'input_revisi_dipa'])->name('input_revisi_dipa');
    Route::post('/get_revisi_dipa_bytahun', [RevisiDipaController::class, 'get_revisi_dipa_bytahun'])->name('get_revisi_dipa_bytahun');
    Route::post('/get_revisi_dipa_byid', [RevisiDipaController::class, 'get_revisi_dipa_byid'])->name('get_revisi_dipa_byid');
    Route::post('/delete_revisi_dipa', [RevisiDipaController::class, 'delete_revisi_dipa'])->name('delete_revisi_dipa');
    Route::post('/add_warning_revisi_dipa', [RevisiDipaController::class, 'add_warning_revisi_dipa'])->name('add_warning_revisi_dipa');

    Route::post('/add_belanja_kontraktual', [BelanjaKontraktualController::class, 'add_belanja_kontraktual'])->name('add_belanja_kontraktual');
    Route::post('/delete_belanja_kontraktual', [BelanjaKontraktualController::class, 'delete_belanja_kontraktual'])->name('delete_belanja_kontraktual');
    Route::post('/get_belanja_kontraktual_byid', [BelanjaKontraktualController::class, 'get_belanja_kontraktual_byid'])->name('get_belanja_kontraktual_byid');
    Route::post('/add_warning_belanja_kontraktual', [BelanjaKontraktualController::class, 'add_warning_belanja_kontraktual'])->name('add_warning_belanja_kontraktual');

    Route::post('/input_tagihan', [TagihanController::class, 'input_tagihan'])->name('input_tagihan');
    Route::post('/delete_tagihan', [TagihanController::class, 'delete_tagihan'])->name('delete_tagihan');
    Route::post('/get_tagihan_byid', [TagihanController::class, 'get_tagihan_byid'])->name('get_tagihan_byid');
    Route::post('/add_warning_tagihan', [TagihanController::class, 'add_warning_tagihan'])->name('add_warning_tagihan');

    Route::post('/input_uptup', [UpTupController::class, 'input_uptup'])->name('input_uptup');
    Route::post('/delete_uptup', [UpTupController::class, 'delete_uptup'])->name('delete_uptup');
    Route::post('/get_uptup_byid', [UpTupController::class, 'get_uptup_byid'])->name('get_uptup_byid');
    Route::post('/add_warning_uptup', [UpTupController::class, 'add_warning_uptup'])->name('add_warning_uptup');

    Route::post('/input_spm', [DispensasiSpmController::class, 'input_spm'])->name('input_spm');
    Route::post('/delete_spm', [DispensasiSpmController::class, 'delete_spm'])->name('delete_spm');
    Route::post('/get_spm_byid', [DispensasiSpmController::class, 'get_spm_byid'])->name('get_spm_byid');
    Route::post('/add_warning_spm', [DispensasiSpmController::class, 'add_warning_spm'])->name('add_warning_spm');

    Route::post('/input_deviasi', [DeviasiTigaDipaController::class, 'input_deviasi'])->name('input_deviasi');
    Route::post('/delete_deviasi', [DeviasiTigaDipaController::class, 'delete_deviasi'])->name('delete_deviasi');
    Route::post('/get_deviasi_byid', [DeviasiTigaDipaController::class, 'get_deviasi_byid'])->name('get_deviasi_byid');
    Route::post('/add_warning_deviasi', [DeviasiTigaDipaController::class, 'add_warning_deviasi'])->name('add_warning_deviasi');

    Route::post('/input_penyerapan', [PenyerapanAnggaranController::class, 'input_penyerapan'])->name('input_penyerapan');
    Route::post('/delete_penyerapan', [PenyerapanAnggaranController::class, 'delete_penyerapan'])->name('delete_penyerapan');
    Route::post('/get_penyerapan_byid', [PenyerapanAnggaranController::class, 'get_penyerapan_byid'])->name('get_penyerapan_byid');
    Route::post('/add_warning_penyerapan', [PenyerapanAnggaranController::class, 'add_warning_penyerapan'])->name('add_warning_penyerapan');

    Route::post('/input_coutput', [CapaianOutputController::class, 'input_coutput'])->name('input_coutput');
    Route::post('/delete_coutput', [CapaianOutputController::class, 'delete_coutput'])->name('delete_coutput');
    Route::post('/get_coutput_byid', [CapaianOutputController::class, 'get_coutput_byid'])->name('get_coutput_byid');
    Route::post('/add_warning_coutput', [CapaianOutputController::class, 'add_warning_coutput'])->name('add_warning_coutput');

    Route::post('/add_role', [RoleController::class, 'add_role'])->name('add_role');
    Route::post('/edit_role', [RoleController::class, 'edit_role'])->name('edit_role');
    Route::post('/delete_role', [RoleController::class, 'delete_role'])->name('delete_role');

    Route::post('/add_team', [TimController::class, 'add_team'])->name('add_team');
    Route::post('/edit_team', [TimController::class, 'edit_team'])->name('edit_team');
    Route::post('/delete_team', [TimController::class, 'delete_team'])->name('delete_team');

    Route::post('/add_user', [UserController::class, 'add_user'])->name('add_user');
    Route::post('/edit_user', [UserController::class, 'edit_user'])->name('edit_user');
    Route::post('/delete_user', [UserController::class, 'delete_user'])->name('delete_user');
    Route::post('/edit_role_user', [UserController::class, 'edit_role_user'])->name('edit_role_user');
    Route::post('/get_user_byid', [UserController::class, 'get_user_byid'])->name('get_user_byid');

    Route::post('/add_qna', [QnaController::class, 'add_qna'])->name('add_qna');
    Route::post('/get_qna_byid', [QnaController::class, 'get_qna_byid'])->name('get_qna_byid');
    Route::post('/edit_qna', [QnaController::class, 'edit_qna'])->name('edit_qna');
    Route::post('/delete_qna', [QnaController::class, 'delete_qna'])->name('delete_qna');

    Route::post('/add_knowledge', [KnowledgeController::class, 'add_knowledge'])->name('add_knowledge');
    Route::post('/get_knowledge_byid', [KnowledgeController::class, 'get_knowledge_byid'])->name('get_knowledge_byid');
    Route::post('/edit_knowledge', [KnowledgeController::class, 'edit_knowledge'])->name('edit_knowledge');
    Route::post('/delete_knowledge', [KnowledgeController::class, 'delete_knowledge'])->name('delete_knowledge');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [FeatureController::class, 'home'])->name('home');
});
