<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Homepage;
use Illuminate\Http\Request;
use App\Models\Hobby;
use App\Models\Service;
use App\Models\Participation;
use App\Models\Expertise;
use App\Models\Blog;
use App\Models\Slider;
class SiteController extends Controller
{
    public function index(){
		 $homepage = Homepage::select('title','sub_title','paragraph','image')->get();
		 $hobbies = Hobby::select('name')->where('status','active')->get();
        $services = Service::select('name','short_des')->where('status','active')->get();
        $participations = Participation::select('name','title','desc','year_date')->where('status','active')->get();
        $expertise = Expertise::select('title','number')->where('status','active')->get();
        $blogs = Blog::select('name','title','desc','image')->where('status','active')->get();
        $sliders = Slider::select('title','sub_title','short_desc','image','start','end')->where('status','active')->get();
        return view('site.index',compact('homepage','hobbies','services','participations','expertise','blogs','sliders'));
    }



}
