<?php

namespace App\PermissionModule;

use Illuminate\Database\Eloquent\Model;

class RoleModule extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['role_id', 'module_ids'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * laravel mutator convert value in string form
     *
     * @param string $value
     * @return string
     */
    public function getModuleIdsAttribute($value)
    {
        return json_decode($value, true);
    }
    /**
     * This function will return all role Restriction Permissions
     *
     * @return void
     */
    public function roleRestrictionPermissions()
    {
        return $this->hasOne('App\PermissionModule\RoleRestrictionPermission', 'role_id', 'role_id');
    }

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @return void
     */
    public static function addRoleModule($request)
    {
        $modules = json_encode($request['module_id']);
        self::create([
            'role_id' => $request->role_id,
            'module_ids' => $modules,
        ]);
    }

    /**
     * select all rolemodel function
     *
     * @param [type] $getModuleRequest
     * @return void
     */
    public static function getAllRoleModule($getModuleRequest)
    {
        $name = $getModuleRequest->input('generalSearch');
        return self::when($name, function ($nameQuery) use ($name) {
            /**
             * if name present then add name filter
             */
            return $nameQuery->where('module_ids', 'like', $name . '%');
        })
            ->orderBy($getModuleRequest->get('sort_by'), $getModuleRequest->get('order_by'))
            ->paginate($getModuleRequest->input('length', PERPAGE));
    }
    public static function deleteRecord($id)
    {
        self::find($id)->delete();
    }
}
