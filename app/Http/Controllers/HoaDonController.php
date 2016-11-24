<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\HoaDon;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;
use Route;
use Log;
use Sentinel;
use Config;

class HoaDonController extends Controller {

    public function index() {
        return view('admin.hoadon.index');
    }

    /**
     * Delete confirmation for the given Route.
     *
     * @param  int      $id
     * @return View
     */
    public function getModalDelete($id = null) {
        $error = '';
        $model = '';
        $confirm_route = route('admin.hoadon.delete', ['id' => $id]);
        return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
    }

    /**
     * Delete the given Route.
     *
     * @param  int      $id
     * @return Redirect
     */
    public function getDelete($id = null) {
        $route = HoaDon::destroy($id);

        // Redirect to the group management page
        return redirect('admin/hoadon')->with('success', Lang::get('message.success.delete'));
    }
    
    
    public function getAjax(Request $request) {
        try {
            $search = $request->get("search");
            $order = $request->get("order");
            $limit = $request->get("limit");
            if ($search && isset($search["value"]) && $search["value"]) {
                $search = $search["value"];
            } else {
                $search = "";
            }
            if ($order && isset($order["0"]) && $order["0"]) {
                $column = $order["0"]["column"];
                $dir = $order["0"]["dir"];

                if ($column == 0) {
                    $column = "id";
                } else if ($column == 1) {
                    $column = "title";
                } else if ($column == 2) {
                    $column = "author";
                } else if ($column == 3) {
                    $column = "description";
                }
            }
            $lstHoaDon = HoaDon::findByPaging($search, $column, $dir, $limit);

            $rtn = array(
                "total" => $lstHoaDon->total(),
                "data" => $lstHoaDon->items(),
            );
            return response()->json(compact('rtn'));
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json(['error' => trans('message.systemError')], 411);
        }
    }
    
    public function saveHoaDon(Request $request) {
        try {
            $param = $request->all();
            if (!isset($param["id"]) || !$param["id"]) {
                //create
                $sanpham = HoaDon::create($param);

                $success = Lang::get('message.success.create');
            } else {
                //edit
                $sanpham = HoaDon::findOrFail($param["id"]);
                $sanpham->update($param);
                $success = Lang::get('message.success.update');
            }
            return response()->json(compact('sanpham', 'success'));
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json(['error' => trans('message.systemError')], 411);
        }
    }

}
