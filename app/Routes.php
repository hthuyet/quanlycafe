<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routes extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'routes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'path'];

    public static function getRoutesByPermissions($permissionsId) {
        return RolesPermissions::where('roles_id', '=', $permissionsId)->get();
    }

}
