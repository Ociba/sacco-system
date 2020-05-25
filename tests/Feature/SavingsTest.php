<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Saving;

class SavingsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
   /** @test */
   public function testDisplaySaving(){
    $response = $this->get('api/show-Saving');

    $response->assertStatus(200);
}
public function testCreateSavings(){
    $response=$this->post('api/save-savings',[
        'user_id'=>'1',
        'account_id' =>'1',
        'saving' =>'50000',
        'date_of_saving'=>'29/03/2020',
        'status'=> 'active'
    ]);
        $this->assertCount(1,Saving::all());
}

/** @test */
public function testDeleteSaving(){
    $this->withoutExceptionHandling();
    $this->testCreateSavings();
    $delete_saving = Saving::first();
    $response = $this->delete('api/delete-savings/'.$delete_saving->id);
    $this->assertCount(1, Saving::all());
}
}
