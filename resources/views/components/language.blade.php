@props(['languages', 'interests'])
@if (!empty($languages) || !empty($interests))
    <section>
        <h2 class="section-title">Additional</h2>

        <div class="space-y-5 mt-4">
            @if (!empty($languages))
                <div>
                    <div class="font-bold mb-1 text-sm text-gray-800">Languages</div>
                    <p class="text-gray-700 text-sm">
                        {{ collect($languages)->map(fn($l) => "{$l->language} ({$l->fluency})")->implode(', ') }}
                    </p>
                </div>
            @endif

            @if (!empty($interests))
                <div>
                    <div class="font-bold mb-1 text-sm text-gray-800">Interests</div>
                    <p class="text-gray-700 text-sm">
                        {{ collect($interests)->pluck('name')->implode(', ') }}
                    </p>
                </div>
            @endif
        </div>
    </section>
@endif