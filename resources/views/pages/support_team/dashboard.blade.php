@extends('layouts.master')
@section('page_title', 'Dashboard')
@section('content')

    <div class="row pr-2 pl-2">
        <div class="col-md-12 card">
            <h3 class="mt-2 mb-2 pt-2 text-center text-blue-300 ">Welcome, {{ Auth::user()->name }}</h3>
            <h4 class="mb-2 pb-2 text-center text-blue-300 ">Please select an action from left sidebar menu... </h4>
        </div>
    </div>
    @if(Qs::userIsTeamSAT())
       <div class="row">

           <div class="col-md-6">
               <div class="card">
                   <div class="card-body">
                       <h4 class="card-title ml-3">System Stats</h4>

                       <table class="table">

                           <tbody>
                           <tr>
                               <td>Super Admin</td>
                               <td>{{ $users->where('user_type', 'super_admin')->count() }}</td>
                           </tr>
                           <tr>
                               <td>Admin</td>
                               <td>{{ $users->where('user_type', 'admin')->count() }}</td>
                           </tr>
                           <tr>
                               <td>Teacher</td>
                               <td>{{ $users->where('user_type', 'teacher')->count() }}</td>
                           </tr>
                           <tr>
                               <td>Student</td>
                               <td>{{ $users->where('user_type', 'student')->count() }}</td>
                           </tr>
                           <tr>
                               <td>Parent</td>
                               <td>{{ $users->where('user_type', 'parent')->count() }}</td>
                           </tr>
                           <tr>
                               <td>Total Classes</td>
                               <td>{{$classes}}</td>
                           </tr>
                           <tr>
                               <td>Total Sections</td>
                               <td>{{$sections}}</td>
                           </tr>

                           </tbody>
                       </table>

                   </div>
               </div>
           </div>
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
