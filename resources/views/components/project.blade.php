@props(['projects'])
@if (!empty($projects))
    <section>
        <h2 class="section-title">Key Projects</h2>
        <div class="space-y-6 mt-4">
            @foreach ($projects as $project)
                <div class="entry">
                    <div class="flex justify-between items-start">
                        <div class="font-bold text-gray-900 text-lg">
                            {{ $project->name }}
                            @if ($project->url)
                                <span class="text-gray-400 font-normal mx-2">–</span>
                                <a href="{{ $project->url }}" target="_blank"
                                    class="text-indigo-600 hover:text-indigo-800 text-sm font-normal underline transition">
                                    {{ parse_url($project->url, PHP_URL_HOST) }}
                                </a>
                            @endif
                        </div>
                        <div class="text-sm text-gray-500 whitespace-nowrap pt-1">
                            {{ $project->startDate?->format('Y') }}
                            –
                            {{ $project->endDate?->format('Y') ?? 'Present' }}
                        </div>
                    </div>

                    <p class="text-gray-700 leading-normal text-sm">
                        {{ $project->description }}
                    </p>

                    @if (!empty($project->highlights))
                        <ul class="mt-3 space-y-1 list-disc list-outside text-gray-700 text-sm pl-6">
                            @foreach ($project->highlights as $highlight)
                                <li>{{ $highlight }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@endif