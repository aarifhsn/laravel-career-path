<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Url;

class UrlController extends Controller
{

    public function shorten(Request $request)
    {
        $request->validate([
            'long_url' => 'required|url'
        ]);

        $user = $request->user();
        $longUrl = $request->long_url;

        // Check if URL already exists for this user
        $existingUrl = Url::where('long_url', $longUrl)->where('user_id', $user->id)->first();
        if ($existingUrl) {
            return response()->json(['short_url' => url("/{$existingUrl->short_code}")], 200);
        }

        // Generate a new short code
        $shortCode = Str::random(6);
        Url::create([
            'user_id' => $user->id,
            'long_url' => $longUrl,
            'short_code' => $shortCode,
            'visit_count' => 0 // Initialize visit count to 0
        ]);

        return response()->json(['short_url' => url("/{$shortCode}")]);
    }

    public function redirect($shortCode)
    {


        $url = Url::where('short_code', $shortCode)->firstOrFail();

        $url->increment('visit_count', 1);

        return redirect($url->long_url);
    }

    public function listCount(Request $request)
    {
        $user = $request->user();
        $urls = $user->urls()->get();

        // Map URLs to include visit count
        $response = $urls->map(function ($url) {
            return [
                'short_code' => $url->short_code,
                'long_url' => $url->long_url,
                'visit_count' => $url->visit_count,
            ];
        });

        return response()->json($response);
    }
}
