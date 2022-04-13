<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Blog;
use App\Models\Banner;
use DB;
use Auth;
use App\Cart;
use Illuminate\Contracts\Session\Session;
use PHPUnit\Framework\Constraint\Count;

class FrontendController extends Controller
{
    public function index()
	{
		
		
		$baner = Banner::where('status',1)->get();
	    $blog = Blog::limit(3)->orderBy('id','DESC')->get();
		$products = Product::limit(6)->orderBy('id','DESC')->get();
		$ind_product = Product::limit(2)->where('sale_price','>','0')->orderBy('id','DESC')->get();
		$ind_products = Product::limit(2)->where('sale_price','>','0')->orderBy('id','ASC')->get();
	   return view('frontend.index',compact('products','blog','baner','ind_product','ind_products'));
	}
	 public function about()
	{
	   return view('frontend.about');
	}
	 public function errer()
	{
	   return view('frontend.404');
	}
	public function blog()
	{

		$blog = Blog::where('status',1)->orderBy('name','ASC')->paginate(6);
	   return view('frontend.blog',compact('blog'));
	}
	public function blog_detail($id)
	{
		$blog = Blog::find($id);
	   return view('frontend.blog_detail',compact('blog'));
	}
	public function checkout()
	{
	   return view('frontend.checkout');
	}
	public function contact()
	{
	   return view('frontend.contact');
	}
	public function category()
	{
		$category = Category::where('status',1)->orderBy('name','ASC')->get();
	   return view('frontend.product',compact('category'));
	}
	public function products($id)
	{
		$category = Category::where('status',1)->orderBy('name','ASC')->get();
		$product = Product::where('category_id',$id)->paginate(9);
		$set_products = Product::limit(3)->orderBy('id','DESC')->get();
	   return view('frontend.products',compact('product','category','set_products'));
	}
	public function gallery()
	{
		$gallery = Gallery::limit(12)->orderBy('id','DESC')->get();
	   return view('frontend.gallery',compact('gallery'));
	}
	public function product()
	{
		$category = Category::where('status',1)->orderBy('name','ASC')->get();
		$products = Product::limit(9)->orderBy('id','DESC')->get();
		$product= Product::where('status', 1)->paginate(9);
		$set_products = Product::limit(3)->orderBy('id','DESC')->get();
		
	   return view('frontend.product',compact('product','category','set_products'));
	   
	}
	public function product_detail(Product $products,Request $request, $id)
	{
		$products = Product::all();
		$prodetail = $products->find($id);
		$imgLists = json_decode($prodetail->listimage);
		$category=Category::where('id',$prodetail->category_id)->first();
		$product_related=Product::where('category_id',$category->id)->get();
		return view('frontend.product_detail',compact('prodetail','imgLists','products','product_related'));
	}
	public function logins ()
	{
	   return view('frontend.logins');
	}
	public function registers ()
	{
	   return view('frontend.registers');
	}
	public function viewcart()
	{
	   return view('frontend.viewcart');
	}
	public function AddCart(Request $req,$id){
		
		$product = DB::table('products')->where('id',$id)->first();
		if($product != null){
		   $oldCart = Session('Cart') ? Session('Cart') : null;
		   $newCart = new Cart($oldCart);
		   $newCart->AddCart($product,$id);
		   
		   $req->Session()->put('Cart',$newCart);
		}
		return view('frontend.cart');	
	}
	public function DeleteItemCart(Request $req,$id){	
	
		$oldCart = Session('Cart') ? Session('Cart') : null;
		$newCart = new Cart($oldCart);
		$newCart->DeleteItemCart($id);	
		if(Count( $newCart->products) > 0){
			$req->Session()->put('Cart',$newCart);   
		}
		else{
			$req->Session()->forget('Cart');
		}
		return view('frontend.cart');
	    }	
	public function DeleteItemviewCart(Request $req,$id){
		$oldCart = Session('Cart') ? Session('Cart') : null;
		$newCart = new Cart($oldCart);
		$newCart -> DeleteItemviewCart($id);	
		if(Count( $newCart->products) > 0){
			$req->Session()->put('Cart',$newCart);   
		}
		else{
			$req->Session()->forget('Cart');
		}
		return view('frontend.list-cart');
		}	
	public function SaveItemviewCart(Request $req, $id, $quanty){
		$oldCart = Session('Cart') ? Session('Cart') : null;
		$newCart = new Cart($oldCart);
		$newCart -> UpdateItemviewCart($id, $quanty);	
		$req->Session()->put('Cart',$newCart);
		return view('frontend.list-cart');
	}
	public function viewcartpost(){
		$id=request()->id;
		$quanty=request()->quantity;


		$product = DB::table('products')->where('id',$id)->first();
		if($product != null){
		   $oldCart = Session('Cart') ? Session('Cart') : null;
		   $newCart = new Cart($oldCart);
		   $newCart->AddCart($product,$id,$quanty);
		   request()->Session()->put('Cart',$newCart);
		}
		return view('frontend.cart');
	}
    public function search()
	{
		$category = Category::where('status',1)->orderBy('name','ASC')->get();
		$set_products = Product::limit(3)->orderBy('id','DESC')->get();
	   $price=explode('-',request()->price);
	   
		
	   $min_price=trim($price['0'],'$');
	   $max_price=trim($price['1'],' $');
	   $productes=Product::whereBetween('price',[$min_price,$max_price])->paginate(9);
	   
	   return view('frontend.searchPrice',compact('productes','category','set_products'));

	}
	public function getSearchPro(Product $product,Request $request) {
		$product = $product->search_pro();
		$category = Category::where('status',1)->orderBy('name','ASC')->get();
		$products = Product::limit(9)->orderBy('id','DESC')->get();
		$set_products = Product::limit(3)->orderBy('id','DESC')->get();
        if ($product) {
            return view('frontend.product',compact('product','category','products','set_products'));
        }else {
            return redirect()->back()->with('error','The Product You Are Looking For Does Not Exist');
        }
    }
    
									
}


?>