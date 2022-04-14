<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::name("auth.")->prefix("account")->group(function () {
    
    Route::name("guest.")->middleware("guest")->group(function () {
        Route::get("register", [RegisteredUserController::class, "create"])->name("register");
        Route::post("register", [RegisteredUserController::class, "store"])->name("register.post");

        Route::get("signin", [AuthenticatedSessionController::class, "create"])->name("signin");
        Route::post("signin", [AuthenticatedSessionController::class, "store"])->name("signin.post");

        Route::name("password.")->prefix("password")->group(function () {
            Route::get("forgot", [PasswordResetLinkController::class, "create"])->name("request");
            Route::post("forgot", [PasswordResetLinkController::class, "store"])->name("request.post");
            Route::get("reset/{token}", [NewPasswordController::class, "create"])->name("reset");
            Route::post("reset", [NewPasswordController::class, "store"])->name("reset.post");
        });
    });

    Route::name("secure.")->middleware("auth")->group(function () {
        Route::name("verification")->prefix("verify")->group(function () {
            Route::get("", [EmailVerificationPromptController::class, "__invoke"])->name("notice");
            Route::get("{id}/{hash}", [VerifyEmailController::class, "__invoke"])->middleware(["signed", "throttle:6,1"])->name("verify");
        });
        Route::post("email/verification-notification", [EmailVerificationNotificationController::class, "store"])
            ->middleware("throttle:6,1")->name("verification.send");
        Route::name("password.")->prefix("password")->group(function () {
            Route::get("confirm", [ConfirmablePasswordController::class, "show"])->name("confirm");
            Route::post("confirm", [ConfirmablePasswordController::class, "store"])->name("confirm.post");
        });
        Route::post("signout", [AuthenticatedSessionController::class, "destroy"])->name("signout");
    });

});
