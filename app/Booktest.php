<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Booktest extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'booktests';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'author', 'description'];

    public static function findByPaging($search, $order, $dir, $paging = 10) {
        $query = DB::table('booktests');
        if ($search) {
            $query->where(function($wQuery) use ($search) {
                $wQuery->orWhere("title", "LIKE", "%" . $search . "%")
                        ->orWhere("author", "LIKE", "%" . $search . "%")
                        ->orWhere("description", "LIKE", "%" . $search . "%");
            });
        }
        if ($order) {
            $query->orderBy($order, $dir);
        }else{
            $query->orderBy('id', 'desc');
        }
        
//        dd($query->toSql());

        return $query->paginate($paging);
    }
}