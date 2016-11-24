<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Ban extends Model {

    //
    protected $table = 'ban';
    protected $fillable = ['ten', 'danh_muc_ban', 'trang_thai', 'ghi_chu'];
    public $timestamps = false;

    public static function findByPaging($search, $order, $dir, $paging = 10) {
        $query = DB::table('ban');
        if ($search) {
            $query->where(function($wQuery) use ($search) {
                $wQuery->orWhere("ten", "LIKE", "%" . $search . "%")
                        ->orWhere("danh_muc_ban", "LIKE", "%" . $search . "%")
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
