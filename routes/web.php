<?php

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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
        Route::get('/', 'IndexController')->name('main.index');
    });

    Route::group(['namespace' => 'App\Http\Controllers\User'], function () {
        Route::group(['middleware' => 'admin'], function () {
            Route::get('users', 'IndexController')->name('users.index');
            Route::delete('users/{user}', 'DestroyController')->name('users.destroy');
            Route::get('users/create', 'CreateController')->name('users.create');
            Route::post('users', 'StoreController')->name('users.store');
        });
    });

    Route::group(['namespace' => 'App\Http\Controllers\Partner'], function () {
        Route::group(['middleware' => 'notClient'], function () {
            Route::group(['middleware' => 'notDriver'], function () {
                Route::get('partners', 'IndexController')->name('partner.index');
            });
        });
        Route::group(['middleware' => 'manager'], function () {
            Route::delete('partners/{partner}', 'DestroyController')->name('partner.destroy');
            Route::get('partners/create', 'CreateController')->name('partner.create');
            Route::post('partners', 'StoreController')->name('partner.store');
        });
    });

    Route::group(['namespace' => 'App\Http\Controllers\Storage'], function () {
        Route::group(['middleware' => 'notClient'], function () {
            Route::group(['middleware' => 'notDriver'], function () {
                Route::get('storage', 'IndexController')->name('storage.index');
            });
        });
    });

    Route::group(['middleware' => 'driver'], function () {
        Route::group(['namespace' => 'App\Http\Controllers\Delivery'], function () {
            Route::group(['namespace' => 'Available'], function () {
                Route::get('available', 'IndexController')->name('available.index');
                Route::group(['middleware' => 'available'], function () {
                    Route::get('available/{order}', 'ShowController')->name('available.show');
                    Route::group(['middleware' => 'chooseTruck'], function () {
                        Route::patch('available/{order}', 'ChooseController')->name('available.choose');
                    });
                });
            });

            Route::patch('delivery/start', 'StartController')->name('delivery.start');
            Route::get('delivery', 'IndexController')->name('delivery.index');
            Route::get('delivery/all', 'AllDeliveryController')->name('delivery.all');
            Route::get('delivery/{order}', 'ShowController')->name('delivery.show');
            Route::patch('delivery/{order}/end', 'EndController')->name('delivery.end');
        });
    });

    Route::group(['namespace' => 'App\Http\Controllers\Truck'], function () {
        Route::get('trucks', 'IndexController')->name('truck.index');

        Route::group(['middleware' => 'driver'], function () {
            Route::patch('trucks/{truck}', 'ChooseController')->name('truck.choose');
        });

        Route::group(['middleware' => 'manager'], function () {
            Route::get('trucks/create', 'CreateController')->name('truck.create');
            Route::post('trucks', 'StoreController')->name('truck.store');
        });
    });

    Route::group(['namespace' => 'App\Http\Controllers\Order'], function () {
        Route::group(['middleware' => 'worker'], function () {
            Route::group(['namespace' => 'Coming'], function () {
                Route::get('orders/comings', 'IndexController')->name('coming.index');
                Route::get('orders/comings/{coming}', 'ShowController')->name('coming.show');
                Route::group(['middleware' => 'execute'], function () {
                    Route::get('orders/comings/{coming}/execute', 'ExecuteController')->name('coming.execute');
                });
            });

            Route::group(['namespace' => 'Realization'], function () {
                Route::get('orders/realizations', 'IndexController')->name('realization.index');
                Route::get('orders/realizations/{realization}', 'ShowController')->name('realization.show');
                Route::group(['middleware' => 'execute', 'middleware' => 'count'], function () {
                    Route::get('orders/realizations/{realization}/execute', 'ExecuteController')->name('realization.execute');
                });
            });
        });
        Route::group(['middleware' => 'manager'], function () {
            Route::get('orders', 'IndexController')->name('order.index');
            Route::group(['middleware' => 'reviewDelete'], function () {
                Route::delete('orders/{order}', 'DestroyController')->name('order.destroy');
            });
            Route::get('orders/create', 'CreateController')->name('order.create');
            Route::post('orders', 'StoreController')->name('order.store');
            Route::post('orders/{order}', 'StoreOrderController')->name('order.storeOrder');
            Route::group(['middleware' => 'reviewEdit'], function () {
                Route::get('orders/{order}/edit', 'EditController')->name('order.edit');
            });
        });
        Route::group(['namespace' => 'Product', 'middleware' => 'clientManager'], function () {
            Route::delete('orders/{order}/product/{product}', 'DestroyController')->name('product.destroy');
        });
    });

    Route::group(['middleware' => 'client'], function () {
        Route::group(['namespace' => 'App\Http\Controllers\Information'], function () {
            Route::get('information', 'IndexController')->name('information.index');
            Route::patch('information', 'StoreController')->name('information.store');
            Route::get('information/edit', 'EditController')->name('information.edit');
        });

        Route::group(['namespace' => 'App\Http\Controllers\ClientOrder'], function () {
            Route::get('clientOrder', 'IndexController')->name('clientOrder.index');
            Route::get('clientOrder/create', 'CreateController')->name('clientOrder.create');
            Route::group(['middleware' => 'reviewEdit'], function () {
                Route::get('clientOrder/{order}/edit', 'EditController')->name('clientOrder.edit');
            });

            Route::group(['middleware' => 'reviewDelete'], function () {
                Route::delete('clientOrder/{order}', 'DestroyController')->name('clientOrder.destroy');
            });
            Route::post('clientOrder', 'StoreController')->name('clientOrder.store');
            Route::post('clientOrder/{order}', 'StoreOrderController')->name('clientOrder.storeOrder');
        });
    });
});
