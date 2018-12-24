<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectoryRequest;
use App\Http\Resources\Directory\DirectoryResource;
use App\Model\directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DirectoryResource::collection(directory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DirectoryRequest $request)
    {
        $this->validate($request, [

            'filename' => '',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }
         }

        $directory = new directory();
        $directory->name = $request->name;
        $directory->description = $request->description;
        $directory->website = $request->website;
        $directory->email = $request->email;
        $directory->phone_no = $request->phone_no;
        $directory->address = $request->address;
        $directory->filename=json_encode($image);
        $directory->save();
        return response([
            'data' => new DirectoryResource($directory)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function show(directory $directory)
    {
        return new DirectoryResource($directory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function edit(directory $directory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, directory $directory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function destroy(directory $directory)
    {
        //
    }
}
