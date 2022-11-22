<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Mail\ContactMail;
use App\Mail\Email;
use App\Mail\JobMail;
use App\Mail\OfferMail;
use App\Models\Employment;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Location;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where(['active' => 1])->get();
        $blogers = Blog::where(['active' => 1])->take(3)->get();
        return view('frontend.home', compact('banners', 'blogers'));
    }

    public function aboutUs()
    {
        return view('frontend.about.index');
    }

    public function contactUs()
    {
        $data = [];
        $data = DB::table('locations')->get();
        // dd($data);
        return view('frontend.contact.index', compact('data'));
    }

    public function faqs()
    {

        $faqs = Faq::where(['active' => 1])->get();
        return view('frontend.faqs.index', compact('faqs'));
    }
    public function blog()
    {

        return view('frontend.blogs.index');
    }
    public function blogDetails($url)
    {
        $blog = Blog::where('url', $url)->first();
        return view('frontend.blogs.details', compact('blog'));
    }

    public function services()
    {

        return view('frontend.services.index');
    }
    public function gallery()
    {
        $gallery = Gallery::where(['active' => 1])->get();
        return view('frontend.gallery.index', compact('gallery'));
    }
    public function jobs()
    {
        return view('frontend.jobs.index');
    }
    public function jobDetails($url)
    {
        $job = Employment::where('url', $url)->first();
        return view('frontend.jobs.details', compact('job'));
    }
    public function servicesDetails($url)
    {
        $service = Service::where('url', $url)->first();
        return view('frontend.services.details', compact('service'));
    }

    public function email(Request $request)
    {
        $email_sub = Setting::first();

        $validator = Validator::make($request->all(), [
            'mail'         => 'required|email',
        ]);
        if ($validator->passes()) {

            $data = $request->all(); // it store data to the DB
            Mail::to($email_sub->sub_mail)->send(new Email($data));
            return response()->json(['success' => __('site.success'), 'status' => true]);
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function offer(Request $request)
    {
        $email_sub = Setting::first();
        $validator = Validator::make($request->all(), [
            'email'         => 'required|email',
            'name'         => 'required',
            'phone'         => 'required',
            'type'         => 'required',
        ]);
        if ($validator->passes()) {

            $data = $request->all();
            Mail::to($email_sub->offer_mail)->send(new OfferMail($data));
            if ($data) {
                toastr()->success(__('site.success'));
                return redirect()->back();
            } else {
                return back()->with('success', 'message sent successfully');
            }
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function store(Request $request)
    {
        $email_sub = Setting::first();
        $validator = Validator::make(
            $request->all(),
            [
                'name'          => 'required',
                'email'         => 'required|email',
                'phone'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'subject'       => 'required',
                'message'       => 'required',
                'g-recaptcha-response' => 'required|captcha'
            ],
        );
        if ($validator->passes()) {

            $data = $request->all(); // it store data to the DB
            Mail::to($email_sub->contact_mail)->send(new ContactMail($data));
            return response()->json(['success' => __('site.success'), 'status' => true]);
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function getQuote()
    {

        return view('frontend.offer.index');
    }

    public function employmentOrders()
    {
        return view('frontend.employment.order');
    }

    public function join(Request $request)
    {
        $email_sub = Setting::first();
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'address'          => 'required',
            'qualifications'          => 'required',
            'email'          => 'required|email',
            'age'        => 'required|numeric',
            'phone'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',

        ]);
        if ($validator->passes()) {

            $data = $request->all(); // it store data to the DB
            Mail::to($email_sub->job_mail)->send(new JobMail($data));
            return response()->json(['success' => __('site.success'), 'status' => true]);
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function ourLocations()
    {
        $email_sub = Setting::first();
        // dd([$email_sub->contact_mail]);
        $data = [];
        $data = DB::table('locations')->get();
        return view('frontend.locations.index', compact('data'));
    }
}