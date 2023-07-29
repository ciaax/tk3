<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
 
class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'deskripsi', 'jenis', 'stok', 'hargabeli', 'hargajual', 'img_path'];

    public static function summaryItemsSales() {
        $items = DB::select("SELECT 
                                i.`nama`,
                                i.`stok`,
                                i.`hargabeli`,
                                i.`hargajual`,
                                SUM(o.`qty`) AS qty_total
                                FROM items i
                                JOIN orders o ON o.`item_id` = i.`id`
                                JOIN sales s ON s.`id` = o.`sales_id`
                                WHERE s.`submit_user_id` IS NOT NULL
                                GROUP BY i.`id`, i.`nama`, i.`stok`, i.`hargabeli`, i.`hargajual`");

        return $items;
    }
}