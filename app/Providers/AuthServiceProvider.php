<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use App\Feature;
use Auth;
use App\UserFeatures;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate){
        $this->registerPolicies($gate);

        // $features = Feature::pluck('code')->toArray();
       // $user_features = [];
        // if(Auth::check()){
        //     $user_features = UserFeatures::where('user_id',Auth::user()->id)
        //                                 ->join('features','features.id','user_features.feature_id')
        //                                 ->select('features.code')
        //                                 ->pluck('code')
        //                                 ->toArray();
        
        // }
        
        //foreach($features as $feature){
            // $gate->define('is', function ($feature,$user){
            //     $user_features = UserFeatures::where('user_id',$user->id)
            //             ->where('features.code',$feature)
            //             ->join('features','features.id','user_features.feature_id')
            //             ->first();
            //             dd($feature);
            //     if($user_features) return 1;
            //         else return 0;
                       
               
            //  });
        //}
        
    
    }
}
