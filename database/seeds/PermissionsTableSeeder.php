<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =[
            'Can view dashboard','Can view registered users','Can search users','Can view Users table action',
            'Can add user','Can edit user','Can search members datepicker','Can search using all accounts datepicker',
            'Can delete user','Can view users','Can view staff','Can search staff','Can search staff datepicker',
            'Can view members','Can view next of kin Action','Can search using kin datepicker',
            'Can search member','Can add member details','Can view next of kin','Can search next of kin',
            'Can edit next of kin','Can add next of kin','Can view all accounts','Can view my account',
            'Can view domant or suspended accounts','Can edit accounts','Can delete accounts',
            'Can search account','Can create account','Can view all savings','Can view my savings',
            'Can search saving','Can save money','Can view all loans','Can view my loan','Can delete loan',
            'Can subscribe loan','Can search loan','Can view cleared loan','Can view all benefits',
            'Can view accepted benefits','Can create benefit','Can delete benefit','Can search benefit',
            'Can view unaccepted benefit','Can search unaccepted benefit','Can view expenses',
            'Can search expenses','Can add expenses','Can view register user','Can change password',
            'Can view user accounts','Can view accepted benefit action','Can view all accounts Action',
            'Can search domant account','Can search domant account using date picker','Can edit domant account',
            'Can delete domant account','Can view domant account Action','Can search all saving using date picker',
            'Can search my saving using date picker','Can search my saving','Can view my loan Action','Can view loan Action',
            'Can pay loan','Can view benefit Action','Can see total benefit','Can search benefit using date picker',
            'Can delete active benefit','Can search active benefit','Can search benefit using date picker',
            'Can search expenses using date picker'.'Can user accounts setting','Can view projects','Can search project'
            ,'Can add project','Can search history','Can delete history','Can view history Action','Can add history',
            'Can view Hstory','Can view awards','Can delete award','Can view award Action','Can add award','Can search award',
            'Can view Profile','Can delete profile','Can view profile Action','Can edit profile','Can view messages',
            'Can view mails','Can search message','Can view message Action','Can delete message','Can view subcription',
            'Can view subscription action','Can delete subscription','Can search subscription','Can search soon message',
            'Can add soon message','Can view soon action','Can edit soon message','Can delete soon message','Can view coming soon table',
            'Can search payments','Can view my loan payments','Can search all payments','Can view my all loan payments',
            'Can view pages','Can view all users','Can search all users','Can view Users action','Can edit all user',
            'Can suspend user'
        ];
        for($i=0; $i < count($permissions); $i++){
            $permission = new Permission();
            if(Permission::where('id',$i)->exists()){
                $permission->id = $i+1;
            }else{
                $permission->id = $i;
            } 
            $permission->permission=$permissions[$i];
            $permission->save();
        }
    }
}
