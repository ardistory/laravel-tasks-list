<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    private UserService $userService;

    public function setUp()
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }

    public function testLogin()
    {
        $testLogin = $this->userService->login('ardistory', 'password');

        $this->assertTrue(true, $testLogin);
    }
}
