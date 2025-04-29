@props(['work'])
@if (!empty($work))
    <section>
        <h2 class="section-title">Professional Experience</h2>
        <div class="space-y-6 mt-4">
            @foreach ($work as $job)
                <div class="entry">
                    <div class="flex justify-between items-start">
                        <div class="font-bold text-xl text-gray-900 leading-snug">
                            {{ $job->position }}
                        </div>
                        <div class="text-sm text-gray-500 whitespace-nowrap pt-1">
                            {{ $job->startDate?->format('M Y') }}
                            –
                            {{ $job->endDate?->format('M Y') ?? 'Present' }}
                        </div>
                    </div>
                    <div class="text-base text-gray-600 font-medium">
                        <a href="{{ $job->url }}" class="hover:text-indigo-700 transition">
                            {{ $job->name }}
                        </a>
                    </div>

                    @if ($job->summary)
                        <p class="mt-2 text-gray-700 leading-normal text-sm">
                            {{ $job->summary }}
                        </p>
                    @endif

                    @if (!empty($job->highlights))
                        <ul class="mt-3 space-y-1 list-disc list-outside text-gray-700 text-sm pl-6">
                            @foreach ($job->highlights as $highlight)
                                <li>{{ $highlight }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@endif