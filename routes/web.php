<?php


Route::get("products", "Products@index", "auth");
Route::get("products/create", "Products@create", "auth");
Route::post("products/create", "Products@save", "auth");
Route::get("products/edit", "Products@edit", "auth");
Route::post("products/edit", "Reviews@update", "auth");


Route::get("register", "Auth@register");
Route::post("register", "Auth@registerPost");

Route::get("login", "Auth@login");
Route::post("login", "Auth@loginPost");


Route::post("log-out", "Auth@logOut");





