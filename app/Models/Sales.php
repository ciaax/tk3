<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class Sales extends Model
{

    use HasFactory;

    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'submit_user_id'];

    public static function getAllSales()
    {
        try {
            //code...
            $sales = \DB::select("SELECT 
                                    s.*,
                                    u.name as customer_name,
                                    su.name as staff_name
                                    FROM sales s
                                    JOIN users u ON u.id = s.user_id
                                    LEFT JOIN users su ON su.id = s.submit_user_id");
            foreach ($sales as $key => $val) {
                $sales[$key]->orders = \DB::select("SELECT 
                * FROM orders WHERE sales_id = ?", [$sales[$key]->id]);
                $sales[$key]->total = 0;
                if(count($sales[$key]->orders))
                foreach ($sales[$key]->orders as $keyOrder => $val) {
    
                    foreach ($sales[$key]->orders as $keyOrder => $val) {
                        $item = \DB::select("SELECT 
                        * FROM items WHERE id = ?", [$sales[$key]->orders[$keyOrder]->item_id]);
                        $sales[$key]->orders[$keyOrder]->items = count($item)?$item[0]:(new stdClass());
                    }
                }
            }
    
            return $sales;
        } catch (\Throwable $th) {

           return [];
        }
    }

    public static function getSale($sales_id)
    {
        try {
            $sales = \DB::select("SELECT 
                                s.*,
                                u.name as customer_name
                                FROM sales s
                                JOIN users u ON u.id = s.user_id
                                WHERE s.id = ?", [$sales_id]);

        foreach ($sales as $key => $val) {
            $sales[$key]->orders = \DB::select("SELECT 
            * FROM orders WHERE sales_id = ?", [$sales[$key]->id]);
            $sales[$key]->total = 0;
            if(count($sales[$key]->orders))
            foreach ($sales[$key]->orders as $keyOrder => $val) {
                $item = \DB::select("SELECT 
                * FROM items WHERE id = ?", [$sales[$key]->orders[$keyOrder]->item_id]);
                $sales[$key]->orders[$keyOrder]->items = count($item)?$item[0]:(new stdClass());
            }
        }

        return $sales[0];
        } catch (\Throwable $th) {
            $customObject = new stdClass();
            $customObject->orders = []; 
            return $customObject;
        }
        
    }
}
