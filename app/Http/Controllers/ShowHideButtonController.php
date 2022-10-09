<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowHideButtonController extends Controller
{
//
public function ShowHideButton(){
    // get auth user
    $shop = Auth::user();
    $user_script_tag = ButtonDetail::where('id',auth()->user()->id)->first();
    // dd($user_script_tag -> count());

    if (request('status') == 1):
        // to hide button froms tore from call script tag api. it will create adn script tag in storefront main liquid file


        if($user_script_tag === NULL):
            $script_tag_info = [
                "script_tag" => [
                    "event" => "onload",
                    "src" => asset('assets/script.js')
                ]
                ];
            // dd($script_tag_info);
        $script_tag = $shop->api()->rest('POST', '/admin/api/2022-07/script_tags.json', $script_tag_info)['body']['script_tag']['id'];
        // dd($script_tag['script_tag']['id']);
        ButtonDetail::create([
            'user_id' => auth()->user()->id,
            'status' => request('status'),
            'shopify_scripttag_id' => $script_tag
        ]);
        return "Script tag created and data inserted";
    else:
        $script_tag_info = [
            "script_tag" => [
                "event" => "onload",
                "src" => asset('assets/script.js')
            ]
            ];
            $script_tag = $shop->api()->rest('POST', '/admin/api/2022-07/script_tags.json', $script_tag_info)['body']['script_tag']['id'];
        // dd($script_tag['script_tag']['id']);
        ButtonDetail::where('user_id', auth()->user()->id)->update([
            'status' => request('status'),
            'shopify_scripttag_id' => $script_tag
        ]);
        return "Script tag created and data updated";
        endif;
    else:
        if($user_script_tag != NULL && $user_script_tag->count()):
            ButtonDetail::where('user_id', auth()->user()->id)->update([
                'status' => 0,
                'shopify_scripttag_id' => NULL
            ]);
            $script_tag = $shop->api()->rest('DELETE','/admin/api/2022-07/script_tags/'.$user_script_tag->shopify_scripttag_id.'.json')['body'];
            return "Script tag deleted data updated";
        endif;

    endif;





}
}
