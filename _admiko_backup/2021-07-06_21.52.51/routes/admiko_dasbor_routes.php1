<?php
/** Admiko routes. This file will be overwritten on page import. Don't add your code here! **/
/**
 * @author     Thank you for using localhost.test
 * @copyright  2020-2120
 * @link       https://localhost.test
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Dasbor;
use Illuminate\Support\Facades\Route;

/**Klien**/
Route::delete("klien/destroy", [KlienController::class,"destroy"])->name("klien.delete");
Route::resource("klien", KlienController::class)->parameters(["klien" => "klien"]);
/**Mobil**/
Route::post("mobil/admiko_many_files_store", [MobilController::class,"admiko_many_files_store"])->name("mobil.admiko_many_files_store");
Route::delete("mobil/destroy", [MobilController::class,"destroy"])->name("mobil.delete");
Route::resource("mobil", MobilController::class)->parameters(["mobil" => "mobil"]);
/**Sewa**/
Route::delete("sewa/destroy", [SewaController::class,"destroy"])->name("sewa.delete");
Route::resource("sewa", SewaController::class)->parameters(["sewa" => "sewa"]);
/**Testimoni**/
Route::delete("testimoni/destroy", [TestimoniController::class,"destroy"])->name("testimoni.delete");
Route::resource("testimoni", TestimoniController::class)->parameters(["testimoni" => "testimoni"]);
/**Kategori**/
Route::delete("kategori/destroy", [KategoriController::class,"destroy"])->name("kategori.delete");
Route::resource("kategori", KategoriController::class)->parameters(["kategori" => "kategori"]);
/**Merek**/
Route::delete("merek/destroy", [MerekController::class,"destroy"])->name("merek.delete");
Route::resource("merek", MerekController::class)->parameters(["merek" => "merek"]);
