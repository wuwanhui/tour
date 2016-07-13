<?php

use App\Http\Controllers;

Route::auth();

Route::get('api/v1/index', 'ApiController@index');


/**
 * 主页
 */
Route::get('/', 'HomeController@index');

/**
 * 安装
 */
Route::any('/install', 'InstallController@index');


Route::resource('api/v1', 'WeixinController', ['middleware' => 'weixin']);


Route::group(['prefix' => 'wechat', 'middleware' => ['weixin']], function () {
    Route::any('/', 'WechatController@index');
});
/**
 * 后台管理
 */
Route::group(['prefix' => 'manage', 'namespace' => 'Manage', 'middleware' => ['manage']], function () {

    /**
     * 主页
     */
    Route::get('/', function () {
        return view('manage.main');
    });

    /**
     * 主页
     */
    Route::get('/home', function () {
        return view('manage.home');
    });
    /**
     * 系统设置
     */
    Route::group(['prefix' => 'ar'], function () {

        Route::get('/add', 'ARController@targetAdd', ['model' => 'system', 'menu' => 'enterprise']);
        Route::get('/delete/{targetId?}', 'ARController@tardelete', ['model' => 'system', 'menu' => 'enterprise']);
        Route::get('/info/{targetId?}', 'ARController@targetInfo', ['model' => 'system', 'menu' => 'enterprise']);
        Route::get('/list', 'ARController@targetsList', ['model' => 'system', 'menu' => 'enterprise']);
    });
    /**
     * 系统设置
     */
    Route::group(['prefix' => 'system', 'namespace' => 'System'], function () {

        Route::get('/', function () {
            return Redirect::to('/manage/system/user');
        });
        /**
         * 企业管理
         */
        Route::group(['prefix' => 'enterprise'], function () {
            Route::get('/', function () {
                return Redirect::to('/manage/system/enterprise/list');
            });
            Route::get('/list/{pid?}', 'EnterpriseController@index', ['model' => 'system', 'menu' => 'enterprise']);
            Route::get('/create', 'EnterpriseController@getCreate', ['model' => 'system', 'menu' => 'enterprise']);
            Route::post('/create', 'EnterpriseController@postCreate', ['model' => 'system', 'menu' => 'enterprise']);
            Route::get('/edit/{id}', 'EnterpriseController@getEdit', ['model' => 'system', 'menu' => 'enterprise']);
            Route::post('/edit', 'EnterpriseController@postEdit', ['model' => 'system', 'menu' => 'enterprise']);
            Route::get('/delete/{id}', 'EnterpriseController@delete', ['model' => 'system', 'menu' => 'enterprise']);
        });

        /**
         * 用户管理
         */
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', function () {
                return Redirect::to('/manage/system/user/list');
            });
            Route::get('/list/{eid?}', 'UserController@index', ['model' => 'system', 'menu' => 'user']);
            Route::any('/create/{eid?}', 'UserController@create', ['model' => 'system', 'menu' => 'user']);
            Route::get('/edit/{id}', 'UserController@getEdit', ['model' => 'system', 'menu' => 'user']);
            Route::post('/edit/{id}', 'UserController@postEdit', ['model' => 'system', 'menu' => 'user']);
            Route::get('/delete/{id}', 'UserController@delete', ['model' => 'system', 'menu' => 'user']);
        });
        /**
         * 权限管理
         */
        Route::group(['prefix' => 'permission'], function () {
            Route::get('/', function () {
                return Redirect::to('/manage/system/permission/list');
            });
            Route::get('/list', 'PermissionController@index', ['as' => 'system.permission', 'model' => 'system', 'menu' => 'permission']);
            Route::get('/create', 'PermissionController@getCreate', ['model' => 'system', 'menu' => 'permission']);
            Route::post('/create', 'PermissionController@postCreate', ['model' => 'system', 'menu' => 'permission']);
            Route::get('/edit/{id}', 'PermissionController@getEdit', ['model' => 'system', 'menu' => 'permission']);
            Route::post('/edit', 'PermissionController@postEdit', ['model' => 'system', 'menu' => 'permission']);
            Route::get('/delete/{id}', 'PermissionController@delete', ['model' => 'system', 'menu' => 'permission']);
        });
        /**
         * 角色管理
         */
        Route::group(['prefix' => 'role'], function () {
            Route::get('/', function () {
                return Redirect::to('/manage/system/role/list');
            });
            Route::get('/list', 'RoleController@index', ['model' => 'system', 'menu' => 'role']);
            Route::get('/create', 'RoleController@getCreate', ['model' => 'system', 'menu' => 'role']);
            Route::post('/create', 'RoleController@postCreate', ['model' => 'system', 'menu' => 'role']);
            Route::get('/edit/{id}', 'RoleController@getEdit', ['model' => 'system', 'menu' => 'role']);
            Route::post('/edit', 'RoleController@postEdit', ['model' => 'system', 'menu' => 'role']);
            Route::get('/permission/{id}', 'RoleController@getPermission', ['model' => 'system', 'menu' => 'role']);
            Route::post('/permission', 'RoleController@postPermission', ['model' => 'system', 'menu' => 'role']);
            Route::get('/delete/{id}', 'RoleController@delete', ['model' => 'system', 'menu' => 'role']);
        });
        /**
         * 基础数据
         */
        Route::group(['prefix' => 'base'], function () {
            Route::get('/', function () {
                return Redirect::to('/manage/system/base/list');
            });
            Route::get('/list/{tid?}', 'BaseDataController@index', ['model' => 'system', 'menu' => 'role']);
            Route::any('/create/{tid}', 'BaseDataController@create', ['model' => 'system', 'menu' => 'role']);


            Route::get('/edit/{id}', 'BaseDataController@getEdit', ['model' => 'system', 'menu' => 'role']);
            Route::post('/edit', 'BaseDataController@postEdit', ['model' => 'system', 'menu' => 'role']);
            Route::get('/delete/{id}', 'BaseDataController@delete', ['model' => 'system', 'menu' => 'role']);

            /**
             * 基础数据
             */
            Route::group(['prefix' => 'type'], function () {
                Route::get('/list', 'BaseDataController@index', ['model' => 'system', 'menu' => 'role']);
                Route::any('/create', 'BaseDataController@createType', ['model' => 'system', 'menu' => 'role']);
                Route::any('/edit/{id}', 'BaseDataController@editType', ['model' => 'system', 'menu' => 'role']);
                Route::get('/delete/{id}', 'BaseDataController@delete', ['model' => 'system', 'menu' => 'role']);
            });
        });

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
});

