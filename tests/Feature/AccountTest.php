<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Account;
use App\User;

class AccountTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function testDisplayAccount(){
        $response = $this->get('api/show-account');

        $response->assertStatus(200);
    }
    public function testCreateAccount(){
        $response=$this->post('api/save-account',[
            'user_id'=>'1',
            'member_detail_id'=>'3',
            'account_name'=>'ociba james',
            'account_number'=>'2567890',
            'total'=>'20000',
            'status'=> 'active'
        ]);
            $this->assertCount(1,Account::all());
    }
    /** @test */
    public function testEditAccount(){
        $this->withoutExceptionHandling();
        $this->testCreateAccount();
        $account = Account::first();
        $response = $this->patch('api/update-account/'.$account->id);
        $this->assertEquals(3011600000539,Account::first()->account_number);
    }
    /** @test */
    public function testDeleteAccount(){
        $this->withoutExceptionHandling();
    $this->testCreateAccount();
        $delete_account = Account::first();
        $response = $this->delete('api/delete-account/'.$delete_account->id);
        $this->assertCount(1, Account::all());
    }
}
