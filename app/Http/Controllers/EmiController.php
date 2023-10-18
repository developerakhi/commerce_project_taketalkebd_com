<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emi;
use App\Models\Emidetail;
use App\Models\Product;
use Illuminate\Support\Str;
use DB;

class EmiController extends Controller
{
    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_all_emis'])->only('index');
        $this->middleware(['permission:add_emi'])->only('create');
        $this->middleware(['permission:edit_emi'])->only('edit');
        $this->middleware(['permission:delete_emi'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $emis = Emi::orderBy('id', 'DESC');
        if ($request->has('search')){
            $sort_search = $request->search;
            $emis = $emis->where('bank_name', 'like', '%'.$sort_search.'%');
        }
        $emis = $emis->paginate(15);
        return view('backend.product.emis.index', compact('emis', 'sort_search'));
    }
    
    public function view(Request $request,$id)
    {
        
       // $bank = DB::table('banks')->where(id,$id)->first();
        $bank = Emi::findOrFail($id)->first();
        $emis = DB::table('bank_details')->where('banks_id', $bank->id)->get();
        
        return view('backend.product.emis.emidetails.index', compact('bank', 'emis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    
    public function bankStore(Request $request)
    {
        $emis = new Emi;
        $emis->bank_name = $request->bank_name;

        $emis->save();

        flash(translate('Bank has been inserted successfully'))->success();
        return redirect()->route('emis.index');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function emiStore(Request $request)
    {
        $emis = new Emidetail;
        $emis->banks_id = $request->bank_id;
        $emis->monthly = $request->monthly;
        $emis->emi = $request->emi;
        $emis->effective_cost = $request->effective_cost;
        $emis->percentage = $request->percentage;
        

        $emis->save();

        flash(translate('Emi has been inserted successfully'))->success();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    //   return view('backend.product.emis.show', compact('emis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $emis  = Emi::findOrFail($id);
        return view('backend.product.emis.edit', compact('emis'));
    }
    
    public function detailsEdit(Request $request, $id)
    {
        $emis  = Emidetail::findOrFail($id);
        return view('backend.product.emis.emidetails.edit', compact('emis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bankUpdate(Request $request,$id)
    {
        $emis = Emi::findOrFail($id);
        $emis->bank_name = $request->bank_name;
        $emis->save();

        flash(translate('Bank Name has been updated successfully'))->success();
        //return back();
        return redirect()->route('emis.index');
    }
    
    public function bankUpdateDetails(Request $request,$id)
    {
        $emis = Emidetail::findOrFail($id);
        $emis->monthly = $request->monthly;
        $emis->emi = $request->emi;
        $emis->effective_cost = $request->effective_cost;
        $emis->percentage = $request->percentage;
        
        $emis->save();

        flash(translate('Bank Details has been updated successfully'))->success();
        //return back();
        return redirect()->route('emis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('bank_details')->where('banks_id', $id)->delete();
        Emi::destroy($id);

        flash(translate('Bank has been deleted successfully'))->warning();
        return redirect()->route('emis.index');
    }
    
     public function destroyEmi($id)
    {
         DB::table('bank_details')->where('id', $id)->delete();
       
        flash(translate('Bank has been deleted successfully'))->warning();
        return redirect()->back();
    }
    
}
