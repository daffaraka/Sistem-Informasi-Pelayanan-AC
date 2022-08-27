@extends('clients.client-layout')
@section('title', 'Dashboard User')
@section('content')
    <div class="container p-3">
        <div class="row flex-nowrap">
            {{-- <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 h-50">
            </div> --}}
                {{-- <a href="/" class="d-flex align-items-center pb-1 my-2 mb-md-0 me-md-auto text-decoration-none link-dark ">
                   <h4>  <span class="fs-5 d-none d-sm-inline fw-bold">Menu</span></h4> 
                </a> --}}
                {{-- <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 card bg-light text-white">
                  
                     <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu"> 
                       
                        <div class="dropdown pb-4">
                            <a href="#"
                                class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                                    class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1">loser</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Sign out</a></li>
                            </ul>
                        </div> 
                </div> --}}
            

           
            <div class="col py-2 px-5">
               
                <h4 class="fw-bold">   @yield('content-user-title') </h4>
             
                @yield('content-user')
            </div>

        </div>
    </div>
@endsection
@push('script')
    
@endpush
