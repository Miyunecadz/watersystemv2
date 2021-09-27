<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RootRouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_root_route_should_redirect_to_login_page_if_not_authenticated()
    {
        $response = $this->get('/');
        $response->assertRedirect(route('login'));
    }

    public function test_root_route_should_not_redirect_to_login_page_if_authenticated()
    {
        $user=User::factory()->create();
        $response = $this->actingAs($user)->get('/');
        $response->assertRedirect(route('admin.dashboard'));
    }

}
