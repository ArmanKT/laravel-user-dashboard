<?php

use Carbon\Carbon;
use Spatie\Permission\Models\Permission;

/**
 * Write code on Method
 *
 * @return response()
 */
if (!function_exists('convertYmdToMdy')) {
    function convertYmdToMdy($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }
}

/**
 * Write code on Method
 *
 * @return response()
 */
if (!function_exists('convertMdyToYmd')) {
    function convertMdyToYmd($date)
    {
        return Carbon::createFromFormat('m-d-Y', $date)->format('Y-m-d');
    }


}

// Relations
if (!function_exists('getpermissionGroups')) {
    function getpermissionGroups()
    {
        $permission_groups = Permission::select('group_name as name')->groupBy('group_name')->get();
        return $permission_groups;
    }
}
if (!function_exists('getpermissionsByGroupName')) {
    function getpermissionsByGroupName($group_name)
    {
        $permissions = Permission::select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
        return $permissions;
    }
}
if (!function_exists('roleHasPermissions')) {
    function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
        }
        return $hasPermission;
    }
}