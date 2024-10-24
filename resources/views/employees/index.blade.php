@extends('dashboard')
@section('content')
    <div class="container mt-2" >
  <!--  <button class="btn btn-danger btn-sm edit-btn" style="float:right"; onclick="window.location='{{ URL::route('excel.export'); }}'" > Excel Export </button>-->
    <h5 class="mt-2" style=" border-bottom-style: dotted;; display: block; width: 100%;margin-bottom:20px ">Employee Data</h5>
    
        <!-- Filters -->
        <div class="row mb-4 mt-2" style=" border-bottom: double;">
            <div class="col-md-2">
                <label>Department</label>
                <select id="department" class="form-control"  class="selectpicker" multiple data-live-search="true" >
                    <option value="HR">HR</option>
                    <option value="IT">IT</option>
                    <option value="Sales">Sales</option>
                    <option value="Marketing">Marketing</option>
                </select>
            </div>
            <div class="col-md-2">
                <label>Job Title</label>
                <select id="job_title" class="form-control" class="selectpicker" multiple data-live-search="true">
                    <option value="Manager">Manager</option>
                    <option value="Developer">Developer</option>
                    <option value="Analyst">Analyst</option>
                </select>
            </div>
            <div class="col-md-2">
                <label>Status</label>
                <select id="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="col-md-3" style="margin-bottom: 20px;">
                <label>From</label>
                <input type="date" id="hire_date_from" class="form-control ">
               
            </div>
            <div class="col-md-3" >
                <label>To</label>
                <input type="date" id="hire_date_to" class="form-control">
            </div>
        </div>

        <!-- Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Hire Date</th>
                    <th>Salary</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="employee-table-body">
                <!-- Employee rows will be loaded here via AJAX -->
            </tbody>
        </table>

        <!-- Pagination -->
        <div id="pagination-links">
            <!-- Pagination links will be loaded here -->
        </div>

        <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="employeeModalLabel">Employee Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p ><strong>Name:</strong> <span id="view_name"></span></p>
                        <p><strong>Department:</strong> <span id="view_department"></span></p>
                        <p><strong>Job Title:</strong> <span id="view_job_title"></span></p>
                        <p><strong>Email:</strong> <span id="view_email"></span></p>
                        <p><strong>Hire Date:</strong> <span id="view_hire_date"></span></p>
                        <p><strong>Salary:</strong> <span id="view_salary"></span></p>
                        <p><strong>Location:</strong> <span id="view_location"></span></p>
                        <p><strong>Status:</strong> <span id="view_status"></span></p>
                        <p><strong>Performance Rating:</strong> <span id="view_performance_rating"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script>
        $(document).ready(function() {
            $('#department').selectpicker();
            $('#job_title').selectpicker();  
        });
        function fetchEmployees(page = 1) {
            const department = $('#department').val();
            const job_title = $('#job_title').val();
            const status = $('#status').val();
            const hire_date_from = $('#hire_date_from').val();
            const hire_date_to = $('#hire_date_to').val();

            $.ajax({
                url: "{{ route('employees.fetch') }}",
                method: 'GET',
                data: {
                    department,
                    job_title,
                    status,
                    hire_date_from,
                    hire_date_to,
                    page
                },
                success: function(data) {
                    let rows = '';
                    data.data.forEach(employee => {
                        rows += `
                            <tr>
                                <td>${employee.name}</td>
                                <td>${employee.department}</td>
                                <td>${employee.email}</td>
                                <td>${employee.hire_date}</td>
                                <td>${employee.salary}</td>
                                <td>${employee.status}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm view-btn" data-id="${employee.id}">View</button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#employee-table-body').html(rows);
                    $('#pagination-links').html(data.links);
                }
            });
        }
        fetchEmployees();
        $('#department, #job_title, #status, #hire_date_from, #hire_date_to').on('change', function() {
            fetchEmployees();
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            const page = $(this).attr('href').split('page=')[1];
            fetchEmployees(page);
        });

        $(document).on('click', '.view-btn', function() {
            const employeeId = $(this).data('id');

            $.ajax({
        url: `/employees/${employeeId}`, 
        method: 'GET',
        success: function(response) {

            $('#view_name').text(response.name);
            $('#view_department').text(response.department);
            $('#view_job_title').text(response.job_title);
            $('#view_email').text(response.email);
            $('#view_hire_date').text(response.hire_date);
            $('#view_salary').text(response.salary);
            $('#view_location').text(response.location);
            $('#view_status').text(response.status);
            $('#view_performance_rating').text(response.performance_rating);
            
            $('#employeeModal').modal('show');
        },
        error: function(xhr) {
            console.log(xhr.responseText); 
        }
    });
});

</script>
@endsection