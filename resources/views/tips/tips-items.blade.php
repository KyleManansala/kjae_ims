<div class="p-5">
    <div class="flex items-center">
        <h1 class="text-4xl text-black font-bold">Planting Calendar</h1>
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar ml-3">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" stroke="black" fill="none"></rect>
            <line x1="16" y1="2" x2="16" y2="6" stroke="black"></line>
            <line x1="8" y1="2" x2="8" y2="6" stroke="black"></line>
            <line x1="3" y1="10" x2="21" y2="10" stroke="black"></line>
        </svg>
    </div>
    <!-- Table for Type One Climate -->
    @include('tips.type-one')

    <!-- Table for Type Two Climate -->
    @include('tips.type-two')

    <!-- Table for Type Three Climate -->
    @include('tips.type-three')

    <!-- Table for Type Four Climate -->
    @include('tips.type-four')
    
</div>