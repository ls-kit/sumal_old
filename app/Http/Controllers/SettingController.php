<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    // new added function
    public function configureTheme(){
        // $shop = Auth::user();
        // dd($shop);
        $themes = Auth::user()->api()->rest('GET', '/admin/api/2022-04/themes.json');
        // return $themes;
        
        $shopThemes = $themes['body']['themes'];
        $searchedThemeRole = "main";
        //search for the right theme id with the main role
        $activeTheme = array_filter(
            $shopThemes->toArray(),
            function ($e) use (&$searchedThemeRole) {
                return $e['role'] == $searchedThemeRole;
            }
        );
        $activeThemeId = $activeTheme[0]['id'];
        $snippet = "Hello this is new file Ls";
        //Snippet to pass to rest api request
        $data = array(
            'asset'=> [
                'key' => 'snippets/ls_newcode.liquid',
                'value' => $snippet
            ]
        );
        Auth::user()->api()->rest('PUT', '/admin/api/2022-04/themes/'.$activeThemeId.'/assets.json', $data);

        // Save activated shop
        // Setting::updateOrCreate([
        //     'shop_id' => $shop->name,
        //     'shop_active_theme_id' => $activeThemeId,
        //     'activated' => true,
        // ]) ?  ['message' => 'Theme setup successfully'] : ['message' => 'Theme setup error!'];

        return Setting::updateOrCreate([
            'shop_id' => Auth::user()->name,
            'shop_active_theme_id' => $activeThemeId,
            'activated' => true,
        ]) ?  ['message' => 'Theme setup successfully'] : ['message' => 'Theme setup error!'];

        // return response()->json(['success' => 'Theme has been configured successfully.']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
