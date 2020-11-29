<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserApiSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate([
            'email' => 'api_access@mlonline.com',
            'password' => bcrypt('ml_api_!aTx3dp1yssn1'),
            'api_token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIyMzgzMjc3MyIsIm5hbWUiOiJNYXJjYUxhc2VyIiwiaWF0IjoxNTE2MjM5MDIyfQ.-2XQw_TDJBVXznc_Z-Z2DLAZCezBHT6IK-9nPgjx_Zg'
        ]);
    }
}
