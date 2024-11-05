<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Url;
use App\Models\UrlVisit;

class pre_UrlController extends Controller
{
    public function shorten(Request $request)
    {
        $request->validate([
            'long_url' => 'required|url'
        ]);
        $user = $request->user();
        $longUrl = $request->long_url;


        //check if URL already exists
        $existingUrl = Url::where('long_url', $longUrl)->where('user_id', $user->id)->first();
        if ($existingUrl) {
            return response()->json(['short_url' => url("/{$existingUrl->short_code}")], 200);
        }

        //generate short code
        $shortCode = Str::random(6);
        Url::create([
            'user_id' => $user->id,
            'long_url' => $longUrl,
            'short_code' => $shortCode
        ]);
        return response()->json(['short_url' => url("/{$shortCode}")]);
    }

    public function redirect($shortCode)
    {
        $url = Url::where('short_code', $shortCode)->firstOrFail();

        $visit = UrlVisit::firstOrNew([
            'url_id' => $url->id,
            'ip_address' => request()->ip()
        ]);
        $visit->visit_count++;

        $visit->save();

        return redirect($url->long_url);
    }

    public function list(Request $request)
    {
        $user = $request->user();
        $urls = $user->urls()->with('visits')->get();

        $response = $urls->map(function ($url) {
            return [
                'short_code' => $url->short_code,
                'original_url' => $url->long_url,
            ];
        });

        return response()->json($response);
    }

    public function listCount(Request $request)
    {
        $user = $request->user();
        $urls = $user->urls()->with('visits')->get();

        $response = $urls->map(function ($url) {
            return [
                'short_code' => $url->short_code,
                'original_url' => $url->long_url,
                'visit_count' => $url->visits->visit_count ?? 0,
            ];
        });

        return response()->json($response);
    }




}
