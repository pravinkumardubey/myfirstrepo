<?php

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

/**
 * layout test routes
 */
Route::get('/layout-tabel', function () {
    return view('core-layout/layout-table');
});

Route::get('/layout-form', function () {
    return view('core-layout/layout-form');
});

/**
 * app routes
 */
Route::get('/', function () {
    return view('welcome');
});

Route::post('userLogin', 'HomeController@userLogin')->name('userLogin');
Route::group(['middleware' => ['auth']], function () {

    Route::get('flusharchive', 'CommonController@flusharchive')->name('flusharchive');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'school'], function () {
        Route::get('report', 'SchoolReportController@index')->name('schoolReport');
    });

    Route::group(['prefix' => 'get-all'], function () {

        Route::get('tls', 'CommonController@getAllTLsByCountry')->name('getAllTLsByCountry');
        Route::get('lls', 'CommonController@getAllLLsForTL')->name('getAllLLsForTL');
        Route::get('ll/schools', 'CommonController@getAllSchoolsForLL')->name('getAllSchoolsForLL');
        Route::get('country/schools', 'CommonController@getAllSchoolsForCountry')->name('getAllSchoolsForCountry');

        Route::get('teachers', 'SchoolController@getallSchoolTeachers')->name('getallSchoolTeachers');
        Route::get('school/{id}/students', 'CommonController@getAllSchoolStudents')->name('getAllSchoolStudent');
        Route::get('/school/{id}/teachers', 'CommonController@getAllSchoolTeachers')->name('getAllSchoolTeachers');

    });

    /***********************Module Country***************************/
    Route::group(['prefix' => 'country'], function () {
        Route::get('/', 'CountryController@index')->name('ViewCountry');
        Route::post('list', 'CountryController@listCountry')->name('ListCountry');
    });

    Route::group(['prefix' => 'territory-licensee'], function () {
        /***********************Module Territory Licensee***************************/
        Route::get('/', 'TerritoryLicenseeController@index')->name('ViewTL');
        Route::post('create', 'TerritoryLicenseeController@createTL')->name('createTL');
        Route::patch('update', 'TerritoryLicenseeController@updateTL')->name('updateTL');
        Route::post('list', 'TerritoryLicenseeController@listTL')->name('ListTL');
        Route::get('getinfo', 'TerritoryLicenseeController@getinfo')->name('editTL');
    });

    Route::group(['prefix' => 'parent'], function () {
        /***********************Parent Module************************** */
        Route::get('/', 'ParentController@index')->name('viewParent');
        Route::post('create', 'ParentController@createParent')->name('createParent');
        Route::patch('update', 'ParentController@updateParent')->name('updateParent');
        Route::get('list', 'ParentController@listParent')->name('listParent');
        Route::delete('delete', 'ParentController@deleteParent')->name('deleteParent');
        Route::patch('status', 'ParentController@statusParent')->name('statusParent');
        Route::get('getinfo', 'ParentController@getParentInfo')->name('getParentInfo');

        Route::get('students/{parentId}', 'ParentController@getParentStudentsView')->name('getParentStudentsIndex');
        Route::get('students/{parentId}/list', 'ParentController@getParentStudentsList')->name('getParentStudentsList');

    });

    Route::group(['prefix' => 'school'], function () {
        /***********************School Module***************************/
        Route::get('/', 'SchoolController@index')->name('viewSchool');
        Route::post('create', 'SchoolController@createSchool')->name('createSchool');
        Route::patch('update', 'SchoolController@updateSchool')->name('updateSchool');
        Route::post('list', 'SchoolController@listSchool')->name('listSchool');
        Route::delete('delete', 'SchoolController@deleteSchool')->name('deleteSchool');
        Route::patch('status', 'SchoolController@statusSchool')->name('statusSchool');
        Route::get('getinfo', 'SchoolController@getSchoolInfo')->name('getSchoolInfo');
    });
    /*********************** Module Location Licensee************************** */
    Route::group(['prefix' => 'location-licensee'], function () {
        Route::get('/', 'LocationLicenseeController@index')->name('ViewLL');
        Route::post('create', 'LocationLicenseeController@createLL')->name('createLL');
        Route::patch('update', 'LocationLicenseeController@updateLL')->name('updateLL');
        Route::post('list', 'LocationLicenseeController@listLL')->name('listLL');
        Route::get('getinfo', 'LocationLicenseeController@getInfo')->name('getInfo');
    });

    Route::get('getcountrycode', 'CommonController@getCountryCode')->name('getCountryCode');

    /**
     * Routes definitions for Staff of school to store,list,edit and delete
     */
    Route::group(['prefix' => 'staff'], function () {
        Route::post('create', 'StaffController@createStaff')->name('createStaff');
        Route::patch('update', 'StaffController@updateStaff')->name('updateStaff');
        Route::delete('delete', 'StaffController@deleteStaff')->name('deleteStaff');
        Route::get('getinfo', 'StaffController@getStaffInfo')->name('getStaffInfo');
        Route::post('list/{id?}', 'StaffController@listUserStaff')->name('listUserStaff')->where('id', '[0-9]+');
        Route::get('{user_id?}', 'StaffController@index')->name('viewStaff')->where('id', '[0-9]+');
    });

    /**
     * Routes definitions for Students to store,list,edit and delete
     */
    Route::group(['prefix' => 'student'], function () {
        Route::get('/', 'StudentController@index')->name('viewStudent');
        Route::get('create/{school_id?}', 'StudentController@createStudentView')->name('createStudentView');
        Route::post('create', 'StudentController@createStudent')->name('createStudent');
        Route::patch('update', 'StudentController@updateStudent')->name('updateStudent');
        Route::post('list', 'StudentController@listStudent')->name('listStudent');
        Route::delete('delete', 'StudentController@deleteStudent')->name('deleteStudent');
        Route::get('getinfo', 'StudentController@getStudentInfo')->name('getStudentInfo');
        Route::get('search', 'CommonController@searchStudentByMtId')->name('getStudentInfo');
        Route::get('{studentId}/parents', 'StudentController@getStudentParentsView')->name('getStudentParentsView');
        Route::get('{studentId}/tagged-parents', 'StudentController@getTaggedParents')->name('getTaggedParents');
        Route::post('untag-parent', 'StudentController@untagParent')->name('untagParent');
        Route::post('tag-parent', 'StudentController@tagParent')->name('tagParent');
    });

    Route::group(['prefix' => 'bulk'], function () {
        Route::post('activate', 'CommonController@activateUser')->name('bulkActivate');
        Route::post('deactivate', 'CommonController@deactivateUser')->name('bulkDeactivate');
        /**
         * only admin has This route permission
         */
        Route::post('archive', 'CommonController@archiveUser')->name('archiveUser');
    });

    Route::group(['prefix' => 'uploadcsv'], function () {
        Route::post('student', 'CommonController@uploadCsvFile')->name('uploadCsvFileStudent');
        Route::post('class', 'CommonController@uploadCsvFile')->name('uploadCsvFileClass');
        Route::post('teacher', 'CommonController@uploadCsvFile')->name('uploadCsvFileTeacher');
    });
