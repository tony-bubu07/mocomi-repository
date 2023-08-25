<?php
// 権限の設定
// LaravelのGate（ゲート）と呼ばれる機能を用いて実装

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

      // 管理者= 2   投稿ユーザー= 1   一般ユーザー= 0

      // 管理ユーザーに許可（サイト内全て閲覧可能）
      Gate::define('admin', function ($user) {
        return $user->role_id === 2;
      });

      // 投稿ユーザーに許可（一般ユーザー、投稿ユーザー範囲が閲覧可能）
      Gate::define('post-user', function ($user) {
        return $user->role_id >= 1;
      });

      // 一般ユーザーに許可
      Gate::define('user', function ($user) {
        return $user->role_id >= 0 ;
      });
    }
}
