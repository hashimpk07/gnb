# GNB-TECH SOFTWARE SOLUTIONS PVT LTD
  
<h3>  Develop a core PHP application that combines and displays data from three employee tables, implementing filtering and pagination functionalities using AJAX. </h3>
<h4>  </h3>Instructions:  </h4>
<p> Database Structure: </p> 

<p>create and analyze the three employee tables (e.g., employees_1, employees_2, employees_3). </p> 
<p>Create a SQL query to retrieve and combine the following relevant fields</p>
<ui>
  <li>id</li>
  <li>name</li>
  <li>department</li>
  <li>job_title</li>
  <li>email</li>
  <li>hire_date</li>
  <li>salary</li>
  <li>location</li>
  <li>status (e.g., active, inactive)</li>
  <li> Performance_rating</li>
</ui>

<p>Make sure there’s no duplicated records.</p>
<p>Generate and insert 100k dummy employee records on three tables.</p> 
<h4>  Backend Development: </h4>
<p>Establish a secure database connection using PDO with error handling.</p> 
<p>Write a SQL query to retrieve combined employee data with filtering options:</p> 
<p>Allow filters for department, job_title, status, and a date range for
hire_date.</p> 
<h4>  Ensure the query dynamically constructs based on user-selected filter criteria.
Filtering Fields: </h4>
<p>Department Filter:</p>
<p>Field Type: Dropdown or Multi-select</p>
<p>FOptions: List of departments (e.g., HR, IT, Sales, Marketing).</p>
<p>Functionality: Allow users to select one or multiple departments to filter the
<p>Job Title Filter:</p>
<p>Field Type: Dropdown or Multi-select</p>
<p>Options: List of job titles (e.g., Manager, Developer, Analyst, Sales
Representative).</p>
<p>Functionality: Allow users to select one or multiple job titles for filtering.</p>
<p>Status Filter:</p>
<p>Field Type: Radio buttons or Checkbox</p>
<p>Options:</p>
<p>Active</p>
<p>Inactive</p>
<p>Functionality: Allow users to filter employees based on their current employment
<p>Performance Rating Filter:</p>
<p>Field Type: Range Slider or Dropdown</p>
<p>Options: A range of ratings (e.g., 1 to 5).</p>
<p>Functionality: Allow users to select a range of performance ratings to filter the
results.</p>
<p>Hire Date Filter:</p>
<p>Field Type: Date Range Picker</p>
<p>Options: Start Date and End Date inputs.</p>
<p>Functionality: Allow users to filter employees based on their hire date, specifying</p>
<p>range</p>
<p>Field Type: Dropdown or Multi-select</p>
<p>Options: List of locations (e.g., New York, San Francisco, Remote).</p>
<p>Functionality: Allow users to select one or multiple locations for filtering..</p>
<h4> AJAX Implementation:</h4>
<p>Implement AJAX for filtering and pagination:</p>
<p>I Create a PHP script that responds to AJAX requests, returning filtered and
paginated results.</p>
<p>Ensure the client-side script captures filter inputs and current pagination
state, sending these to the server.</p>
<p>Update the displayed results without reloading the page.</p>
<h4>Pagination Logic:</h4> 
<p>Implement pagination logic in the AJAX response:</p> 
<p>Calculate total records and determine the current page based on user
input.</p>
<p>Return the correct subset of results for the current page, along with
pagination controls.</p> 
<h4>Data Presentation:</h4> 
<p>Output the combined data in a structured HTML table format.</p> 
<p> Include column headers for each field and ensure clear data presentation.</p>
<p>Provide filter options (dropdowns or checkboxes) above the table to allow users
to apply filters, triggering the AJAX calls.</p> 

<h2 style="font-weight: bold";>About Laravel</h2>
<p>Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:
</p>
<p>Simple, fast routing engine.
Powerful dependency injection container.
Multiple back-ends for session and cache storage.
Expressive, intuitive database ORM.
Database agnostic schema migrations.
Robust background job processing.
Real-time event broadcasting.</p>
<p>Laravel is accessible, powerful, and provides tools required for large, robust applications</p>

<h2 style="color:red">Laravel 10 Requirements</h2>
<p>Laravel 10.x requires a minimum PHP version of 8.1. </p>
<p>Composer (dependency manager for PHP)</p>
<p>MySQL or another supported database</p>

<h2 style="color:red">Project Setup Instructions : </h2>
<ul>
    <li>Step 1 : Clone the Project Repository : Run the following command to clone the project repository:
                git clone https://github.com/hashimpk07/tranetech.git </li>
    <li>Step 2: Configure Environment Filee :  Create and configure the .env file based on the provided template. </li>
    <li>step 3: Set Database Configuration: Update the .env file with your database settings:  
                <p>DB_CONNECTION=mysql
                    DB_HOST=127.0.0.1
                    DB_PORT=3306
                    DB_DATABASE=tranetech
                    DB_USERNAME=root
                    DB_PASSWORD=
                </p>       
    </li>
    <li>Step 4: Install Dependencies:  Run the following command to update project dependencies, :
            <p> composer update </p>
    </li>
    <li>Step 5: Verify Vendor Directory: Ensure that the vendor directory has been created in the project root. </li>
    <li>Step 6: Ensure Database Exists: Confirm that the specified database exists and is accessible. </li>
    <li>Step 7: Run Migrations: Execute the following command to apply database migrations , <p> php artisan migrate </p>    </li>
    <li>step 8: Start the Development Server: Use the following command to start the Laravel development server:  <p> php artisan serve </p> </li>
    <li>step 9: Access the Application:Open your browser and navigate to the provided URL to view the application:
    Base URL: http://127.0.0.1:8000
    Admin Login URL: http://127.0.0.1:8000/login </li>
</ul>
<h5 style="color:red">Migration: </h5>
<u>To run the tests for application, use
  <li>Run Command :  php artisan migrate  </li>
</u>
<h5 style="color:red">Seeder: </h5>
<u>To run the tests for application, use
  <li>Run Command :  php artisan db:seed  </li>
</u>
