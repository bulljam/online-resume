@props(['education'])
@if (!empty($education))
    <section>
        <h2 class="section-title">Education</h2>

        <div class="space-y-4 mt-4">
            @foreach ($education as $edu)
                <div class="space-y-0.5 pb-3 border-b border-gray-100 last:border-b-0">
                    <div class="font-bold text-sm text-gray-900">
                        {{ $edu->institution }}
                    </div>
                    <div class="text-sm text-gray-700">
                        {{ $edu->studyType }} in {{ $edu->area }}
                    </div>
                    @if ($edu->score)
                        <div class="text-xs text-gray-600">
                            GPA: {{ $edu->score }}
                        </div>
                    @endif
                    <div class="text-xs text-gray-500">
                        {{ $edu->startDate?->format('Y') }} – {{ $edu->endDate?->format('Y') }}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif