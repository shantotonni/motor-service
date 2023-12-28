<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
 use App\Company;
 use App\Observers\CompanyObserver;
 use Illuminate\Support\Facades\View;
 use App\UserFeatures;
 use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){

        //Company::observe(CompanyObserver::class);
    
        // view()->composer('*', function($view){
        //         $user_features = array();
        //         if(Auth::check()){
        //             $user_features =UserFeatures::where('user_id',Auth::user()->id)
        //                                         ->join('features','features.id','user_features.feature_id')
        //                                         ->select('features.code')
        //                                         ->pluck('code')
        //                                         ->toArray();
                
        //         }
                
        //         // App::instance('user_features', $user_features);
        //         View::share('user_features',$user_features);
        //         // Config::set('user_features', $something);
        //         //config(['global.user_features' => $user_features]);
        // });
    }
}
