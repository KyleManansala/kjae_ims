
<x-app-layout>
    <x-slot name="header">
        <x-header title="Inventory" />
    </x-slot>
    <button onclick="showModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ">
        Add Product
    </button>
    
    <!-- Modal for adding a new product -->
    <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden" id="addProductModal">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50" onclick="hideModal()"></div>
    
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <form method="POST" action="{{ route('inventory.add') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="productName" class="block text-gray-700 text-sm font-bold mb-2">Product Name</label>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded" id="productName" name="productName" required>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                        <select class="w-full p-2 border border-gray-300 rounded" id="category" name="category" required>
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="productQuantity" class="block text-gray-700 text-sm font-bold mb-2">Product Quantity</label>
                        <input type="number" class="w-full p-2 border border-gray-300 rounded" id="productQuantity" name="productQuantity" required>
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                        <input type="number" class="w-full p-2 border border-gray-300 rounded" id="price" name="price" step="0.01" required>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Product</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showModal() {
            document.getElementById('addProductModal').classList.remove('hidden');
        }

        function hideModal() {
            document.getElementById('addProductModal').classList.add('hidden');
        }
    </script>

    <form method="POST" action="{{ route('inventory.search') }}">
        @csrf
        <select name="category" onchange="this.form.submit()">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </form>

    <div>
        @if ($products->isEmpty())
        <div class="text-center py-4">
            No products under this category!
        </div>
        @endif
    </div>

    <form method="POST" action="{{ route('inventory.search') }}">
        @csrf
        <input type="text" name="search" placeholder="Search Product...">
        <button type="submit">Search</button>
    </form>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Product Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ optional($product->category)->category_name }}</td>
                <td>{{ $product->product_quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <button onclick="showEditModal({{ $product->product_id }})" class="bg-orange-400 hover:bg-orange-600 text-white font-bold py-1 px-3 rounded">Edit</button>
                    <form method="POST" action="{{ route('inventory.delete', $product->product_id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-400 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden" id="editProductModal">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50" onclick="hideEditModal()"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <form id="editProductForm" method="POST" action="{{ route('inventory.update', '__productId__') }}">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <label for="productName" class="block text-gray-700 text-sm font-bold mb-2">Product Name</label>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded" id="productNameEdit" name="productName" required>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                        <select class="w-full p-2 border border-gray-300 rounded" id="categoryEdit" name="category" required>
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="productQuantity" class="block text-gray-700 text-sm font-bold mb-2">Product Quantity</label>
                        <input type="number" class="w-full p-2 border border-gray-300 rounded" id="productQuantityEdit" name="productQuantity" required>
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                        <input type="number" class="w-full p-2 border border-gray-300 rounded" id="priceEdit" name="price" step="0.01" required>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Product</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showEditModal(productId) {
    @foreach($products as $product)
        if({{ $product->product_id }} === productId) {
            document.getElementById('editProductForm').action = "{{ route('inventory.update', '_productId_') }}".replace('_productId_', productId);
            document.getElementById('productNameEdit').value = "{{ $product->product_name }}";
            document.getElementById('categoryEdit').value = "{{ $product->category_id }}";
            document.getElementById('productQuantityEdit').value = "{{ $product->product_quantity }}";
            document.getElementById('priceEdit').value = "{{ $product->price }}";
            document.getElementById('editProductModal').classList.remove('hidden');
        }
    @endforeach
}

        function hideEditModal() {
            document.getElementById('editProductModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
