<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- SweetAlert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<!-- Title -->
<title>Inventory</title>


<!-- Main Page -->
<x-app-layout>
    <!-- Include SweetAlert-->
    @include('sweetalert::alert')
    <x-slot name="header">
        <x-header title="Inventory" />
    </x-slot>

    <button onclick="showModal()" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">Add Product</button>

    <!-- Add Modal -->
    <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden" id="addProductModal">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50" onclick="hideModal()"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <form method="POST" action="{{ route('inventory.add') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="productName" class="block text-gray-700 text-sm font-bold mb-2">Product Name</label>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded text-gray-700" id="productName" name="productName" required>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                        <select class="w-full p-2 border border-gray-300 rounded text-gray-700" id="category" name="category" required>
                            <option value="">Select...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="productQuantity" class="block text-gray-700 text-sm font-bold mb-2">Product Quantity</label>
                        <input type="number" class="w-full p-2 border border-gray-300 rounded text-gray-700" id="productQuantity" name="productQuantity" required>
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                        <input type="number" class="w-full p-2 border border-gray-300 rounded text-gray-700" id="price" name="price" step="0.01" required>
                    </div>
                    <button type="submit" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">Add Product</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Edit Modal -->
    <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden" id="editProductModal">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50" onclick="hideEditModal()"></div>
    
            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <form id="editProductForm" method="POST" action="">
                        @csrf
                        @method('POST')
                        <div class="mb-4">
                            <div class="mb-4">
                                <label for="editProductName" class="block text-gray-700 text-sm font-bold mb-2">Product Name</label>
                                <input type="text" class="w-full p-2 border border-gray-300 rounded text-gray-700" id="editProductName" name="productName">
                            </div>
                            <div class="mb-4">
                                <label for="editCategory" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                                <select class="w-full p-2 border border-gray-300 rounded text-gray-700" id="editCategory" name="category">
                                    <option value="">Select...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="editProductQuantity" class="block text-gray-700 text-sm font-bold mb-2">Product Quantity</label>
                                <input type="number" class="w-full p-2 border border-gray-300 rounded text-gray-700" id="editProductQuantity" name="productQuantity">
                            </div>
                            <div class="mb-4">
                                <label for="editPrice" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                                <input type="number" class="w-full p-2 border border-gray-300 rounded text-gray-700" id="editPrice" name="price" step="0.01">
                            </div>
                        </div>
                        <button type="submit" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    

    <!-- Table -->
    <div class="container mx-auto my-4">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <table id="productsTable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
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
                            <td class="text-center text-sm">{{ $product->product_name }}</td>
                            <td class="text-center text-sm">{{ optional($product->category)->category_name }}</td>
                            <td class="text-center text-sm font-bold">{{ $product->product_quantity }}</td>
                            <td class="text-center text-sm font-bold">{{ $product->price }}</td>
                            <td class="text-center text-sm">
                                <div class="flex">
                                    <button onclick="showEditModal({{ $product->product_id }})" class="bg-orange-600 hover:bg-orange-700 text-white font-bold h-10 py-1 px-3 rounded mr-2">Edit</button>
                                    <form method="POST" action="{{ route('inventory.delete', $product->product_id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold h-10 py-1 px-3 rounded">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>

    <!-- CSS -->
    <style>
		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
            cursor: pointer;
			color: #4a5568 !important; 
			padding-left: 1rem !important; 
			padding-right: 1rem !important;
			padding-top: .5rem !important;
			padding-bottom: .5rem !important;
			line-height: 1.25 !important;
			border-width: 2px !important;
			border-radius: .25rem !important;
			border-color: #edf2f7 !important;
			background-color: #edf2f7 !important;
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover,
		table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			font-weight: 700;
			border-radius: .25rem;
			border: 1px solid transparent;
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
			color: #fff !important;
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			font-weight: 700;
			border-radius: .25rem;
			background: #166534 !important;
			border: 1px solid transparent;
		}


        /*Pagination Buttons - Next, Previous - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button.next:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button.previous:hover {
            cursor: pointer;
            color: white !important;
        }

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			color: #fff !important;
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			font-weight: 700;
			border-radius: .25rem;
			background: #166534 !important;
			border: 1px solid transparent;
		}
        

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #4F6F52 !important;
		}
	</style>

    <!-- Functions -->
    <script>
        //Add Modal
        function showModal() {
            document.getElementById('addProductModal').classList.remove('hidden');
            document.getElementById('addProductModal').style.zIndex = '9999'; 
        }

        function hideModal() {
            document.getElementById('addProductModal').classList.add('hidden');
        }

        //Edit Modal
        function showEditModal(productId) {
            $.ajax({
                url: '/inventory/edit/' + productId,
                type: 'GET',
                success: function (response) {
                    $('#editProductForm').attr('action', 'inventory/update/' + productId);
                    $('#editProductName').val(response.product_name);
                    $('#editCategory').val(response.category_id);
                    $('#editProductQuantity').val(response.product_quantity);
                    $('#editPrice').val(response.price);
                    document.getElementById('editProductModal').classList.remove('hidden');
                    document.getElementById('editProductModal').style.zIndex = '9999';
                }
            })
        }

        function hideEditModal() {
            document.getElementById('editProductModal').classList.add('hidden');
        }


        //Datatables
        $(document).ready(function() {

			var table = $('#productsTable').DataTable({
					responsive: true
				})
                
				.columns.adjust()
				.responsive.recalc();
		});
    </script>


</x-app-layout>