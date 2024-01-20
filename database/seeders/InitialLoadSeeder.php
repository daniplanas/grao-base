<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InitialLoadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create roles
         */
        $roles = [
            'Administrator',
            'Administrator finance',
            'Administrator tech',
            'Customer admin',
            'Customer user',
            'Customer viewer',
            'Customer finance'
        ];
        foreach($roles as $role){
            Role::create([
                'key' => Str::slug($role),
                'name' => $role,
                'description' => $role . ' role'
            ]);
        }

        /**
         * Create admin user and first test customer
         */

        // Admin user data:
        $user = User::create([
            'is_admin'          => true,
            'account_id'        => null,
            'name'              => 'Administrator',
            'email'             => 'admin@example.com',
            'password'          => Hash::make('secret123'),
        ]);
        $user->addRole('administrator');
        $user = User::create([
            'name'      => 'customer',
            'email'     => 'customer@example.com',
            'password'          => Hash::make('secret123')
        ]);
        if($user){
            $account = Account::create([
                'name'          => $user->name . '\'s Team',
                'email'         => $user->email,
                'user_id'       => (string)$user->id
            ]);
            $user->account_id = (string)$account->id;
            $user->save();
            $user->addRole('customer-admin');
            for($i = 1; $i < 10; $i++){
                $user = User::create([
                    'name'      => 'customer' . $i,
                    'email'     => 'customer' . $i .'@example.com',
                    'account_id'    => (string)$account->id,
                    'password'          => Hash::make('secret123')
                ]);
                $user->addRole('customer-finance');
            }
        }
    /*
        for($i = 1;$i <= 5; $i++){
            Plan::create([
                'name' => 'Standard-' . $i,
                'description' => 'Standard plan ' . $i,
                'payment_plan_id_monthly' => '43656',
                'payment_plan_id_yearly' => '43657',
                'payment_product_id' => '-',
                'features' => 'funcion 1 | funcion 2 | funcion 3',
                'amount' => '50',
            ]);
        }
    */
    }
}
