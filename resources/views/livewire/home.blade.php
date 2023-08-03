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
            <p class="mt-4 text-sm text-slate-500">Click on any emoji to copy it to clipboard.</p>
        </div>

        <div class="mt-3 grid grid-cols-12 gap-4 text-2xl">
            @forelse ($emojis as $emoji)
                <button aria-label="{{$emoji['unicode_name']}}" name="{{$emoji['unicode_name']}}" onclick="copyToClipboard('{{ $emoji['character'] }}')"
                    class="m-1 w-full aspect-square border border-slate-700 hover:bg-slate-800 hover:border-indigo-600 rounded-lg">{{ $emoji['character'] }}</button>
            @empty
            @endforelse
        </div>
    </div>

    {{-- Copied alert --}}
    <div id="notification" class="hidden right-4 bottom-4 px-4 py-2 rounded-md bg-indigo-600 text-white">
        <span id="selectedEmoji"></span> emoji copied to clipboard!
    </div>
    {{-- End of Copied alert --}}

    <script>
        let notificationTimeout;

        const copyToClipboard = (text) => {
            navigator.clipboard.writeText(text)
                .then(() => showNotification(text))
                .catch((err) => console.error('Failed to copy text: ' + err));
        };

        const showNotification = (text) => {
            const notificationDiv = document.getElementById('notification');
            const selectedEmojiSpan = document.getElementById('selectedEmoji');
            selectedEmojiSpan.textContent = text;
            notificationDiv.classList.remove('hidden');
            notificationDiv.classList.add('fixed');

            clearTimeout(notificationTimeout);
            notificationTimeout = setTimeout(() => {
                notificationDiv.classList.remove('fixed');
                notificationDiv.classList.add('hidden');
            }, 4000); // Show the notification for 2 seconds
        };
    </script>
</div>

