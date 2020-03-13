<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Product;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
      Product::class=>'App\Policies\ProductPolicy',
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Gate::define('edit_product',function($user, $product){
        //   return $user->id==$product->user_id;
        // });



        // Gate::define('product_list',function($user){
        //   return $user->hasRole(Permission::whereName('product_list')->first()->roles);
        // });
        //
        // Gate::define('product_edit',function($user){
        // // dd(Permission::whereName('product_edit')->first());die;
        //   return $user->hasRole(Permission::where('name','product_edit')->first()->roles);
        // });
        // Gate::define('product_delete',function($user){
        //   return $user->hasRole(Permission::whereName('product_delete')->first()->roles);
        // });


        // $permissions = $this->getPermissions();
        // foreach($permissions as $permission){
        //   Gate::define($permission->name,function($user) use($permission){
        //     return $user->hasRole($permission->roles);
        //   });
        // }

    }

    // public function getPermissions(){
    //   // dd(Permission::with('roles')->get());
    //   return Permission::with('roles')->get();
    // }
}
