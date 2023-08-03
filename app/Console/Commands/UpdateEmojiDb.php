<?php

namespace App\Console\Commands;

use App\Models\Emoji;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateEmojiDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-emoji';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the emoji database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $request = Http::get("https://emoji-api.com/emojis", [
            'access_key' => config('apidb.emojiapi.api_key'),
        ])->json();

        foreach ($request as $emoji) {
            Emoji::create([
                'slug' => $emoji['slug'],
                'character' => $emoji['character'],
                'unicode_name' => $emoji['unicodeName'],
                'code_point' => $emoji['codePoint'],
                'group' => $emoji['group'],
                'subgroup' => $emoji['subGroup'],
            ]);
        }
    }
}
