<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolesPermissions extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles_permissions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['roles_id', 'routes_id'];

    public static function getRoutesByPermissions($permissionsId) {
        return RolesPermissions::where('roles_id', '=', $permissionsId)->get();
    }

}
