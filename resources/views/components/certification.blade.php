@props(['certifications', 'awards'])

@if (!empty($certifications) || !empty($awards))
    <section>
        <h2 class="section-title">Awards & Certifications</h2>

        <ul class="space-y-2 text-gray-700 mt-4 text-sm list-disc list-inside">
            @foreach ($certifications as $cert)
                <li>
                    <span class="font-medium text-gray-800">{{ $cert->name }}</span>
                    <span class="text-gray-500">({{ $cert->issuer }})</span>
                    <span class="text-xs text-gray-500 ml-1">
                        ({{ $cert->date?->format('Y') }})
                    </span>
                </li>
            @endforeach

            @foreach ($awards as $award)
                <li>
                    <span class="font-medium text-gray-800">{{ $award->title }}</span>
                    <span class="text-gray-500">({{ $award->awarder }})</span>
                    <span class="text-xs text-gray-500 ml-1">
                        ({{ $award->date?->format('Y') }})
                    </span>
                </li>
            @endforeach
        </ul>
    </section>
@endif