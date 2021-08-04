@extends('layouts.master')
@section('page_title', 'Dashboard')
@section('content')

    <div class="row pr-2 pl-2">
        <div class="col-md-12 card">
            <h3 class="mt-2 mb-2 pt-2 text-center text-blue-300 ">Welcome, {{ Auth::user()->name }}</h3>
            <h4 class="mb-2 pb-2 text-center text-blue-300 ">Please select an action from left sidebar menu... </h4>
        </div>
    </div>
    @if(Qs::userIsTeamSA())
       <div class="row">
           <div class="col-md-6">
               <div class="card card-body bg-brown-300 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0">{{ $users->where('user_type', 'student')->count() }}</h3>
                           <span class="text-uppercase font-size-xs font-weight-bold">Total Students</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users2 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-md-6">
               <div class="card card-body bg-indigo-300 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0">{{ $users->where('user_type', 'teacher')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Teachers</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users2 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

{{--           <div class="col-sm-6 col-xl-3">--}}
{{--               <div class="card card-body bg-success-400 has-bg-image">--}}
{{--                   <div class="media">--}}
{{--                       <div class="mr-3 align-self-center">--}}
{{--                           <i class="icon-pointer icon-3x opacity-75"></i>--}}
{{--                       </div>--}}

{{--                       <div class="media-body text-right">--}}
{{--                           <h3 class="mb-0">{{ $users->where('user_type', 'admin')->count() }}</h3>--}}
{{--                           <span class="text-uppercase font-size-xs">Total Administrators</span>--}}
{{--                       </div>--}}
{{--                   </div>--}}
{{--               </div>--}}
{{--           </div>--}}

{{--           <div class="col-sm-6 col-xl-3">--}}
{{--               <div class="card card-body bg-indigo-400 has-bg-image">--}}
{{--                   <div class="media">--}}
{{--                       <div class="mr-3 align-self-center">--}}
{{--                           <i class="icon-user icon-3x opacity-75"></i>--}}
{{--                       </div>--}}

{{--                       <div class="media-body text-right">--}}
{{--                           <h3 class="mb-0">{{ $users->where('user_type', 'parent')->count() }}</h3>--}}
{{--                           <span class="text-uppercase font-size-xs">Total Parents</span>--}}
{{--                       </div>--}}
{{--                   </div>--}}
{{--               </div>--}}
{{--           </div>--}}
       </div>
       @endif

    {{--Events Calendar Begins--}}
{{--    <div class="card">--}}
{{--        <div class="card-header header-elements-inline">--}}
{{--            <h5 class="card-title">School Events Calendar</h5>--}}
{{--         {!! Qs::getPanelOptions() !!}--}}
{{--        </div>--}}

{{--        <div class="card-body">--}}
{{--            <div class="fullcalendar-basic"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
    {{--Events Calendar Ends--}}
    @endsection
