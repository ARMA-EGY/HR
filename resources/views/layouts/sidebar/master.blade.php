<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">{{__('master.HIRING')}}</li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span >{{__('master.EMPLOYEES')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li class=" {{request()->routeIs('master.employee.index') ? 'mm-active' : '' }}"><a href="{{route('master.employee.index')}}"><i class="bx bx-disc fs-16"></i> {{__('master.ALL-EMPLOYEES')}}</a></li>
                        <li class=" {{request()->routeIs('master.employee.create') ? 'mm-active' : '' }}"><a href="{{route('master.employee.create')}}"><i class="bx bx-disc fs-16"></i> {{__('master.CREATE-EMPLOYEE')}}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span >{{__('master.DEPARTMENTS')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li class=" {{request()->routeIs('master.department.index') ? 'mm-active' : '' }}"><a href="{{route('master.department.index')}}"><i class="bx bx-disc fs-16"></i> {{__('master.ALL-DEPARTMENTS')}}</a></li>
                        <li class=" {{request()->routeIs('master.department.create') ? 'mm-active' : '' }}"><a href="{{route('master.department.create')}}"><i class="bx bx-disc fs-16"></i> {{__('master.CREATE-DEPARTMENT')}}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="bx bx-map"></i>
                        <span >{{__('master.LOCATIONS')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="#"><i class="bx bx-disc fs-16"></i> Link</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="bx bxs-flag-alt"></i>
                        <span >{{__('master.NATIONALITIES')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="#"><i class="bx bx-disc fs-16"></i> Link</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="fas fa-file-signature fs-16"></i>
                        <span >{{__('master.CONTRACTS')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li class=" {{request()->routeIs('master.contract.index') ? 'mm-active' : '' }}"><a href="{{route('master.contract.index')}}"><i class="bx bx-disc fs-16"></i> {{__('master.ALL-CONTRACTS')}}</a></li>
                        <li class=" {{request()->routeIs('master.contract.create') ? 'mm-active' : '' }}"><a href="{{route('master.contract.create')}}"><i class="bx bx-disc fs-16"></i> {{__('master.CREATE-CONTRACT')}}</a></li>
                    </ul>
                </li>

                <hr class="hr-light">

                <li class="menu-title">{{__('master.RESOURCES-MANAGEMENT')}}</li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class='bx bx-cube-alt'></i>
                        <span >{{__('master.ASSETS')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="#"><i class="bx bx-disc fs-16"></i> Link</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class='bx bx-car'></i>
                        <span >{{__('master.VEHICLES')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="#"><i class="bx bx-disc fs-16"></i> Link</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class='bx bx-calendar'></i>
                        <span >{{__('master.WORK-SCHEDULES')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="#"><i class="bx bx-disc fs-16"></i> Link</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="fas fa-paste"></i>
                        <span >{{__('master.OTHER-CONTRACTS')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="#"><i class="bx bx-disc fs-16"></i> Link</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>