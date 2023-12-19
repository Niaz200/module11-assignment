<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{

    public function Index(){
        $sale=DB::table('invoices')->get();
        return view('admin.allsales',compact('sale'));
    }



    public function SaleProduct(Request $request){
        $productid = $request->id;
        $data=array();
        // $data['productid'] = $request->id;
        $data['name']=$request->name;
        $data['quantity']=$request->qty;
        $data['price']=$request->price;
        $data['product_id']=$request->id;


        $sales=DB::table('invoices')
                ->insert($data);
         
         $result=DB::table('products')
            ->where('id','=',$productid)
            ->decrement('quantity');      
    
            return Redirect()->back()->with('message', 'Added Successfully' );   

        
    }


    public function DeleteSale(Request $request)
    {
        // $delete=DB::table('invoices')
        //     ->where('id',$id)
        //     ->first();
      
            
        // $dltprod=DB::table('invoices')
        //     ->where('id',$id)
        //     ->delete();


         $delete=DB::table('invoices')
            ->where('id','=',$request->id)
            ->delete();
           
            return Redirect()->route('allsales')->with('message', 'Deleted Successfully');

       

    }
}
