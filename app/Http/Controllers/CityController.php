<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     */
    public function index()
    {
       $cities = City::query()->get();

       return view('index', compact('cities'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug): Factory|View|Application
    {
        $city = City::query()->where('slug', $slug)->firstOrFail();
        session( ['selectedSlug' => $city->slug, 'cityName' => $city->name],);
        return view('show', compact('city'));
    }
}
