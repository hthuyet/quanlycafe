<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use Lang;
use Redirect;
use Sentinel;
use View;
use Route;
use Illuminate\Http\Request;

class GroupsController extends JoshController {

    /**
     * Show a list of all the groups.
     *
     * @return View
     */
    public function index() {
        // Grab all the groups
        $roles = Sentinel::getRoleRepository()->all();

        // Show the page
        return View('admin/groups/index', compact('roles'));
    }

    /**
     * Group create.
     *
     * @return View
     */
    public function create() {
        // Show the page
        return View('admin/groups/create');
    }

    /**
     * Group create form processing.
     *
     * @return Redirect
     */
    public function store(GroupRequest $request) {

        if ($role = Sentinel::getRoleRepository()->createModel()->create([
            'name' => $request->get('name'),
            'slug' => str_slug($request->get('name'))
                ])
        ) {
            // Redirect to the new group page
            return Redirect::route('groups')->with('success', Lang::get('groups/message.success.create'));
        }

        // Redirect to the group create page
        return Redirect::route('create/group')->withInput()->with('error', Lang::get('groups/message.error.create'));
    }

    /**
     * Group update.
     *
     * @param  int $id
     * @return View
     */
    public function edit($id = null) {


        try {
            // Get the group information
            $role = Sentinel::findRoleById($id);
        } catch (GroupNotFoundException $e) {
            // Redirect to the groups management page
            return Redirect::route('groups')->with('error', Lang::get('groups/message.group_not_found', compact('id')));
        }

        // Show the page
        return View('admin/groups/edit', compact('role'));
    }

    /**
     * Group update form processing page.
     *
     * @param  int $id
     * @return Redirect
     */
    public function update($id = null, GroupRequest $request) {
        try {
            // Get the group information
            $group = Sentinel::findRoleById($id);
        } catch (GroupNotFoundException $e) {
            // Redirect to the groups management page
            return Rediret::route('groups')->with('error', Lang::get('groups/message.group_not_found', compact('id')));
        }

        // Update the group data
        $group->name = $request->get('name');

        // Was the group updated?
        if ($group->save()) {
            // Redirect to the group page
            return Redirect::route('groups')->with('success', Lang::get('groups/message.success.update'));
        } else {
            // Redirect to the group page
            return Redirect::route('update/group', $id)->with('error', Lang::get('groups/message.error.update'));
        }
    }

    /**
     * Delete confirmation for the given group.
     *
     * @param  int $id
     * @return View
     */
    public function getModalDelete($id = null) {
        $model = 'groups';
        $confirm_route = $error = null;
        try {
            // Get group information
            $role = Sentinel::findRoleById($id);


            $confirm_route = route('delete/group', ['id' => $role->id]);
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = Lang::get('admin/groups/message.group_not_found', compact('id'));
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }

    /**
     * Delete the given group.
     *
     * @param  int $id
     * @return Redirect
     */
    public function destroy($id = null) {
        try {
            // Get group information
            $role = Sentinel::findRoleById($id);

            // Delete the group
            $role->delete();

            // Redirect to the group management page
            return Redirect::route('groups')->with('success', Lang::get('groups/message.success.delete'));
        } catch (GroupNotFoundException $e) {
            // Redirect to the group management page
            return Redirect::route('groups')->with('error', Lang::get('groups/message.group_not_found', compact('id')));
        }
    }

    //Add by thuyetlv
    private $lenghRoute = 3;
    private $twoRoute = 2;

    public function getPermission($id) {
        try {
            $role = Sentinel::findRoleById($id);

            $routeCollection = Route::getRoutes();
            $tmp = array();
            foreach ($routeCollection as $value) {
//                var_dump($value->getName(), " -> " . $value->getPrefix());
//                echo "<br />";
                if (strpos($value->getPrefix(), "/admin") !== false) {
                    $tmp = explode(".", $value->getName());
                    if (count($tmp) == 1) {
                        $tmp = explode("/", $value->getName());
                    }
                    if (count($tmp) == $this->lenghRoute) {
                        //3 level
                        $obj = new \stdClass();
                        $obj->id = $value->getName();
                        $obj->section = $tmp[1];
                        $obj->value = $tmp[2];
                        $obj->selected = false;
                        if (isset($role->permissions[$value->getName()]) && $role->permissions[$value->getName()] === true) {
                            //
                            $obj->selected = true;
                        }
                        $arrayRoutes[] = $obj;
                    } else if (count($tmp) == $this->twoRoute) {
                        //2 level
                        $obj = new \stdClass();
                        $obj->id = $value->getName();
                        $obj->section = $tmp[0];
                        $obj->value = $tmp[1];
                        $obj->selected = false;
                        if (isset($role->permissions[$value->getName()]) && $role->permissions[$value->getName()] === true) {
                            //
                            $obj->selected = true;
                        }
                        $arrayRoutes[] = $obj;
                    }
                }
            }
            return response()->json(compact('arrayRoutes'));
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json(['error' => trans('message.systemError')], Config::get('constants.ERROR_CODE.SYSTEM_ERROR'));
        }
    }

    public function savePermissions(Request $request) {
        try {
            $param = $request->all();
            $id = $param["id"];
            $name = $param["name"];
            $listRoutes = $param["listRoutes"];
            $permissions = array();
            foreach ($listRoutes as $route) {
                $permissions[$route] = true;
            }
            if (!$id) {
                //Tao moi
                $role = Sentinel::getRoleRepository()->createModel()->create([
                    'name' => $name,
                    'slug' => str_slug($name, "-"),
                    'permissions' => $permissions
                ]);
            } else {
                $role = \Sentinel::findRoleById($id);
                $role->name = $name;
                $role->slug = str_slug($name, "-");
                $role->permissions = $permissions;
                $role->save();

                $users = $role->users()->with('roles')->get();
                foreach ($users as $user) {
                    $user->permissions = $role->permissions;
                    $user->save();
                }
            }

            return response()->json(compact('role'));
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json(['error' => trans('message.systemError')], Config::get('constants.ERROR_CODE.SYSTEM_ERROR'));
        }
    }

}
