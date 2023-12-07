<div class=" bg-yellow-400 p-4 sm:p-6 overflow-hidden mb-8  rounded-xl shadow-xl">
    <!-- Background illustration -->
    <div class="absolute right-0 top-0 -mt-4 mr-16 pointer-events-none hidden xl:block" aria-hidden="true">

    </div>

    <!-- Content -->
    <div class="">
        <h1 class="text-2xl md:text-3xl  text-white  font-bold mb-1" id="greeting">Loading...</h1>
        <p class="text-white ">This is what your inventory looks like today!</p>
    </div>
</div>

<script>
    // JavaScript to determine the time on the user's device
    var now = new Date();
    var hour = now.getHours();
    var greeting = '';

    if (hour >= 5 && hour < 12) {
        greeting = 'Good morning';
        
    } else if (hour >= 12 && hour < 17) {
        greeting = 'Good afternoon';
    } else {
        greeting = 'Good evening';
    }

    // Update the greeting in the HTML
    document.getElementById('greeting').textContent = greeting ;
</script>