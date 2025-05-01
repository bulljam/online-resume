@props(['basics'])

<header
    class="flex flex-col lg:flex-row items-center lg:items-center justify-between gap-6 lg:gap-12 mb-12 pb-6 border-b-4 border-indigo-600">

    <div class="flex-1 min-w-0 text-center lg:text-left">
        <h1 class="text-5xl lg:text-6xl font-extrabold tracking-tight text-gray-900 leading-tight">
            {{ $basics->name }}
        </h1>

        <p class="text-xl lg:text-2xl text-indigo-700 font-semibold mt-2">
            {{ $basics->label }}
        </p>

        <div class="mt-4 flex flex-wrap justify-center lg:justify-start gap-3 text-sm text-gray-600">
            @if ($basics->email)
                <a href="mailto:{{ $basics->email }}"
                    class="flex items-center gap-1 px-3 py-1 bg-gray-100 rounded-full hover:bg-indigo-100 hover:text-indigo-700 transition">
                    <svg class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-2 4v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                    </svg>
                    {{ $basics->email }}
                </a>
            @endif

            @if ($basics->phone)
                <span class="flex items-center gap-1 px-3 py-1 bg-gray-100 rounded-full">
                    <svg class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.21l-2.26 1.13a11 11 0 005.52 5.52l1.13-2.26a1 1 0 011.21-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.7 21 3 14.3 3 6V5z" />
                    </svg>
                    {{ $basics->phone }}
                </span>
            @endif

            @if ($basics->location?->city)
                <span class="flex items-center gap-1 px-3 py-1 bg-gray-100 rounded-full">
                    <svg class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M17.66 16.66L13.41 20.9a2 2 0 01-2.83 0l-4.24-4.24a8 8 0 1111.32 0z" />
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ $basics->location->city }}, {{ $basics->location->region }}
                </span>
            @endif
        </div>

        @if (!empty($basics->profiles))
            <div class="mt-3 flex flex-wrap justify-center lg:justify-start gap-2">
                @foreach ($basics->profiles as $profile)
                    <a href="{{ $profile->url }}"
                        class="px-3 py-1 bg-indigo-50 text-indigo-700 font-medium rounded-full hover:bg-indigo-100 hover:text-indigo-800 transition"
                        target="_blank">
                        {{ $profile->network }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>

    <div class="flex flex-col items-center lg:items-end justify-center gap-4">
        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=200&h=200&fit=crop&auto=format&q=90"
            alt="Profile photo"
            class="w-32 h-32 lg:w-40 lg:h-40 rounded-full object-cover shadow-lg border-4 border-indigo-600">

        <x-download />
    </div>
</header>