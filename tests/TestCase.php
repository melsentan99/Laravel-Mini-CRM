<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
// use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
	protected $baseUrl = 'http://localhost';

    use CreatesApplication;

    public function loginAsAdmin()
    {
    	$admin = factory(User::class)->create();
    	$this->actingAs($admin);

    	return $admin;
    }
}
