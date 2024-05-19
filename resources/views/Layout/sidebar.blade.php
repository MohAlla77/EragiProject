
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link text-white" href="{{route('home')}}">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">الرئيسية</span><i class="fa fa-home" aria-hidden="true"></i>
            </a>
            <a class="nav-link text-white" href="{{route('new.car')}}">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">سيارة جديدة</span> <i class="fa fa-car" aria-hidden="true"></i>
            </a>
            <a class="nav-link text-white" href="{{route('Workspace')}}">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">ساحة العمل</span><i class="fa fa-briefcase" aria-hidden="true"></i>
            </a>
            <a class="nav-link dropdown-toggle text-white" href="{{route('purchases')}}" id="purchasesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">المشتريات</span>
                {{-- <i class="fa fa-shopping-cart" aria-hidden="true"></i> --}}
            </a>
            <ul class="dropdown-menu text-center" aria-labelledby="#">
                <li><a class="dropdown-item text-center" href="{{route('purchases')}}">الفواتير</a></li>
                <li><a class="dropdown-item text-center" href="#">الأصناف</a></li>
                <li><a class="dropdown-item text-center" href="{{route('Supplier')}}">الموردين</a></li>
            </ul>
            <a class="nav-link dropdown-toggle text-white" href="{{route('invoice.index')}}" id="invoice.indexDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">المبيعات</span>
            </a>
            <ul class="dropdown-menu text-center" aria-labelledby="#">
                <li><a class="dropdown-item text-center" href="{{route('invoice.index')}}">الفواتير</a></li>
                <li><a class="dropdown-item text-center" href="#">الخدمات</a></li>
                <li><a class="dropdown-item text-center" href="#">التسعير</a></li>
            </ul>
            <a class="nav-link text-white text-end" href="{{route('Tries')}}">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">اطارات</span><i class="fa-brands fa-salesforce"></i>
            </a>
            <a class="nav-link text-white" href="{{route('store')}}">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">المخزن</span><i class="fas fa-database"></i>
            </a>
            <a class="nav-link text-white" href="#">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">عرض</span><i class="fa-solid fa-display"></i>
            </a>
            <a class="nav-link dropdown-toggle text-white" href="{{route('Employees')}}" id="invoice.indexDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">الموظفين</span>
            </a>
            <ul class="dropdown-menu text-center" aria-labelledby="#">
                <li><a class="dropdown-item text-center" href="{{route('Employees')}}">الموظفين</a></li>
                <li><a class="dropdown-item text-center" href="{{route('Employee_requests')}}">طلبات الموظفين</a></li>
            </ul>
            <a class="nav-link text-white" href="{{route('Manage')}}">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">ادارة</span><i class="fas fa-cogs"></i>
            </a>
        </div>
    </div>
</nav>

