<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// Гость
// Главная страница
Route::get("/", [MainController::class, "main_page"]);

// Регистрация
Route::post("/register", [AuthController::class, "register"]);

// Авторизация
Route::post("/login", [AuthController::class, "login"]);

// Пользователь
// Выход из авторизации
Route::get("/logout", [AuthController::class, "logout"]);

// Страница личного кабинета
Route::get("/profile", [UserController::class, "profile_page"]);


// Добавление заявки
Route::post("/profile/app-add", [UserController::class, "app_add"]);

// Удаление заявки
Route::get("/profile/app/{app_id}/delete", [UserController::class, "app_delete"]);

// Администратор
// Страница администратора
Route::get("/admin/", [AdminController::class, "admin_page"]);

// Добавление категории
Route::post("/admin/category/add", [AdminController::class, "category_add"]);

// Удаление категории
Route::post("/admin/category/delete", [AdminController::class, "category_delete"]);

// Одобрение заявки
Route::post("/admin/app/approve", [AdminController::class, "app_approve"]);

// Отклонение заявки
Route::post("/admin/app/reject", [AdminController::class, "app_reject"]);
