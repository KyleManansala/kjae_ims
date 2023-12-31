{{-- <x-app-layout>
    <x-slot name="header">
        <x-header title="Dashboard" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include("components/welcome-dashboard")

            @include("components/weather")

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-10 mb-4">
                <div class="p-6">
                    <canvas id="categoryChart" width="400" height="200"></canvas>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            var productsTotalQty = @json($productsTotalQty);

 
            var categories = [];
            var totalQuantities = [];

            productsTotalQty.forEach(function (item) {
                categories.push(item.category.category_name);
                totalQuantities.push(item.total_quantity);
            });


            var ctx = document.getElementById('categoryChart').getContext('2d');
            var categoryChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: categories,
                    datasets: [{
                        label: 'Total Product Quantity For Each Product Category',
                        data: totalQuantities,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout> --}}
<x-app-layout>
    <x-slot name="header">
        <x-header title="Dashboard" />
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include("components/welcome-dashboard")

            @include("components/weather")

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <div class="flex flex-col justify-between col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-4 bg-white dark:bg-darkmode-200 shadow-sm rounded-lg p-4">
                    <p class="text-2xl text-primary-100">Inventory Status</p>
                    <canvas id="categoryChart"></canvas>
                </div>
                <div class="flex flex-col justify-between col-span-1 sm:col-span-2 lg:col-span-2 bg-white dark:bg-darkmode-200 shadow-sm rounded-lg p-4">
                    <p class="text-2xl text-primary-100">Category Status</p>
                    <canvas id="categoryPieChart"></canvas>
                </div>
                
            </div>
            

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            var productsTotalQty = @json($productsTotalQty);

            var categories = [];
            var totalQuantities = [];

            productsTotalQty.forEach(function (item) {
                categories.push(item.category.category_name);
                totalQuantities.push(item.total_quantity);
            });

            var ctx = document.getElementById('categoryChart').getContext('2d');
            var categoryChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: categories,
                    datasets: [{
                        label: 'Total Product Quantity For Each Product Category',
                        data: totalQuantities,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Extract data for the pie chart
            var categoriesPie = [];
            var productCountsPie = [];

            productsTotalQty.forEach(function (item) {
                categoriesPie.push(item.category.category_name);
                productCountsPie.push(item.category.inventory.length); // Count of distinct products under each category
            });

            var ctxPie = document.getElementById('categoryPieChart').getContext('2d');
            var categoryPieChart = new Chart(ctxPie, {
                type: 'pie',
                data: {
                    labels: categoriesPie,
                    datasets: [{
                        data: productCountsPie,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 2
                    }]
                }
            });
        });
    </script>
</x-app-layout>
