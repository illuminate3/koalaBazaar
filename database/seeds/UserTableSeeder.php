<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Supplier;
use App\Customer;
use App\InstagramAccount;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->name=str_random(10);
        $user->surname=str_random(10);
        $user->email=$user->name.'@gmail.com';
        $user->is_active=true;
        $user->type='App\Supplier';
        $user->save();
        $supplier=new Supplier();
        $supplier->phone='023123';
        $supplier->id=$user->id;
        $supplier->save();

        $user2=new User();
        $user2->name=str_random(10);
        $user2->surname=str_random(10);
        $user2->email=$user2->name.'@gmail.com';
        $user2->is_active=true;
        $user2->type='App\Customer';
        $user2->save();
        $customer=new Customer();
        $customer->phone="053247557437";
        $customer->id=$user2->id;
        $customer->save();


        $instagram=new InstagramAccount();
        $instagram->instagram_id="1231231";
        $instagram->access_token="asdaddads";
        $instagram->username="farukaladag";
        $instagram->full_name="omer faruk";
        $instagram->bio="fdsfasfdsf";
        $instagram->website="string";
        $instagram->profile_picture="";

        $supplier->instagramAccount()->save($instagram);

        $instagram2=new InstagramAccount();
        $instagram2->instagram_id="700797";
        $instagram2->access_token="fjfjjfjfjf";
        $instagram2->username="mug9";
        $instagram2->full_name="muge kural";
        $instagram2->bio="comp stud";
        $instagram2->website="some string";
        $instagram2->profile_picture="";

        $customer->instagramAccount()->save($instagram2);

    }
}
