<?php

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

                collect($mapData['locations'])->each(function (string $locationName) use ($map) {
                    $location = new Location(['name' => $locationName]);
                    $location->map()->associate($map)->save();
                });
            });
        });
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
                            'Aberdeen',
                            'Amsterdam',
                            'Berlin',
                            'Bern',
                            'Birmingham',
                            'Bratislava',
                            'Bremen',
                            'Brussels',
                            'Brno',
                            'Calais',
                            'Cambridge',
                            'Cardiff',
                            'Carlisle',
                            'Dijon',
                            'Dortmund',
                            'Dover',
                            'Dresden',
                            'Duisburg',
                            'Düsseldorf',
                            'Edinburgh',
                            'Erfurt',
                            'Felixstowe',
                            'Frankfurt am Main',
                            'Genève',
                            'Glasgow',
                            'Graz',
                            'Grimsby',
                            'Groningen',
                            'Hamburg',
                            'Hannover',
                            'Innsbruck',
                            'Kassel',
                            'Kiel',
                            'Klagenfurt am Wörthersee',
                            'Köln',
                            'Leipzig',
                            'Liège',
                            'Lille',
                            'Linz',
                            'Liverpool',
                            'London',
                            'Luxembourg',
                            'Lyon',
                            'Magdeburg',
                            'Manchester',
                            'Mannheim',
                            'Metz',
                            'Milano',
                            'München',
                            'Newcastle-upon-Tyne',
                            'Nürnberg',
                            'Osnabrück',
                            'Paris',
                            'Plymouth',
                            'Poznań',
                            'Praha',
                            'Reims',
                            'Rostock',
                            'Rotterdam',
                            'Salzburg',
                            'Sheffield',
                            'Southampton',
                            'Strasbourg',
                            'Stuttgart',
                            'Swansea',
                            'Szczecin',
                            'Torino',
                            'Venezia',
                            'Verona',
                            'Wien',
                            'Wrocław',
                            'Zürich',
                        ],
                    ],
                    'Viva la France !' => [
                        'type' => Map::TYPE_DLC,
                        'locations' => [
                            'Bordeaux',
                            'Bourges',
                            'Brest',
                            'Civaux',
                            'Clermont-Ferrand',
                            'Golfech',
                            'La Rochelle',
                            'Le Havre',
                            'Le Mans',
                            'Limoges',
                            'Marseille',
                            'Montpellier',
                            'Nantes',
                            'Nice',
                            'Paluel',
                            'Rennes',
                            'Roscoff',
                            'Saint-Alban-du-Rhône',
                            'Saint-Laurent',
                            'Toulouse',
                        ],
                    ],
                    'Scandinavia' => [
                        'type' => Map::TYPE_DLC,
                        'locations' => [
                            'København',
                            'Kristiansand',
                            'Kalmar',
                            'Karlskrona',
                            'Jönköping',
                            'Gedser',
                            'Frederikshavn',
                            'Göteborg',
                            'Helsingborg',
                            'Hirtshals',
                            'Aalborg',
                            'Bergen',
                            'Esbjerg',
                            'Odense',
                            'Oslo',
                            'Nynäshamn',
                            'Linköping',
                            'Malmö',
                            'Stockholm',
                            'Stavanger',
                            'Södertälje',
                            'Trelleborg',
                            'Uppsala',
                            'Västerås',
                            'Växjö',
                            'Örebro',
                        ],
                    ],
                    'Going East!' => [
                        'type' => Map::TYPE_DLC,
                        'locations' => [
                            'Pécs',
                            'Szeged',
                            'Kraków',
                            'Košice',
                            'Katowice',
                            'Gdańsk',
                            'Banská Bystrica',
                            'Białystok',
                            'Debrecen',
                            'Budapest',
                            'Ostrava',
                            'Olsztyn',
                            'Lublin',
                            'Warszawa',
                            'Łódź',
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
                            'Bakersfield',
                            'Barstow',
                            'Carlsbad',
                            'El Centro',
                            'Eureka',
                            'Fresno',
                            'Hornbrook',
                            'Huron',
                            'Los Angeles',
                            'Oakdale',
                            'Oakland',
                            'Oxnard',
                            'Redding',
                            'Sacramento',
                            'San Diego',
                            'San Francisco',
                            'San Rafael',
                            'Santa Cruz',
                            'Santa Maria',
                            'Stockton',
                            'Truckee',
                            'Ukiah',
                            'Carson City',
                            'Elko',
                            'Ely',
                            'Jackpot',
                            'Las Vegas',
                            'Pioche',
                            'Primm',
                            'Reno',
                            'Tonopah',
                            'Winnemucca',
                        ],
                    ],
                    'Arizona' => [
                        'type' => Map::TYPE_DLC,
                        'locations' => [
                            'Camp Verde',
                            'Ehrenberg',
                            'Flagstaff',
                            'Globe',
                            'Grand Canyon Village',
                            'Holbrook',
                            'Kayenta',
                            'Kingman',
                            'Nogales',
                            'Page',
                            'Phoenix',
                            'San Simon',
                            'Show Low',
                            'Sierra Vista',
                            'Tucson',
                            'Yuma',
                        ],
                    ],
                ],
            ],
        ];
    }
}
