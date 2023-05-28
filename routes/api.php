<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\loginController;
use App\Http\Controllers\Surat\AdminSuratController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix" => "surat"], function(){


    Route::group(["prefix"=> "admin"], function(){
        Route::post("/daftar_spsm", [AdminSuratController::class, "manage_sps"]);
        Route::delete("/daftar_spsm", [AdminSuratController::class, "manage_sps_delete"]);
    });
});

Route::post('/login', [loginController::class, 'login']);