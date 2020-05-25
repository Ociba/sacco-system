<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\loan;
use App\User;

class LoanTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function testCreateLoan(){
        $response=$this->post('api/save-loan',[
            'user_id'=>'1',
            'date_of_issuing'=>'30/03/2020',
            'amount'=>'500000',
            'status'=> 'cleared'
        ]);
            $this->assertCount(1,loan::all());
    }
    /** @test */
    public function testDisplayActiveLoan(){
        $response = $this->get('api/loan-active');

        $response->assertStatus(200);
    }
    /** @test */
    public function testDisplayLoanCleared(){
        $response = $this->get('api/loan-cleared');

        $response->assertStatus(200);
    }
    /** @test */
    public function testDeleteLoan(){
        $this->withoutExceptionHandling();
        $this->testCreateLoan();
        $delete_loan = loan::first();
        $response = $this->delete('api/delete-loan/'.$delete_loan->id);
        $this->assertCount(1, loan::all());
    }
}
