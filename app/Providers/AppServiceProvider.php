<?php

namespace App\Providers;

use App\Post;
use App\User;
use App\Setting;
use App\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        Schema::defaultStringLength(191);

        $settings = Setting::all();
        foreach ($settings as $key => $setting) {
            if ($key === 0) {
                $system_name = $setting->value;
            } elseif ($key === 1) {
                $favicon = $setting->value;
            } elseif ($key === 2) {
                $front_logo = $setting->value;
            } elseif ($key === 3) {
                $admin_logo = $setting->value;
            } elseif ($key === 4) {
                $admin_logo2 = $setting->value;
            }
        }

        $categories = Category::where('status', 1)->get();
        $authors = User::where('id', 2)->get();
        $most_viewed = Post::with(['creator', 'comments'])
            ->where('status', 1)
            ->orderBy('view_count', 'DESC')
            ->limit(4)
            ->get();

        $most_commented = Post::withCount('comments')
            ->where('status', 1)
            ->orderBy('comments_count', 'DESC')
            ->limit(4)
            ->get();

        $shareData = [
            'system_name' => $system_name,
            'favicon' => $favicon,
            'front_logo' => $front_logo,
            'admin_logo' => $admin_logo,
            'admin_logo2' => $admin_logo2,
            'categories' => $categories,
            'authors' => $authors,
            'most_viewed' => $most_viewed,
            'most_commented' => $most_commented,
        ];
        view()->share('shareData', $shareData);
    }
}
