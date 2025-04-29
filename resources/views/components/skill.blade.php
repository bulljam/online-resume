@props(['skills'])
@if (!empty($skills))
    <section>
        <h2 class="section-title">Skills & Expertise</h2>

        <div class="space-y-5 mt-4">
            @foreach ($skills as $skill)
                <div class="pb-3 border-b border-gray-100 last:border-b-0">
                    <div class="font-bold text-gray-800 text-sm">
                        {{ $skill->name }}
                        @if ($skill->level)
                            <span class="{{ $skill->level->color() }} p-1 ml-1">{{ $skill->level->title() }}</span>
                        @endif
                    </div>

                    @if (!empty($skill->keywords))
                        <div class="mt-2 flex flex-wrap gap-2 text-xs">
                            @foreach ($skill->keywords as $keyword)
                                <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-sm font-medium">
                                    {{ $keyword }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@endif