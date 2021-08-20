<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

use Tests\TestCase;

class LoginPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_user_can_login_using_the_login_form()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password')
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        
        $response->assertRedirect('/home');
    }    
    
    public function test_user_can_not_access_admin_page()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password')
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->get('/admin/users');
        
        $response->assertRedirect('/home');
    }

    public function test_user_can_access_admin_page()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password')
        ]);

        Role::create(['name' => 'admin']);

        $adminRole = Role::where('name', 'admin')->first();
        $user->roles()->attach($adminRole);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/admin/users');
        
        $response->assertSeeText('Users');
    }

    public function test_user_can_not_access_viewer_page()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password')
        ]);

        Role::create(['name' => 'admin']);
        
        $adminRole = Role::where('name', 'admin')->first();
        $user->roles()->attach($adminRole);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->get('/view');
        
        $response->assertRedirect('/home');
    }

}
