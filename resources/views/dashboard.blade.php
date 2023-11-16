<x-app-layout>
    <x-slot name="header">
        <x-header title="Dashboard" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="bg-green-600 text-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6">
                    {{ __("Good day! This is what your inventory looks like today!") }}
                </div>
            </div>

            <!-- Display Overview -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:py-8 lg:px-8">
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 mt-4">
                    @foreach($productsTotalQty as $categoryData)
                    <div class="bg-white overflow-hidden shadow sm:rounded-lg h-auto"> 
                        <div class="px-4 py-6 sm:p-8"> 
                            <dl>
                                <p class="text-base leading-6 font-medium text-gray-900">{{ $categoryData['category']->category_name }}</p>
                                <p class="mt-2 text-3xl leading-9 font-semibold text-green-600">{{ $categoryData['total_quantity'] }}</p>
                            </dl>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>        
        </div>
    </div>
</x-app-layout>


