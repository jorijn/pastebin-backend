<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomepageTest extends TestCase
{
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response
            ->assertStatus(200)
            ->assertSee('Pastebin API');
    }
}
