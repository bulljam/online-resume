@props(['basics'])

<header class="space-y-1 mb-10 pb-6 border-b-4 border-indigo-600">
    <div>
        <h1 class="text-6xl font-black tracking-tight text-gray-900">
            {{ $basics->name }}
        </h1>
        <p class="text-2xl text-indigo-700 font-medium mt-1">
            {{ $basics->label }}
        </p>
    </div>

    <div class="flex flex-wrap gap-x-8 gap-y-2 text-sm text-gray-600 pt-4">
        @if ($basics->email)
            <div class="flex items-center space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-2 4v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                </svg>
                <a href="mailto:{{ $basics->email }}" class="hover:text-indigo-800 transition">
                    {{ $basics->email }}
                </a>
            </div>
        @endif

        @if ($basics->phone)
            <div class="flex items-center space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span>{{ $basics->phone }}</span>
            </div>
        @endif

        @if ($basics->location->city)
            <div class="flex items-center space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>
                    {{ $basics->location->city }},
                    {{ $basics->location->region }}
                </span>
            </div>
        @endif
    </div>
    @if (!empty($basics->profiles))
        <div class="flex flex-wrap gap-x-6 pt-2 text-sm">
            @foreach ($basics->profiles as $profile)
                <a href="{{ $profile->url }}" target="_blank"
                    class="text-gray-600 hover:text-indigo-700 border-b border-indigo-300 hover:border-indigo-700 transition font-medium">
                    {{ $profile->network }}
                </a>
            @endforeach
        </div>
    @endif
</header>