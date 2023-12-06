<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- SweetAlert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">




<!-- Main Page -->
<x-app-layout >
    <x-slot name="header">
        <x-header title="Inventory" />
    </x-slot>
     <!-- Include SweetAlert-->
     @include('sweetalert::alert')
    
     <!-- Buttons -->
     <div class="flex justify-end mb-5">
     <div class="flex self-end gap-2">
            <div>
                <button onclick="showModal()" class="bg-primary-100 hover:bg-primary-200 text-white font-bold py-2 px-4 rounded">Add Product</button>
            </div>
            <div>
                <button onclick="generateReport()" class="bg-primary-100 hover:bg-primary-200 text-white font-bold py-2 px-4 rounded">Download Report</button>
            </div>
    </div>
     </div>

    
    <!-- datatable -->
     @include('inventory.inventory-items')
      
     
        <!-- Add Modal -->
        <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden" id="addProductModal">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50" onclick="hideModal()"></div>
    
            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <form method="POST" action="{{ route('inventory.store') }}">
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
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                                @required(true)
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
                        <button type="submit" class="bg-slate-800 hover:bg-slate-900 text-white font-bold py-2 px-4 rounded">Add Product</button>
                    </form>
                </div>
            </div>
        </div>

     
   <!-- Edit Modal -->
   <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden"id="editProductModal">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50" onclick="hideEditModal()"></div>
    
            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <form id="editProductForm" method="POST" action="">
                        @csrf
                        @method('PUT')
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
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
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
                        <button type="submit" class="bg-slate-800 hover:bg-slate-900 text-white font-bold py-2 px-4 rounded">Update Product</button>
                    </form>
                </div>
            </div>
        </div>


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
                url: '/inventory/' + productId + '/edit/',
                type: 'GET',
                success: function (response) {
                    $('#editProductForm').attr('action', 'inventory/' + productId);
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
				}).columns.adjust().responsive.recalc();
		});

        function generateReport() {
        var confirmed = confirm("Do you want to generate and download the inventory report?");
        if (confirmed) {
            window.location.href = "{{ route('generate.report') }}";
        }
    }

    function confirmDelete() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit(); 
            }
        });
    }
    </script>


</x-app-layout>