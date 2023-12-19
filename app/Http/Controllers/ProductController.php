<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function Index(){
        $product=DB::table('products')->get();
        return view('admin.allproducts',compact('product'));
    }




    public function AddProduct(){
        return view('admin.addproduct');
    }


    
    public function StoreProduct(Request $request){

        $data=array();
        $data['name']=$request->name;
        $data['quantity']=$request->quantity;
        $data['price']=$request->price;


        $image = $request->file('product_img');

        if($image){
            $image_name =  Str::random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/products/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success){
                $data['product_img']=$image_url;
                $product=DB::table('products')
                    ->insert($data);

                return Redirect()->back()->with('message', 'Added Successfully' );
            }else{
                return Redirect()->back();
            }
        }else{
            return Redirect()->back();
        }
   
        
    }


    public function EditProduct($id)
    {
        $prod=DB::table('products')->where('id',$id)->first();
        return view('admin.edit_product', compact('prod'));
    }


    public function UpdateProduct(Request $request,$id)
    {


        $data=array();
        
        $data['name']=$request->name;
        $data['quantity']=$request->quantity;
        $data['price']=$request->price;

        $product= DB::table('products')->where('id', $id)->update($data);


        return Redirect()->route('allproducts')->with('message', 'Updated Successfully');

    //     $image = $request->file('product_img');

    //     if ($image) {
    //         $image_name =  Str::random(5);
    //         $ext = strtolower($image->getClientOriginalExtension());
    //         $image_full_name = $image_name . '.' . $ext;
    //         $upload_path = 'public/products/';
    //         $image_url = $upload_path . $image_full_name;
    //         $success = $image->move($upload_path, $image_full_name);
    //         if ($success) {
    //             $data['product_img'] = $image_url;
    //             $img = DB::table('products')->where('id', $id)->first();
    //             $image_path = $img->product_img;
    //             $done = unlink($image_path);
    //             $product= DB::table('products')->where('id', $id)->update($data);


    //                 return Redirect()->route('all.product')->with('message', 'Updated Successfully');
              
    //         }

    //     }else{
    //         $oldphoto = $request->old_photo;
    //         if ($oldphoto) {
    //             $data['product_img'] = $oldphoto;
    //             $user = DB::table('products')->where('id', $id)->update($data);
    //             if ($user) {
    //                 return Redirect()->route('all.product')->with('message', 'Updated Successfully');
    //             } else {
    //                 return Redirect()->back();
    //             }
    //         }

    //     }

     }



     public function DeleteProduct($id)
     {
         $delete=DB::table('products')
             ->where('id',$id)
             ->first();
         $photo=$delete->product_img;
         unlink($photo);
         $dltprod=DB::table('products')
             ->where('id',$id)
             ->delete();
            
             return Redirect()->route('allproducts')->with('message', 'Deleted Successfully');
 
        
 
     }
 
}
