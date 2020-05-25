<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Role;

class RoleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function testCreateRole(){
        $response=$this->post('api/save-role',[
            'role' =>'loan officer',
            'status'=> 'active'
        ]);
            $this->assertCount(1,Role::all());
    }
    /** @test */
    public function testDisplayRole(){
        $response = $this->get('api/show-role');

        $response->assertStatus(200);
    }
    /** @test */
    public function testEditRole(){
        $this->withoutExceptionHandling();
        $this->testCreateRole();
        $role = Role::first();
        $response = $this->patch('api/edit-role/'.$role->id);
        $this->assertEquals('manager', Role::first()->role);
    }
    /** @test */
    public function testUpdateRole(){
        $this->withoutExceptionHandling();
        $this->testCreateRole();
        $role = Role::first();
        $response = $this->patch('api/update-role/'.$role->id);
        $this->assertEquals('suspended', Role::first()->status);
    }
    /** @test */
    public function testDeleteRole(){
        $this->withoutExceptionHandling();
        $this->testCreateRole();
        $delete_role = Role::first();
        $response = $this->delete('api/delete-role/'.$delete_role->id);
        $this->assertCount(1, Role::all());
    }
}
