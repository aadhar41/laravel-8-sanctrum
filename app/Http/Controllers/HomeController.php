<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuTown;
use App\Models\City;
use App\Models\State;
use App\Models\PostCodeGeo;
use App\Models\Postcode;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // ob_start();
        // set_time_limit(800);
        // $auTowns = Postcode::all("suburb", "postcode", "state", "type");

        // $city = City::all("wikiDataId", "id", "state_code", "postcode", "name");

        // foreach ($city as $key => $value) {
        //     $count = Postcode::where("suburb", 'LIKE', "%{$value->name}%")
        //         ->where('wiki_updated', NULL)
        //         ->get()
        //         ->count();

        //     if ($count == 0) {
        //         continue;
        //     }

        //     Postcode::where("suburb", 'LIKE', "%{$value->name}%")
        //         ->where('wiki_updated', NULL)
        //         ->update([
        //             'wikiDataId' => trim($value->wikiDataId),
        //             'wiki_updated' => 1
        //         ]);
        // }

        // foreach ($auTowns as $key => $value) {
        //     $count = City::where('postcode', NULL)
        //         ->where("state_code", 'LIKE', "%{$value->state}%")
        //         ->where('name', 'LIKE', "%{$value->suburb}%")
        //         // ->where('postcode', 'LIKE', "%{$value->postcode}%")
        //         ->get()
        //         ->count();

        //     if ($count == 0) {
        //         continue;
        //     }

        //     City::where('postcode', NULL)
        //         ->where("state_code", 'LIKE', "%{$value->state}%")
        //         ->where('name', 'LIKE', "%{$value->suburb}%")
        //         // ->where('postcode', 'LIKE', "%{$value->postcode}%")
        //         ->update([
        //             'postcode' => trim($value->postcode)
        //         ]);
        // }

        // $postcodes = PostCodeGeo::all('state', 'suburb', 'postcode');

        // foreach ($postcodes as $key => $value) {
        //     $count = City::where('postcode', NULL)
        //         ->where("state_code", 'LIKE', "%{$value->state}%")
        //         ->where('name', 'LIKE', "%{$value->suburb}%")
        //         ->get()
        //         ->count();

        //     if ($count == 0) {
        //         continue;
        //         // exit("No Record Found.");
        //     }

        //     City::where("state_code", 'LIKE', "%{$value->state}%")
        //         ->where('postcode', NULL)
        //         ->where('name', 'LIKE', "%{$value->suburb}%")
        //         ->update([
        //             'postcode' => $value->postcode
        //         ]);
        // }

        // ob_end_clean();
        // die(" --Done-- ");

        $autowns = AuTown::all()->count();
        $postcodes = Postcode::all()->count();
        $cities = City::all()->count();
        $states = State::all()->count();
        return view('home', compact("autowns", "cities", "postcodes", "states"));
    }
}
