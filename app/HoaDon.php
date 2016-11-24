<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class HoaDon extends Model {

    //
    protected $table = 'hoadon';
    protected $fillable = ['ngay_thanh_toan', 'tien', 'ban_id', 'trang_thai', 'ghi_chu', 'giam_gia'];
    public $timestamps = false;

    public static function findByPaging($search, $order, $dir, $paging = 10) {
        $query = DB::table('hoadon');
        if ($search) {
            $query->where(function($wQuery) use ($search) {
                $wQuery->orWhere("ngay_thanh_toan", "LIKE", "%" . $search . "%")
                        ->orWhere("tien", "LIKE", "%" . $search . "%")
                        ->orWhere("trang_thai", "LIKE", "%" . $search . "%")
                        ->orWhere("ban_id", "LIKE", "%" . $search . "%");
            });
        }
        if ($order) {
            $query->orderBy($order, $dir);
        } else {
            $query->orderBy('id', 'desc');
        }

        return $query->paginate($paging);
    }

}
