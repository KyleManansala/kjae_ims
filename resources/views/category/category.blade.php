<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- SweetAlert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<!-- Title -->
<!-- <title>Category</title> -->



<x-app-layout>
    <x-slot name="header">
        <x-header title="Category" />
    </x-slot>

    <!-- Include SweetAlert-->
    @include('sweetalert::alert')

    <button onclick="showModal()" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">Add Category</button>


    <!-- datatable -->
    @include('category.category-items')



 

    <!-- Add Modal -->
    <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden" id="addCategoryModal">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50" onclick="hideModal()"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <form method="POST" action="{{ route('category.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="categoryName" class="block text-gray-700 text-sm font-bold mb-2">Category Name</label>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded text-gray-700" id="categoryName" name="categoryName" required>
                    </div>
                    <button type="submit" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">Add Category</button>
                </form>
            </div>
        </div>
    </div>

       <!-- Edit Modal -->
       <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden" id="editCategoryModal">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50" onclick="hideEditModal()"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <form id="editCategoryForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <div class="mb-4">
                            <label for="editCategoryName" class="block text-gray-700 text-sm font-bold mb-2">Category Name</label>
                            <input type="text" class="w-full p-2 border border-gray-300 rounded text-gray-700" id="editCategoryName" name="categoryName">
                        </div>
                    </div>
                    <button type="submit" class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">Update Category</button>
                </form>
            </div>
        </div>
    </div>


    <!-- Functions -->
    <script>
        //Add Modal
        function showModal() {
            document.getElementById('addCategoryModal').classList.remove('hidden');
            document.getElementById('addCategoryModal').style.zIndex = '9999';
        }

        function hideModal() {
            document.getElementById('addCategoryModal').classList.add('hidden');
        }

        //Edit Modal
        function showEditModal(category_id) {
            $.ajax({
                url: '/category/' + category_id + '/edit/',
                type: 'GET',
                success: function(response) {
                    $('#editCategoryForm').attr('action', 'category/' + category_id);
                    $('#editCategoryName').val(response.category_name);
                    document.getElementById('editCategoryModal').classList.remove('hidden');
                    document.getElementById('editCategoryModal').style.zIndex = '9999';
                }
            })
        }

        function hideEditModal() {
            document.getElementById('editCategoryModal').classList.add('hidden');
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