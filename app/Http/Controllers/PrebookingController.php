<?php

namespace App\Http\Controllers;

use App\Models\Prebooking;
use Illuminate\Http\Request;
use Auth;
use File;
use Image;
use DB;
class PrebookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('frontend.prebooking');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $prebooking = new Prebooking;
        
        if(auth()->user() != null){
            
           $prebooking->user_id = auth()->user()->id;
        }

        //multiple images
      $images = array();
      
      if($request->hasFile('image')){
          foreach ($request->file('image') as $key => $image) {
                $imagename = hexdec(uniqid()) . '.' . $image->extension();
                $image->move('public/uploads/preorder', $imagename);
              array_push($images, $imagename);
          }
          $prebooking->image = json_encode($images);
      }

        $prebooking->customer_name = $request->input('customer_name');
        $prebooking->customer_email = $request->input('customer_email');
        $prebooking->customer_mobile = $request->input('customer_mobile');
        $prebooking->item_name = $request->input('item_name');
        $prebooking->description = $request->input('description');
        $prebooking->save();
        
        return redirect()->back()->with('status','Prebooking Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prebooking  $prebooking
     * @return \Illuminate\Http\Response
     */
     public function all_prebooking(Request $request){
        $sort_search =null;
        $prebookings = Prebooking::orderBy('id', 'DESC');
        if ($request->has('search')){
            $sort_search = $request->search;
            $prebookings = $prebookings->where('customer_mobile', 'like', '%'.$sort_search.'%');
        }
        
        $prebookings = $prebookings->paginate(15);
        return view('backend.prebooking.index', compact('prebookings', 'sort_search'));
     }
     
    public function show($id)
    {
        $prebookings = Prebooking::findOrFail($id);
    
        return view('backend.prebooking.show', compact('prebookings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prebooking  $prebooking
     * @return \Illuminate\Http\Response
     */
    public function edit(Prebooking $prebooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prebooking  $prebooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prebooking $prebooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prebooking  $prebooking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('prebooking')->where('prebooking_id', $id);
        Prebooking::destroy($id);
        flash(translate('Prebooking has been deleted successfully'))->warning();
        return redirect()->route('all_prebooking.index');
    }
}