/**
 * 供应商管理
 */
Route::group(['prefix' => 'supplier', 'namespace' => 'Supplier', 'middleware' => ['supplier']], function () {

    /**
     * 主页
     */
    Route::get('/', function () {
        return view('supplier.main');
    });

    /**
     * 主页
     */
    Route::get('/home', function () {
        return view('supplier.home');
    });

    /**
     * 业务中心
     */
    Route::group(['prefix' => 'business', 'namespace' => 'Business'], function () {

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
    Route::group(['prefix' => 'customer', 'namespace' => 'Customer'], function () {
        /**
         * 主页
         */
        Route::get('/', function () {
            return view('supplier/customer/index', ['model' => 'customer', 'menu' => 'config']);

        });


    });

    /**
     * 微信营销
     */
    Route::group(['prefix' => 'weixin', 'namespace' => 'Weixin'], function () {

        Route::resource('config', 'WeixinConfigController');

        Route::get('/', function () {
            return Redirect::to('supplier/weixin/config');
        });

        /**
         * 权限管理
         */
        Route::group(['prefix' => 'weixin'], function () {
            Route::get('/', 'WeixinController@index');
            Route::get('/send', 'WeixinController@getSend');
            Route::post('/create', 'WeixinController@postCreate');
            Route::get('/edit/{id}', 'WeixinController@getEdit');
            Route::post('/edit', 'WeixinController@postEdit');
            Route::get('/delete/{id}', 'WeixinController@delete');
        });

    });
    /**
     * 财务结算
     */
    Route::group(['prefix' => 'finance', 'namespace' => 'Finance'], function () {

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
    Route::group(['prefix' => 'resources', 'namespace' => 'Resources'], function () {

        /**
         * 主页
         */
        Route::get('/', function () {
            return view('supplier/resources/index', ['model' => 'resources', 'menu' => 'config']);

        });
        /**
         *航空公司
         */
        Route::group(['prefix' => 'airways'], function () {

            Route::get('/', 'AirwaysController@index');
            Route::any('/create', 'AirwaysController@create');
            Route::any('/edit/{id}', 'AirwaysController@edit');
            Route::get('/delete/{id}', 'AirwaysController@delete');

        });

    });

    /**
     * 统计报表
     */
    Route::group(['prefix' => 'report', 'namespace' => 'Report'], function () {


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
    Route::group(['prefix' => 'system', 'namespace' => 'System'], function () {
        Route::get('/', function () {
            return Redirect::to('/supplier/system/config');
        });
        /**
         * 参数设置
         */
        Route::group(['prefix' => 'config'], function () {
            Route::any('/', 'ConfigController@index', ['model' => 'system', 'menu' => 'enterprise']);
        });
        /**
         * 企业管理
         */
        Route::group(['prefix' => 'enterprise'], function () {

            Route::any('/', 'EnterpriseController@index', ['model' => 'system', 'menu' => 'enterprise']);

        });

        /**
         * 部门管理
         */
        Route::group(['prefix' => 'dept'], function () {
            Route::get('/', function () {
                return Redirect::to('/supplier/system/dept/list');
            });
            Route::get('/list/{eid?}', 'DeptController@index', ['model' => 'system', 'menu' => 'user']);
            Route::any('/create/{pid?}', 'DeptController@create', ['model' => 'system', 'menu' => 'user']);
            // Route::post('/create', 'DeptController@postCreate', ['model' => 'system', 'menu' => 'user']);
            Route::get('/edit/{id}', 'DeptController@getEdit', ['model' => 'system', 'menu' => 'user']);
            Route::post('/edit/{id}', 'DeptController@postEdit', ['model' => 'system', 'menu' => 'user']);
            Route::get('/delete/{id}', 'DeptController@delete', ['model' => 'system', 'menu' => 'user']);
        });

        /**
         * 用户管理
         */
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', function () {
                return Redirect::to('/supplier/system/user/list');
            });
            Route::get('/list/{eid?}', 'UserController@index', ['model' => 'system', 'menu' => 'user']);
            Route::any('/create', 'UserController@create', ['model' => 'system', 'menu' => 'user']);
            Route::post('/create', 'UserController@postCreate', ['model' => 'system', 'menu' => 'user']);
            Route::get('/edit/{id}', 'UserController@getEdit', ['model' => 'system', 'menu' => 'user']);
            Route::post('/edit/{id}', 'UserController@postEdit', ['model' => 'system', 'menu' => 'user']);
            Route::get('/delete/{id}', 'UserController@delete', ['model' => 'system', 'menu' => 'user']);
        });
        /**
         * 权限管理
         */
        Route::group(['prefix' => 'permission'], function () {
            Route::get('/', function () {
                return Redirect::to('/supplier/system/permission/list');
            });
            Route::get('/list', 'PermissionController@index', ['as' => 'system.permission', 'model' => 'system', 'menu' => 'permission']);
            Route::get('/create', 'PermissionController@getCreate', ['model' => 'system', 'menu' => 'permission']);
            Route::post('/create', 'PermissionController@postCreate', ['model' => 'system', 'menu' => 'permission']);
            Route::get('/edit/{id}', 'PermissionController@getEdit', ['model' => 'system', 'menu' => 'permission']);
            Route::post('/edit', 'PermissionController@postEdit', ['model' => 'system', 'menu' => 'permission']);
            Route::get('/delete/{id}', 'PermissionController@delete', ['model' => 'system', 'menu' => 'permission']);
        });
        /**
         * 角色管理
         */
        Route::group(['prefix' => 'role'], function () {
            Route::get('/', function () {
                return Redirect::to('/supplier/system/role/list');
            });
            Route::get('/list', 'RoleController@index', ['model' => 'system', 'menu' => 'role']);
            Route::any('/create', 'RoleController@create', ['model' => 'system', 'menu' => 'role']);
            Route::post('/create', 'RoleController@postCreate', ['model' => 'system', 'menu' => 'role']);
            Route::get('/edit/{id}', 'RoleController@getEdit', ['model' => 'system', 'menu' => 'role']);
            Route::post('/edit', 'RoleController@postEdit', ['model' => 'system', 'menu' => 'role']);
            Route::get('/permission/{id}', 'RoleController@getPermission', ['model' => 'system', 'menu' => 'role']);
            Route::post('/permission', 'RoleController@postPermission', ['model' => 'system', 'menu' => 'role']);
            Route::get('/delete/{id}', 'RoleController@delete', ['model' => 'system', 'menu' => 'role']);
        });

        /**
         * 基础数据
         */
        Route::group(['prefix' => 'base'], function () {
            Route::get('/', function () {
                return Redirect::to('/supplier/system/base/list');
            });
            Route::get('/list/{tid?}', 'BaseDataController@index', ['model' => 'system', 'menu' => 'role']);
            Route::any('/create/{tid}', 'BaseDataController@create', ['model' => 'system', 'menu' => 'role']);


            Route::get('/edit/{id}', 'BaseDataController@getEdit', ['model' => 'system', 'menu' => 'role']);
            Route::post('/edit', 'BaseDataController@postEdit', ['model' => 'system', 'menu' => 'role']);
            Route::get('/delete/{id}', 'BaseDataController@delete', ['model' => 'system', 'menu' => 'role']);

            /**
             * 基础数据
             */
            Route::group(['prefix' => 'type'], function () {
                Route::get('/list', 'BaseDataController@index', ['model' => 'system', 'menu' => 'role']);
                Route::any('/create', 'BaseDataController@createType', ['model' => 'system', 'menu' => 'role']);
                Route::any('/edit/{id}', 'BaseDataController@editType', ['model' => 'system', 'menu' => 'role']);
                Route::get('/delete/{id}', 'BaseDataController@delete', ['model' => 'system', 'menu' => 'role']);
            });
        });

    });


    /**
     * 三方对接
     */
    Route::group(['prefix' => 'docking', 'namespace' => 'Docking'], function () {

        /**
         * 参数设置
         */
        Route::get('/', function () {
            return view('supplier/docking/index', ['model' => 'docking', 'menu' => 'config']);

        });

    });

});


