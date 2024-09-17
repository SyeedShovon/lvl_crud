<?php

use App\Http\Controllers\ImageCrudController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ImageCrudController::class,'index'])->name('index');
route::get('/add-new-product',[ImageCrudController::class,'add_new_product'])->name('add.product');
route::post('/store-product',[ImageCrudController::class,'store_product'])->name('store.product');
route::get('/edit-product/{id}',[ImageCrudController::class,'edit_product'])->name('edit.product');
route::post('/update-product/{id}',[ImageCrudController::class,'update_product'])->name('update.product');
route::get('/delete-product/{id}',[ImageCrudController::class,'delete_product'])->name('delete.product');