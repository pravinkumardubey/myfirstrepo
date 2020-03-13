<?php

namespace App\Http\Controllers\Admin;

use App\Helper\PermissionHelper as PHelper;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Requests\Web\Permission\RestrictUser;
use App\PermissionModule\Module;
use App\PermissionModule\Role;
use App\PermissionModule\RoleModule;
use App\PermissionModule\UserRestrictionPermission;
use App\User;
use Helper;
use Illuminate\Http\Request;
use Response;

class PermisssionController extends AdminBaseController
{
    /**
     * This function will return all modules for user
     * from Where that view authority can set user permission
     * @param integer $userId
     * @return view
     */
    public function getAllPermissionForUsers(int $userId)
    {
        $userData = User::findOrFail($userId, ['user_type', 'id']);
        if ($userData->user_type == User::ADMIN) {
            /**
             * admin permission can not be set
             */
            //abort(401, ["Something went wrong"]);
            //return view('errors.401', "message");

        } else {
            /**
             * return permission to users
             */
            $permissions = PHelper::getAllPermission($userData);
            return view('admin.permission.permission', ['permissions' => $permissions, 'userID' => $userId]);
        }
    }
    /**
     * This function will update user level permission
     *
     * @param RestrictUser $restrictRequest
     * @return void
     */
    public function restrictPermissionForUsers(RestrictUser $restrictRequest)
    {

        UserRestrictionPermission::updateOrInsert(
            [
                'user_id' => $restrictRequest->get('user_id'),
            ],
            $restrictRequest->all()
        );
        return Response::sucessJson(__('user.permission.update'));
    }
    public function index()
    {
        return view('admin.permission.index');

    }

    public function roleIndex()
    {
        /**
         * This function will load role index
         */
        return view('admin.permission.role');
    }
    public function createRole(Request $request)
    {
        /**
         * this function will create load
         */
        Role::addRole($request);

    }
    /**
     * Undocumented function
     *
     * @param Request $getRoleRequest
     * @return void
     */
    public function listRole(Request $getRoleRequest)
    {
        Helper::handleDataTableQuery($getRoleRequest);
        $schoolData = Role::getRoleList($getRoleRequest)->toArray();
        return Response::dataTableJson($schoolData, $getRoleRequest->input('draw'));
    }
    public function getinfoRole(Request $request)
    {
        $id = $request->id;
        /**
         * this function will create load
         */
        $res = Role::getInfoRole($id);
        return response()->json([
            'id' => $res->id, 'role' => $res->role,
        ]);
    }
    public function IndexModule()
    {
        /**
         * This function will load role index
         */
        return view('admin.permission.module');
    }
    public function createModule(Request $request)
    {
        /**
         * this function will create load
         */
        Module::addModule($request);
    }
    public function listModule(Request $getModuleRequest)
    {
        /**
         * this function will create load
         */
        Helper::handleDataTableQuery($getModuleRequest);
        $schoolData = Module::getModuleList($getModuleRequest)->toArray();
        return Response::dataTableJson($schoolData, $getModuleRequest->input('draw'));

    }
    public function getinfoModule(Request $request)
    {
        $id = $request->id;
        /**
         * this function will create load
         */
        $res = Module::getInfoModule($id);
        return response()->json([
            'id' => $res->id, 'module' => $res->module_name,
        ]);
    }
    /**
     * this line for code will save and update role
     *
     * @param Request $request
     * @return responce
     */
    public function updateRole(Request $request)
    {
        return Role::updateRoleById($request);
    }/**
     * this line for code will save and update module
     *
     * @param Request $request
     * @return responce
     */
    public function updateModule(Request $request)
    {
        return Module::updateModuleById($request);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function roleAssignModule()
    {
        $roles = Role::all();
        $modules = Module::all();
        return view('admin.permission.module-assignment', ['roles' => $roles, 'modules' => $modules]);
    }
    public function saveModuleAssignment(Request $request)
    {
        RoleModule::addRoleModule($request);
    }
    /**
     * Undocumented function
     *
     * @param Request $getModuleRequest
     * @return void
     */
    public function listRoleModule(Request $getModuleRequest)
    {
        Helper::handleDataTableQuery($getModuleRequest);
        $roleModulelData = RoleModule::getAllRoleModule($getModuleRequest)->toArray();
        return Response::dataTableJson($roleModulelData, $getModuleRequest->input('draw'));
    }
    /**
     * Undocumented function
     *
     * @param [int] $id
     * @return void
     */
    public function deleteRoleModule($id)
    {
        RoleModule::deleteRecord($id);
    }

    public function IndexRoutes()
    {
        /**
         * This function will load route index
         */
        $modules = Module::all();
        return view('admin.permission.routes', ['modules' => $modules]);
    }
    public function addRoutes()
    {
        //
    }
}
