<?php

namespace App\Http\Controllers\API\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Course::query();

        if ($title = $request->input('title')) {
            $query->whereRaw("title LIKE '%" . $title . "%'");
        }

        if ($description = $request->input('description')) {
            $query->whereRaw("description LIKE '%" . $description . "%'");
        }

        if ($start_date = $request->input('start_date')) {
            $query->whereDate('created_at', '>=', $start_date);
        }

        if ($end_date = $request->input('end_date')) {
            $query->whereDate('created_at', '<=', $end_date);
        }

        $limit = $request->input('limit', 10);
        $page = $request->input('page', 1);

        $result = $query->paginate($limit, ['*'], 'page', $page);

        return new CourseCollection($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
