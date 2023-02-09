<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Contact; 
use App\Models\Language; 
use App\Models\Service; 
use App\Models\Portfolio; 
use App\Models\Team; 
use App\Models\Blog; 
use App\Models\Bcategory; 
use App\Models\About; 
use App\Models\Section; 
use Artisan;

class HomeController extends Controller
{
   //Home page
    public function index()
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $section = Section::where('page', 1)->where('language_id', $currlang->id)
        ->first();

        $services = Service::where('status', 1)->where('language_id', $currlang->id)
                        ->paginate(5);

        $portfolios = Portfolio::where('status', 1)->where('language_id', $currlang->id)
                        ->paginate(5);

        return view('frontend.home', compact('portfolios','services','section'));
    }

    //Terms page
    public function terms()
    {
        return view('auth.terms');
    }

    //Optimization page
    public function optimize()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return back();
    }
    
    //Approval page
    public function approval()
    {
        return view('auth.approval');
    }
    
    //About page
    public function about()
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $teams = Team::where('status', 1)->where('language_id', $currlang->id)
        ->get();

        $section = Section::where('page', 2)->where('language_id', $currlang->id)
        ->first();

        $abouts = About::where('status', 1)->where('language_id', $currlang->id)
        ->paginate(1);

        return view('frontend.about',compact('abouts','section','teams'));
    }

    //Contact page
    public function contact()
    {
        return view('frontend.contact');
    }

    //Portfolio page
    public function portfolio(Request $request) 
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }
        
        $data['section'] = Section::where('page', 6)->where('language_id', $currlang->id)
        ->first();

        $category = $request->category;
        $catid = null;
        if (!empty($category)) {
            $data['category'] = Service::where('slug', $category)->firstOrFail();
            $catid = $data['category']->id;
        }

        $data['portfolios'] = Portfolio::where('status',1)->where('language_id', $currlang->id)
                            ->when($catid, function ($query, $catid) {
                                return $query->where('service_id', $catid);
                            })
                            ->paginate(8);

       return view('frontend.portfolio', $data);
   }

   public function portfolioDetails($slug)
   {    
       if (session()->has('lang')) {
           $currlang = Language::where('code', session()->get('lang'))->first();
       } else {
           $currlang = Language::where('is_default', 1)->first();
       }

       $data['portfolio'] = Portfolio::where('slug', $slug)->where('language_id', $currlang->id)->firstOrFail();

       return view('frontend.portfolio-details', $data);
   }

    //team page
    public function team() 
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $data['teams'] = Team::where('language_id', $currlang->id)->where('status',1)->paginate(6);

        return view('frontend.team', $data);
    }

    public function team_details($id)
    {
        $team = Team::find($id);

        return view('frontend.team-details', compact('team'));
    }

    // Blog Page  Funtion
    public function blogs(Request $request)
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $section = Section::where('page', 4)->where('language_id', $currlang->id)
        ->first();

        $bcategories = Bcategory::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();

        $blogs = Blog::where('status', 1)->where('language_id', $currlang->id)
                        ->paginate(5);

        return view('frontend.blogs', compact('blogs', 'bcategories','section'));
    }

    // Blog Details  Funtion
    public function blogdetails($slug) 
    {
        if (session()->has('lang')) {
            $currlang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currlang = Language::where('is_default', 1)->first();
        }

        $blog = Blog::where('slug', $slug)->where('language_id', $currlang->id)->firstOrFail();
        
        $bcategories = Bcategory::where('status', 1)->where('language_id', $currlang->id)->orderBy('id', 'DESC')->get();
       
        return view('frontend.blogdetails', compact('blog', 'bcategories'));
    }

    // Change Language
    public function changeLanguage($lang)
    {
        session()->put('lang', $lang);
        app()->setLocale($lang);
        // Session::put('language_code', $lang);
        // $lang = Session::get('language_code');
        
        return redirect()->route('front.home');
    }

}