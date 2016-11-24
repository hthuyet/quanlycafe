<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SanPham extends Model {

    //
    protected $table = 'sanpham';
    protected $fillable = ['ten', 'gia', 'ghi_chu', 'trang_thai'];
    public $timestamps = false;

    public static function findByPaging($search, $order, $dir, $paging = 10) {
        $query = DB::table('sanpham');
        if ($search) {
            $query->where(function($wQuery) use ($search) {
                $wQuery->orWhere("ten", "LIKE", "%" . $search . "%")
                        ->orWhere("gia", "LIKE", "%" . $search . "%")
                        ->orWhere("ghi_chu", "LIKE", "%" . $search . "%")
                        ->orWhere("trang_thai", "LIKE", "%" . $search . "%");
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
