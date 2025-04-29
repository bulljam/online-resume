<x-layout :title="($resume->basics->name . ' - Resume')">

    <x-header :basics="$resume->basics" />

    <div class="grid grid-cols-1 lg:grid-cols-[3fr_2fr] gap-x-12 main-grid">

        <div class="lg:space-y-12 space-y-10">

            <x-summary :summary="$resume->basics->summary" />
            <x-work :work="$resume->work" />
            <x-project :projects="$resume->projects" />

        </div>

        <div class="lg:space-y-12 space-y-10 mt-8 lg:mt-0 sidebar">

            <x-education :education="$resume->education" />
            <x-certification :certifications="$resume->certifications" :awards="$resume->awards" />
            <x-skill :skills="$resume->skills" />
            <x-language :languages="$resume->languages" :interests="$resume->interests" />

        </div>

    </div>
</x-layout>