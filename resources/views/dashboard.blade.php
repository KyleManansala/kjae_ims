<title>Dashboard</title>
<x-app-layout>
    <x-slot name="header">
        <x-header title="Dashboard" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="bg-slate-800 text-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6">
                    {{ __("Good day! This is what your inventory looks like today!") }}
                </div>
            </div>

            <!-- Categories -->
            <div class="mt-4">
                @foreach($productsTotalQty as $categoryData)
                    <div class="bg-white text-black rounded-b-lg border-t-8 border-slate-800 overflow-hidden shadow-sm sm:rounded-lg mb-4 p-8">
                        <div>
                            <h2 class="text-xl font-semibold">{{ $categoryData['category']->category_name }}</h2>
                            <p class="text-lg">Total Product Quantity: </p>
                            <p class="text-lg text-green-800 font-bold">= {{ $categoryData['total_quantity'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

          
        </div>
    </div>
</x-app-layout>
