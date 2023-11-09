<!-- CSS -->
<style>
    /* wrapper */
    .dataTables_wrapper {
        position: static;
    }
		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568 !important; 
			padding-left: 1rem !important; 
			padding-right: 2rem !important;
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
			background: #1e293b !important;
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
			background: #1e293b !important;
			border: 1px solid transparent;
		}
        

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/* Change colour of responsive icon
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #4F6F52 !important;
		} */
	</style>  
  
  <!-- Table -->
  <div class="container mx-auto my-4">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white overflow-x-auto">
                <table id="productsTable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
							<th>Created At</th>
							<th>Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventories as $inventory)
                        <tr>
                            <td class="text-center text-sm">{{ $inventory->product_name }}</td>
                            <td class="text-center text-sm">{{ optional($inventory->category)->category_name }}</td>
                            <td class="text-center text-sm">{{ $inventory->product_quantity }}</td>
                            <td class="text-center text-sm">{{ number_format($inventory->price, 2, '.', ',') }}</td>
							<td class="text-center text-sm">{{ ($inventory->created_at)->format('M d, Y H:i:s') }}</td>
							<td class="text-center text-sm">{{ ($inventory->updated_at)->diffForHumans() }}</td>
                            <td class="text-center text-sm">
                                <div class="flex">
                                    <button onclick="showEditModal('{{ $inventory->id }}')" class="bg-slate-800 hover:bg-slate-900 text-white font-bold h-10 py-1 px-3 rounded mr-2">Edit</button>
									<form id="deleteForm" method="POST" action="{{ route('inventory.destroy', $inventory) }}">
										@csrf
										@method('DELETE')
										<button type="button" class="bg-red-600 hover:bg-red-700 text-white font-bold h-10 py-1 px-3 rounded" onclick="confirmDelete()">Delete</button>
									</form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>