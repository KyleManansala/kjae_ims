<x-app-layout>
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
                        label: 'Total Product Quantity',
                        data: totalQuantities,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
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
</x-app-layout>
