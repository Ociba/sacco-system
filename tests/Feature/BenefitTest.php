<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Benefit;

class BenefitTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function testCreateBenefit(){
        $response=$this->post('api/save-benefit',[
            'user_id'=>'1',
            'account_id'=>'2',
            'benefit'=>'100000',
            'status'=> 'allowed'
        ]);
            $this->assertCount(1,Benefit::all());
    }
    /** @test */
    public function testDisplayBenefit(){
        $response = $this->get('api/display-benefit');

        $response->assertStatus(200);
    }
    /** @test */
    public function testDeleteBenefit(){
        $this->withoutExceptionHandling();
        $this->testCreateBenefit();
        $delete_benefit = Benefit::first();
        $response = $this->delete('api/delete-benefit/'.$delete_benefit->id);
        $this->assertCount(1, Benefit::all());
    }
}
