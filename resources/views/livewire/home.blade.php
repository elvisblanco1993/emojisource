<div>
    <div class="text-center py-3 bg-red-600 text-white">
        THIS SOFTWARE IS STILL A WORK IN PROGRESS. OFFICIAL RELEASE IS AUGUST 14, 2023.
    </div>
    @include('layouts.nav')
    @include('layouts.hero')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mx-1 mt-6">
            <input type="search" wire:model="search" aria-placeholder="Search all emojis..." placeholder="Search all emojis..." autofocus
                class="bg-slate-800 border-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-64 lg:w-1/3"
            />
        </div>

        <div class="mt-3 grid grid-cols-12 gap-4 text-2xl">
            @forelse ($emojis as $emoji)
                <button aria-label="{{$emoji['unicode_name']}}" name="{{$emoji['unicode_name']}}" x-clipboard.raw="{{ $emoji['character'] }}"
                    class="m-1 w-full aspect-square border border-slate-700 hover:bg-slate-800 hover:border-indigo-600 rounded-lg">{{ $emoji['character'] }}</button>
            @empty
            @endforelse
        </div>
    </div>
</div>
