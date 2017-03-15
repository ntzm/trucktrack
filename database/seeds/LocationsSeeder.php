<?php

use App\Models\Country;
use App\Models\Game;
use App\Models\Location;
use App\Models\Map;
use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    public function run()
    {
        collect($this->getMatrix())->each(function (array $gameData, string $gameName) {
            $game = Game::create(['name' => $gameName]);

            collect($gameData['maps'])->each(function (array $mapData, string $mapName) use ($game) {
                $map = new Map([
                    'name' => $mapName,
                    'type' => $mapData['type'],
                ]);
                $map->game()->associate($game)->save();

                collect($mapData['locations'])->each(function (array $locationData) use ($map) {
                    $location = new Location(['name' => $locationData['name']]);
                    $location->country()->associate($this->getCountry($locationData['country']));
                    $location->map()->associate($map);
                    $location->save();
                });
            });
        });
    }

    private function getCountry(string $name): Country
    {
        static $countryCache = [];

        if (isset($countryCache[$name])) {
            return $countryCache[$name];
        }

        $country = Country::firstOrCreate(['name' => $name]);

        $countryCache[$name] = $country;

        return $country;
    }

    private function getMatrix(): array
    {
        return [
            'Euro Truck Simulator 2' => [
                // Source: http://truck-simulator.wikia.com/wiki/List_of_Cities_in_Euro_Truck_Simulator_2
                'maps' => [
                    'Default' => [
                        'type' => Map::TYPE_DEFAULT,
                        'locations' => [
                            ['name' => 'Aberdeen', 'country' => 'United Kingdom'],
                            ['name' => 'Amsterdam', 'country' => 'Netherlands'],
                            ['name' => 'Berlin', 'country' => 'Germany'],
                            ['name' => 'Bern', 'country' => 'Switzerland'],
                            ['name' => 'Birmingham', 'country' => 'United Kingdom'],
                            ['name' => 'Bratislava', 'country' => 'Slovakia'],
                            ['name' => 'Bremen', 'country' => 'Germany'],
                            ['name' => 'Brussels', 'country' => 'Belgium'],
                            ['name' => 'Brno', 'country' => 'Czech Republic'],
                            ['name' => 'Calais', 'country' => 'France'],
                            ['name' => 'Cambridge', 'country' => 'United Kingdom'],
                            ['name' => 'Cardiff', 'country' => 'United Kingdom'],
                            ['name' => 'Carlisle', 'country' => 'United Kingdom'],
                            ['name' => 'Dijon', 'country' => 'France'],
                            ['name' => 'Dortmund', 'country' => 'Germany'],
                            ['name' => 'Dover', 'country' => 'United Kingdom'],
                            ['name' => 'Dresden', 'country' => 'Germany'],
                            ['name' => 'Duisburg', 'country' => 'Germany'],
                            ['name' => 'Düsseldorf', 'country' => 'Germany'],
                            ['name' => 'Edinburgh', 'country' => 'United Kingdom'],
                            ['name' => 'Erfurt', 'country' => 'Germany'],
                            ['name' => 'Felixstowe', 'country' => 'United Kingdom'],
                            ['name' => 'Frankfurt am Main', 'country' => 'Germany'],
                            ['name' => 'Genève', 'country' => 'Switzerland'],
                            ['name' => 'Glasgow', 'country' => 'United Kingdom'],
                            ['name' => 'Graz', 'country' => 'Austria'],
                            ['name' => 'Grimsby', 'country' => 'United Kingdom'],
                            ['name' => 'Groningen', 'country' => 'Netherlands'],
                            ['name' => 'Hamburg', 'country' => 'Germany'],
                            ['name' => 'Hannover', 'country' => 'Germany'],
                            ['name' => 'Innsbruck', 'country' => 'Austria'],
                            ['name' => 'Kassel', 'country' => 'Germany'],
                            ['name' => 'Kiel', 'country' => 'Germany'],
                            ['name' => 'Klagenfurt am Wörthersee', 'country' => 'Austria'],
                            ['name' => 'Köln', 'country' => 'Germany'],
                            ['name' => 'Leipzig', 'country' => 'Germany'],
                            ['name' => 'Liège', 'country' => 'Belgium'],
                            ['name' => 'Lille', 'country' => 'France'],
                            ['name' => 'Linz', 'country' => 'Austria'],
                            ['name' => 'Liverpool', 'country' => 'United Kingdom'],
                            ['name' => 'London', 'country' => 'United Kingdom'],
                            ['name' => 'Luxembourg', 'country' => 'Luxembourg'],
                            ['name' => 'Lyon', 'country' => 'France'],
                            ['name' => 'Magdeburg', 'country' => 'Germany'],
                            ['name' => 'Manchester', 'country' => 'United Kingdom'],
                            ['name' => 'Mannheim', 'country' => 'Germany'],
                            ['name' => 'Metz', 'country' => 'France'],
                            ['name' => 'Milano', 'country' => 'Italy'],
                            ['name' => 'München', 'country' => 'Germany'],
                            ['name' => 'Newcastle-upon-Tyne', 'country' => 'United Kingdom'],
                            ['name' => 'Nürnberg', 'country' => 'Germany'],
                            ['name' => 'Osnabrück', 'country' => 'Germany'],
                            ['name' => 'Paris', 'country' => 'France'],
                            ['name' => 'Plymouth', 'country' => 'United Kingdom'],
                            ['name' => 'Poznań', 'country' => 'Poland'],
                            ['name' => 'Praha', 'country' => 'Czech Republic'],
                            ['name' => 'Reims', 'country' => 'France'],
                            ['name' => 'Rostock', 'country' => 'Germany'],
                            ['name' => 'Rotterdam', 'country' => 'Netherlands'],
                            ['name' => 'Salzburg', 'country' => 'Austria'],
                            ['name' => 'Sheffield', 'country' => 'United Kingdom'],
                            ['name' => 'Southampton', 'country' => 'United Kingdom'],
                            ['name' => 'Strasbourg', 'country' => 'France'],
                            ['name' => 'Stuttgart', 'country' => 'Germany'],
                            ['name' => 'Swansea', 'country' => 'United Kingdom'],
                            ['name' => 'Szczecin', 'country' => 'Poland'],
                            ['name' => 'Torino', 'country' => 'Italy'],
                            ['name' => 'Venezia', 'country' => 'Italy'],
                            ['name' => 'Verona', 'country' => 'Italy'],
                            ['name' => 'Wien', 'country' => 'Austria'],
                            ['name' => 'Wrocław', 'country' => 'Poland'],
                            ['name' => 'Zürich', 'country' => 'Switzerland'],
                        ],
                    ],
                    'Viva la France !' => [
                        'type' => Map::TYPE_DLC,
                        'locations' => [
                            ['name' => 'Le Mans', 'country' => 'France'],
                            ['name' => 'Le Havre', 'country' => 'France'],
                            ['name' => 'La Rochelle', 'country' => 'France'],
                            ['name' => 'Golfech', 'country' => 'France'],
                            ['name' => 'Brest', 'country' => 'France'],
                            ['name' => 'Bordeaux', 'country' => 'France'],
                            ['name' => 'Bourges', 'country' => 'France'],
                            ['name' => 'Civaux', 'country' => 'France'],
                            ['name' => 'Clermont-Ferrand', 'country' => 'France'],
                            ['name' => 'Paluel', 'country' => 'France'],
                            ['name' => 'Montpellier', 'country' => 'France'],
                            ['name' => 'Nantes', 'country' => 'France'],
                            ['name' => 'Nice', 'country' => 'France'],
                            ['name' => 'Limoges', 'country' => 'France'],
                            ['name' => 'Marseille', 'country' => 'France'],
                            ['name' => 'Saint-Alban-du-Rhône', 'country' => 'France'],
                            ['name' => 'Saint-Laurent', 'country' => 'France'],
                            ['name' => 'Rennes', 'country' => 'France'],
                            ['name' => 'Roscoff', 'country' => 'France'],
                            ['name' => 'Toulouse', 'country' => 'France'],
                        ],
                    ],
                    'Scandinavia' => [
                        'type' => Map::TYPE_DLC,
                        'locations' => [
                            ['name' => 'Kristiansand', 'country' => 'Norway'],
                            ['name' => 'København', 'country' => 'Denmark'],
                            ['name' => 'Karlskrona', 'country' => 'Sweden'],
                            ['name' => 'Kalmar', 'country' => 'Sweden'],
                            ['name' => 'Jönköping', 'country' => 'Sweden'],
                            ['name' => 'Gedser', 'country' => 'Denmark'],
                            ['name' => 'Frederikshavn', 'country' => 'Denmark'],
                            ['name' => 'Göteborg', 'country' => 'Sweden'],
                            ['name' => 'Helsingborg', 'country' => 'Sweden'],
                            ['name' => 'Hirtshals', 'country' => 'Denmark'],
                            ['name' => 'Aalborg', 'country' => 'Denmark'],
                            ['name' => 'Bergen', 'country' => 'Norway'],
                            ['name' => 'Esbjerg', 'country' => 'Denmark'],
                            ['name' => 'Oslo', 'country' => 'Norway'],
                            ['name' => 'Odense', 'country' => 'Denmark'],
                            ['name' => 'Nynäshamn', 'country' => 'Sweden'],
                            ['name' => 'Örebro', 'country' => 'Sweden'],
                            ['name' => 'Linköping', 'country' => 'Sweden'],
                            ['name' => 'Malmö', 'country' => 'Sweden'],
                            ['name' => 'Stavanger', 'country' => 'Norway'],
                            ['name' => 'Södertälje', 'country' => 'Sweden'],
                            ['name' => 'Trelleborg', 'country' => 'Sweden'],
                            ['name' => 'Stockholm', 'country' => 'Sweden'],
                            ['name' => 'Växjö', 'country' => 'Sweden'],
                            ['name' => 'Västerås', 'country' => 'Sweden'],
                            ['name' => 'Uppsala', 'country' => 'Sweden'],
                        ],
                    ],
                    'Going East!' => [
                        'type' => Map::TYPE_DLC,
                        'locations' => [
                            ['name' => 'Košice', 'country' => 'Slovakia'],
                            ['name' => 'Kraków', 'country' => 'Poland'],
                            ['name' => 'Katowice', 'country' => 'Poland'],
                            ['name' => 'Gdańsk', 'country' => 'Poland'],
                            ['name' => 'Banská Bystrica', 'country' => 'Slovakia'],
                            ['name' => 'Białystok', 'country' => 'Poland'],
                            ['name' => 'Debrecen', 'country' => 'Hungary'],
                            ['name' => 'Budapest', 'country' => 'Hungary'],
                            ['name' => 'Ostrava', 'country' => 'Czech Republic'],
                            ['name' => 'Olsztyn', 'country' => 'Poland'],
                            ['name' => 'Łódź', 'country' => 'Poland'],
                            ['name' => 'Lublin', 'country' => 'Poland'],
                            ['name' => 'Warszawa', 'country' => 'Poland'],
                            ['name' => 'Pécs', 'country' => 'Hungary'],
                            ['name' => 'Szeged', 'country' => 'Hungary'],
                        ],
                    ],
                ],
            ],
            'American Truck Simulator' => [
                // Source: http://truck-simulator.wikia.com/wiki/List_of_Cities_in_American_Truck_Simulator
                'maps' => [
                    'Default' => [
                        'type' => Map::TYPE_DEFAULT,
                        'locations' => [
                            ['name' => 'Bakersfield', 'country' => 'United States of America'],
                            ['name' => 'Barstow', 'country' => 'United States of America'],
                            ['name' => 'Carlsbad', 'country' => 'United States of America'],
                            ['name' => 'El Centro', 'country' => 'United States of America'],
                            ['name' => 'Eureka', 'country' => 'United States of America'],
                            ['name' => 'Fresno', 'country' => 'United States of America'],
                            ['name' => 'Hornbrook', 'country' => 'United States of America'],
                            ['name' => 'Huron', 'country' => 'United States of America'],
                            ['name' => 'Los Angeles', 'country' => 'United States of America'],
                            ['name' => 'Oakdale', 'country' => 'United States of America'],
                            ['name' => 'Oakland', 'country' => 'United States of America'],
                            ['name' => 'Oxnard', 'country' => 'United States of America'],
                            ['name' => 'Redding', 'country' => 'United States of America'],
                            ['name' => 'Sacramento', 'country' => 'United States of America'],
                            ['name' => 'San Diego', 'country' => 'United States of America'],
                            ['name' => 'San Francisco', 'country' => 'United States of America'],
                            ['name' => 'San Rafael', 'country' => 'United States of America'],
                            ['name' => 'Santa Cruz', 'country' => 'United States of America'],
                            ['name' => 'Santa Maria', 'country' => 'United States of America'],
                            ['name' => 'Stockton', 'country' => 'United States of America'],
                            ['name' => 'Truckee', 'country' => 'United States of America'],
                            ['name' => 'Ukiah', 'country' => 'United States of America'],
                            ['name' => 'Carson City', 'country' => 'United States of America'],
                            ['name' => 'Elko', 'country' => 'United States of America'],
                            ['name' => 'Ely', 'country' => 'United States of America'],
                            ['name' => 'Jackpot', 'country' => 'United States of America'],
                            ['name' => 'Las Vegas', 'country' => 'United States of America'],
                            ['name' => 'Pioche', 'country' => 'United States of America'],
                            ['name' => 'Primm', 'country' => 'United States of America'],
                            ['name' => 'Reno', 'country' => 'United States of America'],
                            ['name' => 'Tonopah', 'country' => 'United States of America'],
                            ['name' => 'Winnemucca', 'country' => 'United States of America'],
                        ],
                    ],
                    'Arizona' => [
                        'type' => Map::TYPE_DLC,
                        'locations' => [
                            ['name' => 'Camp Verde', 'country' => 'United States of America'],
                            ['name' => 'Ehrenberg', 'country' => 'United States of America'],
                            ['name' => 'Flagstaff', 'country' => 'United States of America'],
                            ['name' => 'Globe', 'country' => 'United States of America'],
                            ['name' => 'Grand Canyon Village', 'country' => 'United States of America'],
                            ['name' => 'Holbrook', 'country' => 'United States of America'],
                            ['name' => 'Kayenta', 'country' => 'United States of America'],
                            ['name' => 'Kingman', 'country' => 'United States of America'],
                            ['name' => 'Nogales', 'country' => 'United States of America'],
                            ['name' => 'Page', 'country' => 'United States of America'],
                            ['name' => 'Phoenix', 'country' => 'United States of America'],
                            ['name' => 'San Simon', 'country' => 'United States of America'],
                            ['name' => 'Show Low', 'country' => 'United States of America'],
                            ['name' => 'Sierra Vista', 'country' => 'United States of America'],
                            ['name' => 'Tucson', 'country' => 'United States of America'],
                            ['name' => 'Yuma', 'country' => 'United States of America'],
                        ],
                    ],
                ],
            ],
        ];
    }
}
