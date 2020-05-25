<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Permission;
use App\PermissionRole;

class PermissionTest extends TestCase
{
    //use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function testCreatePermission(){
        $response=$this->post('api/save-role',[
            'role_id' =>'1',
            'permission_id'=> '2'
        ]);
            $this->assertCount(0,PermissionRole::all());
    }
    /** @test */
    public function testDisplayCheckBoxes(){
        $response = $this->get('api/display-checkboxes');

        $response->assertStatus(200);
    }
    /** @test */
    public function testDisplayAllPermissionsForRole(){
        $response = $this->get('api/display-permission');

        $response->assertStatus(200);
    }
    /** @test */
    public function testAssignRole(){
        $this->withoutExceptionHandling();
        $this->testCreatePermission();
        $permission = PermissionRole::first();
        $response = $this->patch('api/assign-role/'.$permission->id);
        $this->assertEquals('1', PermissionRole::first()->role_id);
    }
    /** @test */
    public function testUpdateRole(){
        $this->withoutExceptionHandling();
        $this->testCreatePermission();
        $role = Role::first();
        $response = $this->patch('api/update-role/'.$role->id);
        $this->assertEquals('suspended', Role::first()->status);
    }
    /** @test */
    public function testUnsignPermission(){
        $this->withoutExceptionHandling();
        //$this->testCreateRole();
        $delete_permission = PermissionRole::first();
        $response = $this->delete('api/delete-permission/'.$delete_permission->id);
        $this->assertCount(1, PermissionRole::all());
    }
}
