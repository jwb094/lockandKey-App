<aside class="admin-sidebar d-flex flex-column p-3" id="adminSidebar">

    <!-- Sidebar Header -->

    <div class="d-flex align-items-center justify-content-between mb-4">

        <a href="#" class="text-white text-decoration-none fs-4 fw-bold">
            Admin Panel
        </a>

        <button
            type="button"
            class="btn btn-outline-light sidebar-close"
            id="sidebarClose"
            aria-label="Close navigation"
        >
            &times;
        </button>

    </div>


    <!-- Navigation -->

    <nav class="nav flex-column">

       <a href="#"  class="nav-link active"> 
        {{-- @if(request()->is('admin/dashboard'))
             class="nav-link active"
        @else
             class="nav-link"
        @endif --}}
       
            <span class="me-2"><i class="bi bi-clipboard-data"></i></span>
            Dashboard
        </a>

        <a href="#" class="nav-link">
            <span class="me-2">👥</span>
            Users
        </a>

        <a href="#"
             class="nav-link"
        >
            <span class="me-2"><i class="bi bi-person-lines-fill"></i></span>
            Contacts
        </a>

       <a href="#"
             class="nav-link"
        >
            <span class="me-2"><i class="bi bi-bookmark"></i></span>
            Tags
        </a>
      
        <a href="#"
             class="nav-link"
        >
            <span class="me-2"><i class="bi bi-person-square"></i></span>
            My Profile
        </a>

          <a href="#"
             class="nav-link"
        >
            <span class="me-2"><i class="bi bi-file-earmark-fill"></i></span>
            Export/Import
        </a>

    </nav>


    <!-- Bottom Navigation -->

    <div class="mt-auto">

        <hr class="border-secondary">

       <a href="#"
             class="nav-link"
        >
            <span class="me-2"><i class="bi bi-door-closed-fill"></i></span>
            Logout
             </a>

    </div>

</aside>