<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home($city = null)
    {
        $cities = City::query()->get();
        $selectedCity = session(['selectedSlug', 'selectedName']);


        return view('pages.home', compact('cities', 'selectedCity'));
    }

    public function news($city = null)
    {
        return view('pages.news');
    }

    public function about($city = null)
    {

        return view('pages.about');
    }
}
