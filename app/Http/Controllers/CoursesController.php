<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursesController extends Controller
{


    public function __construct()
    {  
        $this->middleware('auth:api', ['except' => ['index', 'show']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::all();

        return response()->json([
            'status' => true,
            'course' => $courses,
        ]);
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

        return response()->json([
            'status' => true,
            'message' => "Course Created successfully!",
            'courses' => $courses
        ], 200);

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
   public function update(Request $request, $id)
    {
        $courses = Courses::find($id);
 
        if (!$courses) {
            return response()->json(['message' => 'No se encontró el curso solicitado'], 404);
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'tech' => 'required',
            'poster' => 'required',
            'level' => 'required'
        ]);
        $courses->update([
            'title' => $request->title,
            'description' => $request->description,
            'tech' => $request->tech,
            'poster' => $request->poster,
            'level' => $request->level
        ]);

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
/* 
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
 
    if ($request->hasFile('poster')) {
        $file = $request->file('poster');
        $filename = time() . '-' . $file->getClientOriginalName();
        $destinationPath = public_path('images/poster');
        $uploadSuccess = $file->move($destinationPath, $filename);
        $courses->poster = '/images/poster/'.$filename;
    }

    $courses->title = $request->title;
    $courses->description = $request->description;
    $courses->tech = $request->tech;
    $courses->level = $request->level;

    $courses->save();

    return $courses;
} */