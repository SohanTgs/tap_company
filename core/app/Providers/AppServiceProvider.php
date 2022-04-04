<?php

namespace App\Providers;

use App\GeneralSetting;
use App\Language;
use App\Page;
use App\CurrencyRate;
use App\BonusSetting;
use App\Plugin;
use App\UserPanelColor;
use Illuminate\Support\Facades\Auth;
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
        $activeTemplate = activeTemplate();

        $viewShare['general'] = GeneralSetting::first();

        $viewShare['bonus_setting'] = BonusSetting::first();

        $viewShare['activeTemplate'] = $activeTemplate;
        $viewShare['activeTemplateTrue'] = activeTemplate(true);
        $viewShare['language'] = Language::all();
        $viewShare['pages'] = Page::where('tempname',$activeTemplate)->where('slug','!=','home')->get();
        view()->share($viewShare);


        view()->composer('admin.partials.sidenav', function ($view) {
            $view->with([
                'banned_users_count'           => \App\User::banned()->count(),
                'email_unverified_users_count' => \App\User::emailUnverified()->count(),
                'sms_unverified_users_count'   => \App\User::smsUnverified()->count(),
                'pending_ticket_count'         => \App\SupportTicket::whereIN('status', [0,2])->count(),
                'pending_deposits_count'    => \App\Deposit::pending()->count(),
                'pending_withdraw_count'    => \App\Withdrawal::pending()->count(),
            ]);
        });

        view()->composer($activeTemplate.'layouts.master', function ($view) {
            $view->with([
                'theme_color'=> UserPanelColor::where('user_id', Auth::user()->id)->first(),
            ]);
        });

        view()->composer($activeTemplate . 'partials.sidenav', function ($view) {
            $view->with([
                'currencyApiAvailable' => CurrencyRate::count(),
            ]);
        });

        view()->composer($activeTemplate . 'partials.topnav', function ($view) {
            $view->with([
                'currencyApiAvailable' => CurrencyRate::count(),
            ]);
        });


        view()->composer('partials.seo', function ($view) {
            $seo = \App\Frontend::where('data_keys', 'seo.data')->first();
            $view->with([
                'seo' => $seo ? $seo->data_values : $seo,
            ]);
        });

    }
}
