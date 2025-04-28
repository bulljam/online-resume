<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $resume->basics->name }} – Resume</title>

    @vite(['resources/css/app.css'])

    <style>
        /* BASE STYLES MODIFICATIONS */

        /* Removed the vertical line, focusing on cleaner horizontal separation */
        .content-section {
            @apply pl-0 py-0;
        }

        /* Styles for individual experience/project entries */
        .entry {
            /* Reduced padding-bottom slightly and added a subtle bottom border for separation */
            @apply space-y-1 pb-4 border-b border-gray-100 last:border-b-0;
        }

        /* PROFESSIONAL SECTION TITLE STYLE (replaces the one at the end of the original file) */
        .section-title {
            /* Bold, uppercase, with a solid line accent below */
            @apply text-xl font-bold uppercase tracking-wider text-gray-700 border-b-2 border-indigo-500 pb-1 mb-4;
        }


        /* NEW PRINT STYLES - Optimized for high contrast and minimal ink */
        @media print {
            body {
                background: white;
                font-size: 10pt;
                color: #000;
            }

            a {
                color: black;
                text-decoration: none;
            }

            /* Ensure the two-column layout collapses for better paper use */
            .main-grid {
                grid-template-columns: 1fr !important;
                gap: 1.5rem !important;
            }

            .content-section,
            .entry {
                border-left: none !important;
                padding-left: 0 !important;
                border-bottom: none !important;
                /* Remove entry borders for print */
            }

            .sidebar {
                margin-top: 0 !important;
            }

            .section-title {
                border-bottom: 1px solid #999 !important;
                /* Use a standard, lighter divider for print */
                color: #333 !important;
            }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-700 antialiased font-serif">
    {{-- Main Container: Set maximum width, professional padding, and a subtle shadow --}}
    {{-- Changed max-w to 5xl for a slightly wider document, adjusted shadow for a cleaner look --}}
    <main class="max-w-5xl mx-auto p-8 md:p-12 lg:p-16 bg-white shadow-2xl">

        {{-- ================= HEADER ================= --}}
        <header class="space-y-1 mb-10 pb-6 border-b-4 border-indigo-600">
            <div>
                {{-- Name is now larger, slightly spaced, and dark black --}}
                <h1 class="text-6xl font-black tracking-tight text-gray-900">
                    {{ $resume->basics->name }}
                </h1>
                {{-- Label is in the accent color, slightly smaller --}}
                <p class="text-2xl text-indigo-700 font-medium mt-1">
                    {{ $resume->basics->label }}
                </p>
            </div>

            {{-- Contact Information - Inline icons for modern look --}}
            <div class="flex flex-wrap gap-x-8 gap-y-2 text-sm text-gray-600 pt-4">
                {{-- Used h-5 w-5 icons for better visibility and a more professional look --}}
                @if ($resume->basics->email)
                    <div class="flex items-center space-x-1">
                        {{-- Icon for Email --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-2 4v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                        </svg>
                        <a href="mailto:{{ $resume->basics->email }}" class="hover:text-indigo-800 transition">
                            {{ $resume->basics->email }}
                        </a>
                    </div>
                @endif

                @if ($resume->basics->phone)
                    <div class="flex items-center space-x-1">
                        {{-- Icon for Phone --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>{{ $resume->basics->phone }}</span>
                    </div>
                @endif

                @if ($resume->basics->location->city)
                    <div class="flex items-center space-x-1">
                        {{-- Icon for Location --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>
                            {{ $resume->basics->location->city }},
                            {{ $resume->basics->location->region }}
                        </span>
                    </div>
                @endif
            </div>

            {{-- Social Profiles - Added border-b for stronger visual link --}}
            @if (!empty($resume->basics->profiles))
                <div class="flex flex-wrap gap-x-6 pt-2 text-sm">
                    @foreach ($resume->basics->profiles as $profile)
                        <a href="{{ $profile->url }}" target="_blank"
                            class="text-gray-600 hover:text-indigo-700 border-b border-indigo-300 hover:border-indigo-700 transition font-medium">
                            {{ $profile->network }}
                        </a>
                    @endforeach
                </div>
            @endif
        </header>

        {{-- ================= MAIN CONTENT GRID (Two-Column) ================= --}}
        {{-- Adjusted grid ratio for a slightly wider main content area --}}
        <div class="grid grid-cols-1 lg:grid-cols-[3fr_2fr] gap-x-12 main-grid">

            {{-- ** LEFT COLUMN: EXPERIENCE, PROJECTS, SUMMARY ** --}}
            <div class="lg:space-y-12 space-y-10">

                {{-- ================= SUMMARY ================= --}}
                @if ($resume->basics->summary)
                    <section>
                        <h2 class="section-title">Profile Summary</h2>
                        {{-- Slightly larger font and improved leading --}}
                        <p class="mt-4 text-gray-700 leading-relaxed text-base">
                            {{ $resume->basics->summary }}
                        </p>
                    </section>
                @endif

                {{-- ================= EXPERIENCE ================= --}}
                @if (!empty($resume->work))
                    <section>
                        <h2 class="section-title">Professional Experience</h2>

                        {{-- Removed content-section class and its inherited border-l --}}
                        <div class="space-y-6 mt-4">
                            @foreach ($resume->work as $job)
                                <div class="entry">
                                    <div class="flex justify-between items-start">
                                        {{-- Position is bold and slightly darker --}}
                                        <div class="font-bold text-xl text-gray-900 leading-snug">
                                            {{ $job->position }}
                                        </div>
                                        {{-- Date is subtle and right-aligned --}}
                                        <div class="text-sm text-gray-500 whitespace-nowrap pt-1">
                                            {{ $job->startDate?->format('M Y') }}
                                            –
                                            {{ $job->endDate?->format('M Y') ?? 'Present' }}
                                        </div>
                                    </div>

                                    {{-- Company name is emphasized with medium font and a subtle location/url info --}}
                                    <div class="text-base text-gray-600 font-medium">
                                        <a href="{{ $job->url }}" class="hover:text-indigo-700 transition">
                                            {{ $job->name }}
                                        </a>
                                    </div>

                                    @if ($job->summary)
                                        {{-- Summary is now a bit more prominent, less italic --}}
                                        <p class="mt-2 text-gray-700 leading-normal text-sm">
                                            {{ $job->summary }}
                                        </p>
                                    @endif

                                    @if (!empty($job->highlights))
                                        {{-- Adjusted bullet points for better visual hierarchy and spacing --}}
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

                {{-- ================= PROJECTS ================= --}}
                @if (!empty($resume->projects))
                    <section>
                        <h2 class="section-title">Key Projects</h2>

                        <div class="space-y-6 mt-4">
                            @foreach ($resume->projects as $project)
                                <div class="entry">
                                    <div class="flex justify-between items-start">
                                        {{-- Project name is bold --}}
                                        <div class="font-bold text-gray-900 text-lg">
                                            {{ $project->name }}
                                            @if ($project->url)
                                                {{-- Changed pipe separator to a dash --}}
                                                <span class="text-gray-400 font-normal mx-2">–</span>
                                                <a href="{{ $project->url }}" target="_blank"
                                                    class="text-indigo-600 hover:text-indigo-800 text-sm font-normal underline transition">
                                                    {{ parse_url($project->url, PHP_URL_HOST) }}
                                                </a>
                                            @endif
                                        </div>
                                        {{-- Date is subtle and right-aligned --}}
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
            </div>


            {{-- ** RIGHT COLUMN: SKILLS, EDUCATION, CERTIFICATIONS ** --}}
            <div class="lg:space-y-12 space-y-10 mt-8 lg:mt-0 sidebar">

                {{-- ================= SKILLS ================= --}}
                @if (!empty($resume->skills))
                    <section>
                        <h2 class="section-title">Skills & Expertise</h2>

                        <div class="space-y-5 mt-4">
                            @foreach ($resume->skills as $skill)
                                {{-- Changed to a cleaner vertical separator --}}
                                <div class="pb-3 border-b border-gray-100 last:border-b-0">
                                    {{-- Skill name is bold --}}
                                    <div class="font-bold text-gray-800 text-sm">
                                        {{ $skill->name }}
                                        @if ($skill->level)
                                            <span class="{{ $skill->level->color() }} p-1 ml-1">{{ $skill->level->title() }}</span>
                                        @endif
                                    </div>

                                    @if (!empty($skill->keywords))
                                        {{-- Modern "Pill" style for keywords - slightly darker and flatter look --}}
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

                {{-- ================= EDUCATION ================= --}}
                @if (!empty($resume->education))
                    <section>
                        <h2 class="section-title">Education</h2>

                        <div class="space-y-4 mt-4">
                            @foreach ($resume->education as $edu)
                                {{-- Used a stronger bottom border separator --}}
                                <div class="space-y-0.5 pb-3 border-b border-gray-100 last:border-b-0">
                                    {{-- Institution name is bold --}}
                                    <div class="font-bold text-sm text-gray-900">
                                        {{ $edu->institution }}
                                    </div>
                                    {{-- Degree info in a new line --}}
                                    <div class="text-sm text-gray-700">
                                        {{ $edu->studyType }} in {{ $edu->area }}
                                    </div>
                                    @if ($edu->score)
                                        <div class="text-xs text-gray-600">
                                            GPA: {{ $edu->score }}
                                        </div>
                                    @endif
                                    {{-- Dates in a separate, smaller line --}}
                                    <div class="text-xs text-gray-500">
                                        {{ $edu->startDate?->format('Y') }} – {{ $edu->endDate?->format('Y') }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                {{-- ================= CERTIFICATIONS & AWARDS ================= --}}
                @if (!empty($resume->certifications) || !empty($resume->awards))
                    <section>
                        <h2 class="section-title">Awards & Certifications</h2>

                        {{-- Changed to a tighter bullet list style --}}
                        <ul class="space-y-2 text-gray-700 mt-4 text-sm list-disc list-inside">
                            @foreach ($resume->certifications as $cert)
                                <li>
                                    <span class="font-medium text-gray-800">{{ $cert->name }}</span>
                                    <span class="text-gray-500">({{ $cert->issuer }})</span>
                                    <span class="text-xs text-gray-500 ml-1">
                                        ({{ $cert->date?->format('Y') }})
                                    </span>
                                </li>
                            @endforeach

                            @foreach ($resume->awards as $award)
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

                {{-- ================= LANGUAGES & INTERESTS ================= --}}
                @if (!empty($resume->languages) || !empty($resume->interests))
                    <section>
                        <h2 class="section-title">Additional</h2>

                        <div class="space-y-5 mt-4">
                            @if (!empty($resume->languages))
                                <div>
                                    {{-- Used bold heading for sub-sections --}}
                                    <div class="font-bold mb-1 text-sm text-gray-800">Languages</div>
                                    <p class="text-gray-700 text-sm">
                                        {{ collect($resume->languages)->map(fn($l) => "{$l->language} ({$l->fluency})")->implode(', ') }}
                                    </p>
                                </div>
                            @endif

                            @if (!empty($resume->interests))
                                <div>
                                    <div class="font-bold mb-1 text-sm text-gray-800">Interests</div>
                                    <p class="text-gray-700 text-sm">
                                        {{ collect($resume->interests)->pluck('name')->implode(', ') }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </section>
                @endif
            </div>

        </div>

    </main>

</body>

</html>