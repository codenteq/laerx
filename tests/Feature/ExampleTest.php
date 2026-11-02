<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        // routes/web.php redirects "/" to the login page, so the
        // original 200 assertion failed on Laravel 10 already.
        $this->get('/')->assertRedirect('/login');
    }
}
