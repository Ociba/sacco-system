<?php

namespace Tests\Feature;
namespace Tests;

use App\Member_detail;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class MembersDetailsTest extends TestCase
{
    // use RefreshDatabase;

    /** @test */
    public function SaveMembersDetail(){
        $response=$this->post('api/save-members-details',[
            'town' => 'Kampala',
            'county' => 'Rubaga Division',
            'residence' => 'Kikoni',
            'occupation' => 'student',
            'phone_number' => '0775401793',
            'account_number' => '3601100000593',
            'date_of_joining' => '27/02/2020',
            'image' => 'james.jpg',
            'status'=> 'active'
        ]);
            $this->assertCount(2,Member_detail::all());
    }
     /** @test */
    public function testDisplayMembersDetail(){
        $response = $this->get('api/members-details');

       $response->assertStatus(200);
        
    }

    /** @test */
    public function testUpdateMembersDetails(){
        $this->withoutExceptionHandling();
        $member = Member_detail:: first();
        $response =$this->patch('api/update-member-details/'.$member->id,[
          'status' => 'inactive'
        ]);
        $this->assertEquals('active', $member->status );
    }
     
    /** @test */
    public function testDeleteMembersDetails(){
        $delete_member_detail = Member_detail::first();
        $response = $this->delete('api/delete-member-details/'.$delete_member_detail->id);
        $this->assertCount(2, Member_detail::all());
    }
}
