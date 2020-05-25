<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Next_of_kin;

class NextOfKinTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function saveNextOfKinInformation(){
        $response=$this->post('api/save-nextofkin-details',[
            'member_detail_id'=> '1',
            'name' => 'atim Esther',
            'relationship' => 'daughter',
            'status'=> 'active'
        ]);
            $this->assertCount(1,Next_of_kin::all());
    }
    /** @test */
    public function showNextOfKinDetailsTest(){
        $response = $this->get('api/display-next-of-kin-details');
        $response->assertStatus(200);
    }

     /** @test */
     public function testUpdateNextOfKinDetails(){
        $this->withoutExceptionHandling();
        $update_kin_details = Next_of_kin:: first();
        $response =$this->patch('api/update-nextofkin-details/'.$update_kin_details->id,[
          'status' => 'inactive'
        ]);
        $this->assertEquals('active', $update_kin_details->status );
    }

     /** @test */
     public function testDeleteNextOfKinDetails(){
        $this->withoutExceptionHandling();
        $delete_nextofkin_detail = Next_of_kin::first();
        $response = $this->delete('api/delete-nextofkin-details/'.$delete_nextofkin_detail->id);
        $this->assertCount(1, Next_of_kin::all());
    }
}
