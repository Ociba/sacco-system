<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Expenses;

class ExpensesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function testCreateExpenses(){
        $response=$this->post('api/save-expenses',[
            'user_id'=>'1',
            'amount'=>'400000',
            'reason'=>'water bills',
            'date'=>'30/03/2020',
            'status'=> 'active'
        ]);
            $this->assertCount(1,Expenses::all());
    }
    /** @test */
    public function testDisplayExpenses(){
        $response = $this->get('api/display-expenses');

        $response->assertStatus(200);
    }
    /** @test */
    public function testEditExpenses(){
        $this->withoutExceptionHandling();
        $this->testCreateExpenses();
        $expenses = Expenses::first();
        $response = $this->patch('api/edit-expenses/'.$expenses->id);
        $this->assertEquals('Yaka', Expenses::first()->reason);
    }
    /** @test */
    public function testDeleteExpenses(){
        $this->withoutExceptionHandling();
        $this->testCreateExpenses();
        $delete_expenses = Expenses::first();
        $response = $this->delete('api/delete-expenses/'.$delete_expenses->id);
        $this->assertCount(1, Expenses::all());
    }
}
