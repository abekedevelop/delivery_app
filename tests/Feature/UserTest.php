<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_registration_failMessage()
    {
        $response = $this->call('POST', '/api/v1/register');

        $response->assertSee('The login field is required.');
        $response->assertSee("The password field is required.");
        $response->assertSee("The region i d field is required.");
        $response->assertStatus(422);
    }

    public function test_login_fail()
    {
        $response = $this->call('POST', '/api/v1/login');

        $response->assertSee('The login field is required.');
        $response->assertSee('The password field is required.');

        $response->assertStatus(422);
    }
}