/**
 * this route define to permission
 */
    Route::group(['prefix' => 'permission'], function () {
        Route::get('/', 'PermisssionController@index')->name('dashboardPermission');
        Route::get('/role', 'PermisssionController@roleIndex')->name('role');
        Route::get('/addRole', 'PermisssionController@createRole')->name('addRole');
        Route::post('/listRole', 'PermisssionController@listRole')->name('listRole');
        Route::get('/module', 'PermisssionController@IndexModule')->name('module');
        Route::get('/addModule', 'PermisssionController@createModule')->name('addModule');
        Route::get('/listModule', 'PermisssionController@listModule')->name('listModule');
        Route::get('getinforole', 'PermisssionController@getinfoRole');
        Route::get('updateRole', 'PermisssionController@updateRole')->name('updateRole');
        Route::get('getinfomodule', 'PermisssionController@getinfoModule');
        Route::get('updateModule', 'PermisssionController@updateModule')->name('updateModule');
        Route::get('listRoleModule', 'PermisssionController@listRoleModule')->name('listRoleModule');
        Route::get('delete-role-module/{id}', 'PermisssionController@deleteRoleModule');
        Route::get('route-permission', 'PermisssionController@IndexRoutes')->name('routePermission');
        Route::get('addRoutes', 'PermisssionController@addRoutes')->name('addRoutes');

        Route::get('/module-assignment', 'PermisssionController@roleAssignModule')->name('module-assignment');
        Route::get('save_module_ssignment', 'PermisssionController@saveModuleAssignment')->name('saveModuleAssignment');
        Route::get('get/{userId}', 'PermisssionController@getAllPermissionForUsers')->name('getAllUserLevelPermission')->where('userId', '[0-9]+');
        Route::post('restrict', 'PermisssionController@restrictPermissionForUsers')->name('setAllUserLevelPermission');

    });

});
