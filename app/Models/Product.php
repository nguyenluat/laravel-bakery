<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = 'product';
    protected $fillable = ['name', 'image', 'listimage', 'price', 'sale_price', 'description', 'status', 'category_id'];

    /** 
     * 
    * Phương Thức Thêm Mới Sản Phẩm
    * @return product object hoặc null
    *
    * */



public function category()
    {
        return $this->hasOne(Category::class ,'id','category_id');
    }

    public function add() {





        $netJSON="";
        if(request()->hasFile('photos'))
        {
            $files = request()->file('photos');
            $arr= array();
            foreach ($files as $file_list) {
                $filename =$file_list->getClientOriginalName();
                $file_list->move(public_path('uploads'),$filename);
                array_push($arr,$filename);
            }
            $netJSON = json_encode($arr);
        }

        
        $file2 = request()->upload;
        $file_name = $file2->getClientOriginalName();
        $file2->move(public_path('uploads'),$file_name);

        $model = $this->create([
            'name' => request()->name,
            'price' => request()->price,
            'sale_price' => request()->sale_price,
            'description' => request()->description,
            'status' => request()->status,
            'category_id' => request()->category_id,
            'image' => $file_name,
            'listimage' => $netJSON
        ]);
        


        return $model;
    }
    /** 
     * 
    * Phương Thức Chỉnh Sửa Mới Sản Phẩm
    * @return product object hoặc null
    *
    * */

    public function update_record(){

        
        $netJSON="";
        if(request()->hasFile('photos'))
        {
            $files = request()->file('photos');
            $arr= array();
            foreach ($files as $file_list) {
                $filename =$file_list->getClientOriginalName();
                $file_list->move(public_path('uploads'),$filename);
                array_push($arr,$filename);
            }
            $netJSON = json_encode($arr);
        }

        
        $file2 = request()->upload;
        $file_name = $file2->getClientOriginalName();
        $file2->move(public_path('uploads'),$file_name);

        $model = $this->update([
            'name' => request()->name,
            'price' => request()->price,
            'sale_price' => request()->sale_price,
            'description' => request()->description,
            'status' => request()->status,
            'category_id' => request()->category_id,
            'image' => $file_name,
            'listimage' => $netJSON
        ]);
        return $model;
    }

    /** 
     * 
    * Phương Thức Xóa Sản Phẩm
    * @return product object hoặc null
    *
    * */
    public function order_details() {
        return $this->hasMany(Orderdetail::class,'product_id','id');
    }
    public function getdetailpro($id){
        $prodetail=Product::find($id);
        return $prodetail;
    }
    public function search_pro(){
    
        $model = Product::where('name','like','%'.request()->key.'%')
                            ->orWhere('price',request()->key)
                            ->orWhere('sale_price',request()->key)
                            ->paginate(9);
         return $model;
    }
    public function search_pro_price(){
        $proprice = Product::whereBetween('price', [request()->price_amount_start, request()->price_amount_end])->paginate(12);
		return $proprice;
    }
    public function check_category()
   {
     if ($this->category->status==1) {
       return true;
     }else {
       return false;
     }
   }
}
