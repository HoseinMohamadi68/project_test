<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Http\Response;
use Tests\TestCase;

class CourseTest extends TestCase
{

    /**
     * @test
     */
    public function UserCanSeeAllCourse()
    {
        Course::factory()->count(5)->create();

        $this->getJson(
            route('courses.index'),
        )->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function UserCanSeeCourseWithId()
    {
        $course =  Course::factory()->count(5)->create();
        $number=rand(0,4);

        $response = $this->getJson(
            route('courses.show', $course[$number]->getId()),
        )->assertStatus(Response::HTTP_OK);

        $this->assertEquals($course[$number]->getId(), $response->getOriginalContent()->getId());
        $this->assertEquals($course[$number]->getTitle(), $response->getOriginalContent()->getTitle());
        $this->assertEquals($course[$number]->getAmount(), $response->getOriginalContent()->getAmount());
        $this->assertEquals($course[$number]->getRatio(), $response->getOriginalContent()->getRatio());

    }

    /**
     * @test
     */
    public function UserCantDeleteCourseWithWrongId()
    {

        $this->deleteJson(
            route('courses.destroy', 15),
        )->assertStatus(Response::HTTP_NOT_FOUND);;
    }


    /**
     * @test
     */
    public function CanNotCreateCourseCheckRequiredFieldParameter()
    {

        $response = $this->postJson(
            route('courses.store'),
            []
        )->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        /** @var array $content */
        $course = $response->getOriginalContent()->toArray();
        $this->assertArrayHasKey(Course::TITLE, $course);
        $this->assertArrayHasKey(Course::AMOUNT, $course);
        $this->assertArrayHasKey(Course::RATIO, $course);
    }

    /**
     * @test
     */
    public function CanNotCreateCourseCheckFieldParameter()
    {
        $response = $this->postJson(
            route('courses.store'),
            [
                Course::TITLE => $this->faker->numberBetween(1,100),
                Course::AMOUNT => $this->faker->title,
                Course::RATIO => $this->faker->title
            ]
        )->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        /** @var array $content */
        $course = $response->getOriginalContent()->toArray();
        $this->assertArrayHasKey(Course::TITLE, $course);
        $this->assertArrayHasKey(Course::AMOUNT, $course);
        $this->assertArrayHasKey(Course::RATIO, $course);
    }


    /**
     * @test
     */
    public function testUserCanUpdateCourse()
    {
        $course = Course::factory()->create();
        $courseUpdate = Course::factory()->make();

        $response = $this->putJson(
            route('courses.update', $course->getId()),
            [
                Course::TITLE => $courseUpdate->getTitle(),
                Course::AMOUNT => $courseUpdate->getAmount(),
                Course::RATIO => $courseUpdate->getRatio()
            ]
        )->assertStatus(Response::HTTP_OK);

        $this->assertEquals($course->getTitle(), $response->getOriginalContent()->getTitle());
        $this->assertEquals($course->getAmount(), $response->getOriginalContent()->getAmount());
        $this->assertEquals($course->getRatio(), $response->getOriginalContent()->getRatio());
    }

    /**
     * @test
     */
    public function filterCourseByHasTitle()
    {
        $firstCourse = Course::factory()->create();
        $secondCourse = Course::factory()->create();

        $response = $this->getJson(route('courses.index') . '?title=' . $firstCourse->getTitle())
            ->assertStatus(Response::HTTP_OK);

        $this->assertTrue(
            $response->getOriginalContent()->contains(Course::TITLE, $firstCourse->getTitle())
        );
        $this->assertFalse(
            $response->getOriginalContent()->contains(Course::TITLE, $secondCourse->getTitle())
        );
    }

    /**
     * @test
     */
    public function filterCourseByHasAmount()
    {
        $firstCourse = Course::factory()->create();
        $secondCourse = Course::factory()->create();

        $response = $this->getJson(route('courses.index') . '?amount=' . $firstCourse->getAmount())
            ->assertStatus(Response::HTTP_OK);

        $this->assertTrue(
            $response->getOriginalContent()->contains(Course::AMOUNT, $firstCourse->getAmount())
        );
        $this->assertFalse(
            $response->getOriginalContent()->contains(Course::AMOUNT, $secondCourse->getAmount())
        );
    }
}
