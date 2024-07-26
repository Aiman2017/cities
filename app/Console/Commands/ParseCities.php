<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ParseCities extends Command
{
    protected ?array $countryName;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-cities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://api.hh.ru/areas');
        $cities = $response->json();

        foreach ($cities as $city) {
            if ($city['name'] === "Россия") {
                $this->countryName = $city;
                break;
            }
        }

        foreach ($this->countryName['areas'] as $region) {
            foreach ($region['areas'] as $city) {
                City::query()->updateOrCreate(
                    [
                        'slug' => Str::slug($city['name'])
                    ],

                    [
                        'name' => $city['name'],
                    ]
                );
            }
        }

        $this->info("Парсинг Дата завершилась");
    }
}
