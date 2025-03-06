<?php

namespace App\Providers;
use datnguyen\product\Repositories\ProductCategoryRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use datnguyen\user\Models\Prize;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Kiểm tra xem bảng đã tồn tại chưa trước khi truy vấn
        if (Schema::hasTable('product_categories')) {
            $categories = app(ProductCategoryRepository::class)->getAll();
        } else {
            $categories = collect(); // Tránh lỗi khi bảng chưa tồn tại
        }

        $auth_admin = Auth::guard('admin')->user();
        $role = $auth_admin ? $auth_admin->role : null; 

        if (Schema::hasTable('prizes')) {
            $prizes = Prize::where('status', 'active')->paginate(11);
        } else {
            $prizes = collect();
        }

        View::composer('*', function ($view) use ($categories, $role, $prizes) {
            $view->with([
                'categorys' => $categories,
                'role' => $role,
                'prizes' => $prizes,
            ]);
        });
    }
}
