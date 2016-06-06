<?php


use App\Task;
use Illuminate\Http\Request;

/**
 * 主页
 */
Route::get('/', function () {
    return view('welcome');
});


/**
 * 后台管理
 */
Route::group(['prefix' => 'supplier'], function () {


    /**
     * 主页
     */
    Route::get('/', function () {
        return view('supplier.home');
    });

    /**
     * 业务中心
     */
    Route::group(['prefix' => 'business'], function () {

        /**
         * 主页
         */
        Route::get('/', function () {
            return view('supplier/business/index', ['model' => 'business', 'menu' => 'config']);

        });

    });

    /**
     * 客户关系
     */
    Route::group(['prefix' => 'customer'], function () {
        /**
         * 主页
         */
        Route::get('/', function () {
            return view('supplier/customer/index', ['model' => 'customer', 'menu' => 'config']);

        });



    });
    /**
     * 财务结算
     */
    Route::group(['prefix' => 'finance'], function () {

        /**
         * 主页
         */
        Route::get('/', function () {
            return view('supplier/finance/index', ['model' => 'finance', 'menu' => 'config']);

        });


    });

    /**
     * 资源中心
     */
    Route::group(['prefix' => 'resources'], function () {

        /**
         * 主页
         */
        Route::get('/', function () {
            return view('supplier/resources/index', ['model' => 'resources', 'menu' => 'config']);

        });


    });

    /**
     * 统计报表
     */
    Route::group(['prefix' => 'report'], function () {


        /**
         * 统计报表主页
         */
        Route::get('/', function () {
            return view('supplier/report/index', ['model' => 'report', 'menu' => 'config']);

        });


    });

    /**
     * 系统设置
     */
    Route::group(['prefix' => 'system'], function () {

        /**
         * 参数设置
         */
        Route::get('/', function () {
            return view('supplier/system/config/index', ['model' => 'system', 'menu' => 'config']);

        });
    

    });


    /**
     * 三方对接
     */
    Route::group(['prefix' => 'docking'], function () {

        /**
         * 参数设置
         */
        Route::get('/', function () {
            return view('supplier/docking/index', ['model' => 'docking', 'menu' => 'config']);

        });

    });



    Route::group(['namespace' => 'User'], function () {
        // 控制器在 "App\Http\Controllers\Admin\User" 命名空间下
    });
});


/**
 * 列表
 */
Route::get('/task', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('supplier/user/index', [
        'tasks' => $tasks
    ]);

});


/**
 * 新增
 */
Route::get('/task/create', function () {
    return view('supplier/user/create');

});


/**
 * 新增
 */
Route::post('/task/create', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/task/create')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/task');

});

/**
 * 删除
 */
Route::delete('/task/delete/{id}', function ($id) {
    Task::findOrFail($id)->delete();
    return redirect('/task');
});