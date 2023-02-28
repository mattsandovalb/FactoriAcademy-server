<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Courses::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $courses = new Courses();

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'tech' => 'required',
            'poster' => 'required',
            'level' => 'required'
        ]);

        $courses->title = $request ->title;
        $courses->description = $request ->description;
        $courses->tech = $request ->tech;
        $courses->poster = $request ->poster;
        $courses->level = $request ->level;

        $courses->save();

        return $courses;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses, $id)
    {
        $courses = Courses::find($id);

        return $courses;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $courses, $id)
    {
        $courses = Courses::find($id);

        $courses->title = $request ->title;
        $courses->description = $request ->description;
        $courses->tech = $request ->tech;
        $courses->poster = $request ->poster;
        $courses->level = $request ->level;

        $courses->update();

        return $courses;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $courses, $id)
    {
        $courses = Courses::find($id);
    
        if (is_null($courses)) {
            return response()->json('No se pudo realizar la peticion', 404);
        } else {
            $courses->delete();
            return response()->noContent();
            return ('Successful Deleted');
        }
    }
    }

