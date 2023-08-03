<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Emoji;
use Illuminate\Http\Request;

class EmojiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Emoji::where('unicode_name', 'like', '%' . $request->search . '%')->get([
            'slug',
            'character',
            'unicode_name',
            'code_point',
            'group',
            'subgroup',
        ])->toJson();
    }
}
