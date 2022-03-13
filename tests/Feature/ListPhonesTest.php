<?php

namespace Tests\Feature;

use Tests\TestCase;

class PhoneTest extends TestCase
{
    public function test_list_phones_success()
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertViewIs('phones')
            ->assertViewHasAll(['phones', 'countries']);
    }

    public function test_phones_view_with_empty_list()
    {
        $view = $this->view('phones', ['phones' => collect(), 'countries' => collect()]);
        $view->assertSee('No phones to display.');
    }
}
