<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = DB::select('select c.id, c.name, c.image, c.courseColor, c.professorColor, c.backgroundColor, c.buttonText, c.buttonLink, c.buttonColor, c.shadow, c.stars, c.created_at, c.updated_at, p.name as professor, l.name as language from courses c inner join professors p on c.professor_id = p.id inner join languages l on c.language_id = l.id order by c.id desc');
        return response()->json($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::create($request->all());
        return response()->json($course, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        // get name professor
        $professor = DB::select('select p.name from courses c inner join professors p on c.professor_id = p.id where c.id = ?', [$course->id]);
        $course->professor = $professor[0]->name;
        // get name language
        $language = DB::select('select l.name from courses c inner join languages l on c.language_id = l.id where c.id = ?', [$course->id]);
        $course->language = $language[0]->name;
        return response()->json($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->update($request->all());
        return response()->json($course, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(null, 204);
    }
}
