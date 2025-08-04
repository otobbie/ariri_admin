<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ config('app.name', 'Laravel') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Flowbite  -->
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

  <!-- Datatable for flowbite  -->
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3/dist/style.css" rel="stylesheet" type="text/css">
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>


</head>

<body
  x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
  x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
  :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">
  <!-- ===== Preloader Start ===== -->
    @include('layouts.preload')
  <!-- ===== Preloader End ===== -->

  <!-- ===== Page Wrapper Start ===== -->
  <div class="flex h-screen overflow-hidden">
    <!-- ===== Sidebar Start ===== -->
    @include('layouts.sidebar')
    <!-- ===== Sidebar End ===== -->

    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
      <!-- ===== Header Start ===== -->
      @include('layouts.header')
      <!-- ===== Header End ===== -->

      <!-- ===== Main Content Start ===== -->
      <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            @yield('content')
        </div>
      </main>
      <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
  </div>
  <!-- ===== Page Wrapper End ===== -->


<!-- Hours worked datatable script -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
      fetch("{{ route('clock.hours') }}", {
          method: "GET",
          headers: {
              "X-Requested-With": "XMLHttpRequest"
          }
      })
      .then(response => response.json())
      .then(data => {
          let tbody = document.querySelector("#hours-table tbody");
          tbody.innerHTML = ""; // Clear existing rows

          data.data.forEach(hours => {
              let row = `<tr>
                  <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">${hours.staff_name}</td>
                  <td>${hours.hours_worked}</td>
                  <td>${hours.created_at}</td>
              </tr>`;
              tbody.innerHTML += row;
          });

          // Initialize Simple-DataTables AFTER data is loaded
          if (typeof simpleDatatables !== "undefined" && document.getElementById("hours-table")) {
              new simpleDatatables.DataTable("#hours-table", {
                  searchable: true,
                  sortable: false,
              });
          }
      })
      .catch(error => console.error("Fetch error:", error));
  });

</script>

<!-- staffs Datatable script  -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
      fetch("{{ route('staffs.data') }}", {
          method: "GET",
          headers: {
              "X-Requested-With": "XMLHttpRequest"
          }
      })
      .then(response => response.json())
      .then(data => {
          let tbody = document.querySelector("#search-table tbody");
          tbody.innerHTML = ""; // Clear existing rows

          data.data.forEach(staff => {
              let row = `<tr>
                  <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">${staff.name}</td>
                  <td>${staff.email}</td>
                  <td>${staff.created_at}</td>
                  <td>${staff.access_control}</td>
                  <td>
                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" data-user-id="${staff.id}" class="delete-btn focus:outline-none text-white bg-red-500 hover:bg-red-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-500 dark:hover:bg-red-700 dark:focus:ring-red-500" type="button">
                      Delete
                    </button>
                  </td>
              </tr>`;
              tbody.innerHTML += row;
          });

          // Initialize Simple-DataTables AFTER data is loaded
          if (typeof simpleDatatables !== "undefined" && document.getElementById("search-table")) {
              new simpleDatatables.DataTable("#search-table", {
                  searchable: true,
                  sortable: false,
              });
          }
      })
      .catch(error => console.error("Fetch error:", error));
  });

</script>

<!-- modal script -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
      // Get modal element
      var modalElement = document.getElementById("popup-modal");

      // Initialize Flowbite modal
      var modal = new Modal(modalElement);
      // modal.show();

      // Select delete buttons
      var deleteButtons = document.querySelectorAll(".delete-btn");
      var deleteUserForm = document.getElementById("deleteUserForm");

        // Ensure delete buttons exist
      if (deleteButtons.length === 0) {
          console.error("No delete buttons found.");
          return;
      }
      
      deleteButtons.forEach(button => {
        console.log('here');
          button.addEventListener("click", function () {
              var userId = button.getAttribute("data-user-id");
              deleteUserForm.action = "/staffs/" + userId; // Update form action
              modal.show(); // Show modal
          });
      });

      // Handle cancel button
      // document.getElementById("cancel-button").addEventListener("click", function () {
      //     modal.hide();
      // });
  });
</script>

<!-- staff hours filter by month -->
<script>
  document.getElementById('monthPicker').addEventListener('change', function () {
      const selectedMonth = this.value; // Format: YYYY-MM
      const table = document.getElementById('hours-table');
      const tbody = table.querySelector('tbody');
      const rows = tbody.querySelectorAll('tr');

      rows.forEach(row => {
          const dateCell = row.cells[2]; // 3rd column, index 2
          if (!dateCell) return;

          const dateValue = dateCell.textContent.trim();
          const rowMonth = dateValue.slice(0, 7); // Get 'YYYY-MM' part

          if (!selectedMonth || rowMonth === selectedMonth) {
              row.style.display = '';
          } else {
              row.style.display = 'none';
          }
      });
  });

</script>


<!-- Flowbite js  -->
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>