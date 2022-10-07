<?php

namespace App\Http\Controllers;

use App\Filters\Contacts\CourseFilter;
use App\Http\Requests\CourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    /**
     * @param CourseFilter $filters Filters.
     * @param Request      $request Request.
     *
     * @return AnonymousResourceCollection
     */
    public function index(CourseFilter $filters, Request $request): AnonymousResourceCollection
    {
        return CourseResource::collection(Course::filter($filters)->paginate($this->getPageSize($request)));
    }

    /**
     * @param CourseRequest $request CourseRequest.
     *
     * @return CourseResource
     */
    public function store(CourseRequest $request): CourseResource
    {
        $currency = Course::createObject(
            [
                $request->get(Course::TITLE),
                $request->get(Course::AMOUNT),
                $request->get(Course::RATIO),
            ]
        );

        return new CourseResource($currency);
    }

    /**
     * @param Course $course Course Object Model.
     *
     * @return CourseResource
     */
    public function show(Course $course): CourseResource
    {
        return new CourseResource($course);
    }

    /**
     * @param CourseRequest $request Request.
     * @param Course        $course  Course Object Model.
     *
     * @return CourseResource
     */
    public function update(CourseRequest $request, Course $course): CourseResource
    {
        $course->updateObject(
            [
                $request->get(Course::TITLE),
                $request->get(Course::AMOUNT),
                $request->get(Course::RATIO),
            ]
        );

        return new CourseResource($course);
    }

    /**
     * @param Course $course Course.
     *
     * @return JsonResponse
     */
    public function destroy(Course $course): JsonResponse
    {
        try {
            $course->delete();

            return $this->getResponse([], Response::HTTP_NO_CONTENT);
        } catch (\Exception $exception) {
            Log::error('Delete Course Error : ' . $exception->getMessage());

            return $this->getResponse([], Response::HTTP_CONFLICT);
        }
    }
}
