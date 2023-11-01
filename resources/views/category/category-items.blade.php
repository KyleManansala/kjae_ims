<!-- CSS -->
<style>
    /* wrapper */
    .dataTables_wrapper {
        position: static;
    }
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

<!-- Table -->
 <div class="container mx-auto my-4">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white overflow-x-auto">
                <table id="productsTable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th class="p-4  text-center">ID</th>
                            <th class="p-4  text-center">Name</th>
                            <th class="p-4  text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td class="text-center px-6 py-4">{{$category->id}}</td>
                            <td class="text-center text-sm px-6 py-4">{{ $category->category_name }}</td>
                            <td class=" whitespace-nowrap px-6 py-4">
                            <div class="flex justify-center items-center space-x-4">
                                    <button onclick="showEditModal('{{ $category->id }}')" class="bg-orange-600 hover:bg-orange-700 text-white font-bold h-10 py-1 px-3 rounded mr-2">Edit</button>
                                <form method="POST" action="{{ route('category.destroy', $category) }}" class="mb-0">
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
