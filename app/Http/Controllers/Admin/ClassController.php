<?php

namespace Eoola\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Eoola\Http\Requests;
use Eoola\Http\Controllers\Controller;
use Eoola\Http\Requests\ClassManagement;

use Eoola\Class;

class ClassController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classs = Class::paginate(20);
        return view('admin.class.index',[
            'classs' => $classs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.class.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassManagement $request)
    {
        $class = new Class;
        $class->name = $request->name;
        $class->save();
        return redirect()->route('admin.class-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Class::find($id);
        return view('admin.class.show',[
            'class' => $class,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Class::find($id);
        return view('admin.class.edit',[
            'class' => $class,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassManagement $request, $id)
    {
        $class = Class::find($id);
        $class->name = $request->name;
        $class->save();
        return redirect()->route('admin.class-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Class::find($id)->delete();
        return redirect()->route('admin.class-management.index');
    }   
}
