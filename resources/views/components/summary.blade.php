@props(['summary'])

@if ($summary)
    <section>
        <h2 class="section-title">Profile Summary</h2>
        <p class="mt-4 text-gray-700 leading-relaxed text-base">
            {{ $summary }}
        </p>
    </section>
@endif