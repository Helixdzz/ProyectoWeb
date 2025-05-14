<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
   public function show(Request $request)
{
    $city = $request->input('city');
    $weatherData = null;

    if ($city) {
        $apiKey = config('services.openweather.key');
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric',
        ]);

        if ($response->successful()) {
            $weatherData = $response->json();
        } else {
            return redirect()->route('dashboard')
                ->withErrors(['city' => 'Ciudad no encontrada o error con la API.']);
        }
    }

    return view('dashboard', [
        'weather' => $weatherData,
    ]);
}

}
