<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Counter;
use App\Models\Cover;
use App\Models\Employment;
use App\Models\File;
use App\Models\Gallery;
use App\Models\Insurance;
use App\Models\Partner;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;

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
        $cover = Cover::first();
        $seo = Seo::first();
        $counter = Counter::first();
        $setting = Setting::first();
        $about = About::first();
        $partners = Partner::where(['active'=>1])->get();
        $insurance = Insurance::where(['active'=>1])->get();
        $blogs = Blog::where(['active'=>1])->get();
        $services = Service::where(['active'=>1])->get();
        $employments = Employment::where(['active'=>1])->get();
        $files = File::where(['active'=>1])->get();
        $galleries = Gallery::where(['active'=>1])->get();


        view()->share('cover', $cover);
        view()->share('seo', $seo);
        view()->share('counter', $counter);
        view()->share('setting', $setting);
        view()->share('about', $about);
        view()->share('partners', $partners);
        view()->share('blogs', $blogs);
        view()->share('services', $services);
        view()->share('services', $services);
        view()->share('insurance', $insurance);
        view()->share('employments', $employments);
        view()->share('galleries',$galleries);
        view()->share('files', $files);

        //

        $mailsetting = Setting::first();
        if ($mailsetting) {
            $data = [
                'driver'            => $mailsetting->mail_transport,
                'host'              => $mailsetting->mail_host,
                'port'              => $mailsetting->mail_port,
                'encryption'        => $mailsetting->mail_encryption,
                'username'          => $mailsetting->mail_username,
                'password'          => $mailsetting->mail_password,
                'from'              => [
                    'address' => $mailsetting->mail_from,
                    'name'   => $setting->name,
                ]
            ];
            Config::set('mail', $data);
        }

        Paginator::useBootstrap();
    }
}