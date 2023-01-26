@extends('__partials.base')

@section('content')
    <div class="wrapper">
         @include('__partials.admin.sidebar')

        <div class="main">
            @include('__partials.admin.navbar')




            <main class="content">
                <div class="container-fluid p-0">
                @include('__partials.admin.flashMessage')


                    <h4 class="h3 mb-3">@yield('page-title')</h4>

                    @yield('page-content')

                </div>
            </main>

            @include('__partials.admin.footer')

        </div>
    </div>

@endSection



<form class="d-none" id="logout-form" method="POST" action="{{route('logout')}}"> 
    @csrf
</form>