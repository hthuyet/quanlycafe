<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Chi extends Model {

    //
    protected $table = 'chi';
    protected $fillable = ['ngay_thang_chi', 'tien', 'noi_dung'];
    public $timestamps = false;

    public static function findByPaging($search, $order, $dir, $paging = 10) {
        $query = DB::table('chi');
        if ($search) {
            $query->where(function($wQuery) use ($search) {
                $wQuery->orWhere("ngay_thang_chi", "LIKE", "%" . $search . "%")
                        ->orWhere("tien", "LIKE", "%" . $search . "%")
                        ->orWhere("noi_dung", "LIKE", "%" . $search . "%");
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
