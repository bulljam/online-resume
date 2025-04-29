@props(['basics'])

<header class="flex items-start justify-between gap-8 mb-10 pb-6 border-b-4 border-indigo-600">

    {{-- LEFT: Name + Meta --}}
    <div class="flex-1 min-w-0">
        <h1 class="text-5xl font-black tracking-tight text-gray-900 leading-tight">
            {{ $basics->name }}
        </h1>

        <p class="text-xl text-indigo-700 font-semibold mt-1">
            {{ $basics->label }}
        </p>

        {{-- Contact Info --}}
        <div class="mt-4 flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-600">
            @if ($basics->email)
                <a href="mailto:{{ $basics->email }}"
                    class="inline-flex items-center gap-1 hover:text-indigo-700 transition">
                    <svg class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-2 4v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                    </svg>
                    {{ $basics->email }}
                </a>
            @endif

            @if ($basics->phone)
                <span class="inline-flex items-center gap-1">
                    <svg class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.21l-2.26 1.13a11 11 0 005.52 5.52l1.13-2.26a1 1 0 011.21-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.7 21 3 14.3 3 6V5z" />
                    </svg>
                    {{ $basics->phone }}
                </span>
            @endif

            @if ($basics->location?->city)
                <span class="inline-flex items-center gap-1">
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

        {{-- Profiles --}}
        @if (!empty($basics->profiles))
            <div class="mt-2 flex flex-wrap gap-x-4 text-sm">
                @foreach ($basics->profiles as $profile)
                    <a href="{{ $profile->url }}"
                        class="font-medium text-gray-600 hover:text-indigo-700 border-b border-transparent hover:border-indigo-600 transition"
                        target="_blank">
                        {{ $profile->network }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>

    {{-- RIGHT: Photo --}}
    <div class="shrink-0">
        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=200&h=200&fit=crop&auto=format&q=90"
            alt="Profile photo" class="resume-photo" />
    </div>
    <x-download />
</header>