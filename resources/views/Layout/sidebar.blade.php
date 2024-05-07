
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
            <a class="nav-link dropdown-toggle text-white" href="#" id="purchasesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">المشتريات</span><i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu text-center" aria-labelledby="purchasesDropdown">
                <li><a class="dropdown-item text-center" href="{{route('purchases')}}">المشتريات</a></li>
                <li><a class="dropdown-item text-center" href="#">الأصناف & الخدمات</a></li>
                <li><a class="dropdown-item text-center" href="{{route('Supplier')}}">الموردين</a></li>
            </ul>
            
            {{-- <a class="nav-link text-white" href="{{route('purchases')}}">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">المشتريات</span><i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </a>
            <a class="nav-link text-white" href="#">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">الاصناف و الخدمات</span><i class="fa-brands fa-servicestack"></i>
            </a>
            <a class="nav-link text-white" href="#">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">الموردين</span><i class="fa-brands fa-supple"></i>
            </a> --}}
            <a class="nav-link text-white" href="{{route('invoice.index')}}">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">المبيعات</span><i class="fa-brands fa-salesforce"></i>
            </a>
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
            <a class="nav-link text-white" href="{{route('Employee_requests')}}">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">طلبات الموظفين</span><i class="fa-solid fa-arrow-up-wide-short"></i>
            </a>
            <a class="nav-link text-white" href="{{route('Manage')}}">
                <div class="sb-nav-link-icon text-white"></div>
                <span class="ms-auto pe-2">ادارة</span><i class="fas fa-cogs"></i>
            </a>
        </div>
    </div>
</nav>

