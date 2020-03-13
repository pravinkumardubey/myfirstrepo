<?php

namespace App\PermissionModule;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role'];
    public $timestamps = false;

    public function GetAssignModules()
    {
        return $this->hasMany('App\PermissionModule\RoleModule', 'role_id', 'id');
    }
    public static function getRoleList($getRoleRequest)
    {
        $name = $getRoleRequest->input('roleSearch');

        return self::when($name, function ($nameQuery) use ($name) {
            /**
             * if name present then add name filter
             */
            return $nameQuery->where('role', 'like', $name . '%');
        })
            ->orderBy($getRoleRequest->get('sort_by'), $getRoleRequest->get('order_by'))
            ->paginate($getRoleRequest->input('length', PERPAGE));
    }
    public static function addRole($request)
    {
        return self::create([
            'role' => $request->role_name,
        ]);
    }
    public static function getInfoRole($id)
    {
        return self::where('id', $id)->first();
    }
    public static function updateRoleById($request)
    {
        return self::where('id', $request->id)->update([
            'role' => $request->edit_role,
        ]);
    }
}
