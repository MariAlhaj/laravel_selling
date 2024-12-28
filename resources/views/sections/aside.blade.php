

<aside
class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
id="sidenav-main">
<div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
        target="_blank">
        <img src="assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">My Store</span>
    </a>
</div>
<hr class="horizontal light mt-0 mb-2">
<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link text-white " href="{{ route('all_products') }}">

                <span class="nav-link-text ms-1">Products</span>
            </a>
        </li>

        <li class="nav-item">
            {{--  --}}
            <a class="nav-link text-white " href=" {{ route('page_orders') }} ">

                <span class="nav-link-text ms-1">Orders</span>
            </a>
        </li>
        <li class="nav-item">

            <a class="nav-link text-white " href="{{ route('page_category') }}">

                <span class="nav-link-text ms-1">Categories</span>
            </a>
        </li>
        <li class="nav-item">
            {{--    --}}
            <a class="nav-link text-white " href="{{ route('page_customer') }}">

                <span class="nav-link-text ms-1">Customers</span>
            </a>
        </li>

    </ul>
</div>

</aside>

