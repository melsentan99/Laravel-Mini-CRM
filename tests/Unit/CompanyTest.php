<?php

namespace Tests\Unit;

use App\Models\Employee;
use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase as TestCase;

class CompanyTest extends TestCase
{
	use WithFaker;
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
    public function test_create_company()
    {
        $company = factory(Company::class)->create();
        $this->get(route('company.store', $company->id))
            ->assertStatus(302);
    }

    public function testCreateCompany()
    {
        $data = [
            'name' => $this->faker->sentence,
            'email' => $this->faker->sentence,
            'website' => $this->faker->sentence,
        ];
        $this->post(route('company.store'), $data)
            ->assertStatus(419)
            ->assertJson($data);
    }


    /** @test */
    public function test_update_company()
    {
        $company = factory(Company::class)->create();
        $this->get(route('company.update', $company->id))
            ->assertStatus(405);
    }



    /** @test */
    public function test_show_company()
    {
        $company = factory(Company::class)->create();
        $this->get(route('company.show', $company->id))
            ->assertStatus(302);
    }


    /** @test */
    public function test_destroy_company()
    {
        $company = factory(Company::class)->create();
        $this->delete(route('company.destroy', $company->id))
            ->assertStatus(302);
    }
}
