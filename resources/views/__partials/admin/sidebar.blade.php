<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">
                Enroll
            </span>
        </a>

        <ul class="sidebar-nav">
        @auth('web')

        <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('dashboard')}}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('schools.index')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Schools</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('applications')}}">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Applications</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('payments.index')}}">
                    <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Payments</span>
                </a>
            </li>

           

            <li class="sidebar-header">
                Tools & Components
            </li>

           

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('logs') }}">
                    <i class="align-middle" data-feather="trending-up"></i> <span class="align-middle">Website Activity</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('support') }}">
                    <i class="align-middle" data-feather="shield"></i> <span class="align-middle">Support</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('settings') }}">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
                </a>
            </li>


        @endauth

        @auth('staff')


        <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('school.dashboard')}}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('school.applications')}}">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Applications</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('payments.index')}}">
                    <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Transfers</span>
                </a>
            </li>


        @endauth

      
         

        
        </ul>


    </div>
</nav>