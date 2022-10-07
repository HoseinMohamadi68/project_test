<?php

namespace Tests\Unit;

use App\Interfaces\Models\Contacts\CourseInterface;
use App\Models\Course;
use Tests\TestCase;

class CourseUnitTest extends TestCase
{
    /**
     * @test
     */
    public function createCourse()
    {
        $course = Course::factory()->create();
        $courseCreate = Course::createObject(
            [
                Course::TITLE => $course->getTitle(),
                Course::AMOUNT => $course->getAmount(),
                Course::RATIO => $course->getRatio(),
            ]
        );

        $this->assertTrue($courseCreate instanceof CourseInterface);
        $this->assertEquals($courseCreate->getTitle(), $course->getTitle());
        $this->assertEquals($courseCreate->getAmount(), $course->getAmount());
        $this->assertEquals($courseCreate->getRatio(), $course->getRatio());

        $this->assertDatabaseHas(
            Course::TABLE,
            [
                Course::TITLE => $course->getTitle(),
                Course::AMOUNT => $course->getAmount(),
                Course::RATIO => $course->getRatio(),
            ]
        );

    }

    /**
     * @test
     */
    public function updateCourse()
    {
        $course = Course::factory()->create();
        $updatedCourse = Course::factory()->make();

        $course->update(
            [
                Course::TITLE => $updatedCourse->getTitle(),
                Course::AMOUNT => $updatedCourse->getAmount(),
                Course::RATIO => $updatedCourse->getRatio(),
            ]
        );


        $this->assertTrue($course instanceof CourseInterface);
        $this->assertEquals($updatedCourse->getTitle(), $course->getTitle());
        $this->assertEquals($updatedCourse->getAmount(), $course->getAmount());
        $this->assertEquals($updatedCourse->getRatio(), $course->getRatio());

        $this->assertDatabaseHas(
            Course::TABLE,
            [
                Course::TITLE => $updatedCourse->getTitle(),
                Course::AMOUNT => $updatedCourse->getAmount(),
                Course::RATIO => $updatedCourse->getRatio(),
            ]
        );
    }
}
