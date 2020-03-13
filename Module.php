<?php

namespace App\PermissionModule;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Module extends Model
{

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['module_name', 'module_slug'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'status', 'created_at', 'updated_at',
    ];

    public static function getAllModuleWithGroup($modules)
    {
        return self::with('getModuleRoutes')
        /*
        select('modules.id as module_id', 'modules.module_name', 'route_groups.route_group_id', 'route_groups.route_group_label')
        ->join('route_groups', 'modules.id', 'route_groups.module_id')
         */
            ->whereIn('modules.id', $modules)
            ->where(['status' => ACTIVE])
        // ->whereNotIn('route_groups.route_group_id', $routeGroups)
            ->get()
            ->toArray()
        ;

    }

    public function getModuleRoutes()
    {
        return $this->hasMany('App\PermissionModule\RouteGroup', 'module_id', 'id')->with('getRoutes');
    }
    public static function getModuleList($getModuleRequest)
    {
        $name = $getModuleRequest->input('moduleSearch');

        return self::when($name, function ($nameQuery) use ($name) {
            /**
             * if name present then add name filter
             */
            return $nameQuery->where('module_name', 'like', $name . '%');
        })
            ->orderBy($getModuleRequest->get('sort_by'), $getModuleRequest->get('order_by'))
            ->paginate($getModuleRequest->input('length', PERPAGE));
    }
    public static function addModule($request)
    {
        self::create([
            'module_name' => $request->module_name,
            'module_slug' => Str::slug($request->module_name),
        ]);
    }

    public static function getInfoModule($id)
    {
        return self::where('id', $id)->first();
    }
    public static function updateModuleById($request)
    {
        return self::where('id', $request->id)->update([
            'module_name' => $request->edit_module,
            'module_slug' => Str::slug($request->edit_module),
        ]);
    }
}
