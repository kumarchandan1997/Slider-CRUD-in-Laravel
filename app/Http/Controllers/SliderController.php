<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $sliders= Slider::All();
     return view('backend.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new slider;
            $image=$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('slideimage',$imagename);
            $data->image=$imagename;

            
               //this code use for upload data in database
            $data->title=$request->title;
            $data->des=$request->des;
            
            
            $data->save();
             //this code is used to after submit form it show message for success
            return redirect('slider_index')->with('success','slider added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        // $slider = Slider::All();
        // return view('slider/show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::where('id', $id)->first();
        // dd($product);
        return view('backend.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider ,$id)
    {
        $data=slider::find($id);
            $image=$request->image;
            if($image)
            {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('slideimage',$imagename);
            $data->image=$imagename;
            }
            //this code is used to update field data in database
            $data->title=$request->title;
            $data->des=$request->des;
            $data->save();
            return redirect('slider_index')->with('success','slider added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider ,$id)
    {
        $data=slider::find($id);
        $data->delete();
        return redirect('slider_index');
    }
}
