<?php

namespace Tests\Unit;

use App\Models\Employee;
use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Auth\AuthenticationException;
use Tests\TestCase as TestCase;

class EmployeeTest extends TestCase
{
    use WithFaker;
    // use DatabaseMigrations;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }


    /** @test */
    public function test_create_employee()
    {
        $post = factory(Employee::class)->create();
        $this->get(route('employee.store', $post->id))
            ->assertStatus(302);
    }


    /** @test */
    public function test_update_employee()
    {
        $employee = factory(Employee::class)->create();
        $this->delete(route('employee.update', $employee->id))
            ->assertStatus(405);
    }



    /** @test */
    public function test_show_employee()
    {
        $post = factory(Employee::class)->create();
        $this->get(route('employee.show', $post->id))
            ->assertStatus(302);
    }


    /** @test */
    public function test_destroy_employee()
    {
        $employee = factory(Employee::class)->create();
        $this->delete(route('employee.destroy', $employee->id))
            ->assertStatus(302);
    }

}

