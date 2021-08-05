@extends('layouts.master')
@section('page_title', 'View Marks')
@section('content')
{{--    <div class="card">--}}
{{--        <div class="card-header header-elements-inline">--}}
{{--            --}}
{{--            {!! Qs::getPanelOptions() !!}--}}
{{--        </div>--}}
{{--        <h5 class="card-title"><i class="icon-books mr-2"></i> Tabulation Sheet</h5>--}}

        <div class="card-body">
        <form method="post" action="{{ route('marks.tabulation_select') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exam_id" class="col-form-label font-weight-bold">Exam:</label>
                                        <select required id="exam_id" name="exam_id" class="form-control select" data-placeholder="Select Exam">
                                            @foreach($exams as $exm)
                                                <option {{ ($selected && $exam_id == $exm->id) ? 'selected' : '' }} value="{{ $exm->id }}">{{ $exm->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="my_class_id" class="col-form-label font-weight-bold">Class:</label>
                                        <select onchange="getClassSections(this.value)" required id="my_class_id" name="my_class_id" class="form-control select" data-placeholder="Select Class">
                                            <option value=""></option>
                                            @foreach($my_classes as $c)
                                                <option {{ ($selected && $my_class_id == $c->id) ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="section_id" class="col-form-label font-weight-bold">Section:</label>
                                        <select required id="section_id" name="section_id" data-placeholder="Select Class First" class="form-control select">
                                            @if($selected)
                                                @foreach($sections->where('my_class_id', $my_class_id) as $s)
                                                    <option {{ $section_id == $s->id ? 'selected' : '' }} value="{{ $s->id }}">{{ $s->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                </form>
        </div>
{{--    </div>--}}

    {{--if Selction Has Been Made --}}

    @if($selected)
        <div class="">
            <div class="">
                <h6 class="card-title font-weight-bold text-black-50 ml-3">{{ $my_class->name.' '.$section->name.' - '.$ex->name.' - Session '.$year }}</h6>
            </div>
            <div class="card">
                <table class="table table-responsive">
                    <thead>
                    <tr>
{{--                        <th>#</th>--}}
                        <th>Name</th>
                       @foreach($subjects as $sub)
                       <th title="{{ $sub->name }}" rowspan="2" class="text-center">{{$sub->name}}</th>
                       @endforeach
                        {{--@if($ex->term == 3)
                        <th>1ST TERM TOTAL</th>
                        <th>2ND TERM TOTAL</th>
                        <th>3RD TERM TOTAL</th>
                        <th style="color: darkred">CUM Total</th>
                        <th style="color: darkblue">CUM Average</th>
                        @endif--}}
                        <th class="text-center">Total Marks</th>
                        <th class="text-center">Average Marks</th>
{{--                        <th style="color: darkgreen">Position</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $s)
                        <tr>
{{--                            <td>{{ $loop->iteration }}</td>--}}
                            <td style="text-align: left">{{ $s->user->name }}</td>
                            @foreach($subjects as $sub)
                            <td class="text-center">{{ $marks->where('student_id', $s->user_id)->where('subject_id', $sub->id)->first()->$tex ?? '-' ?: '-' }}</td>
                            @endforeach

                            {{--@if($ex->term == 3)
                                --}}{{--1st term Total--}}{{--
                            <td>{{ Mk::getTermTotal($s->user_id, 1, $year) ?? '-' }}</td>
                            --}}{{--2nd Term Total--}}{{--
                            <td>{{ Mk::getTermTotal($s->user_id, 2, $year) ?? '-' }}</td>
                            --}}{{--3rd Term total--}}{{--
                            <td>{{ Mk::getTermTotal($s->user_id, 3, $year) ?? '-' }}</td>
                            @endif--}}

                            <td class="text-center">{{ $exr->where('student_id', $s->user_id)->first()->total ?: '-' }}</td>
                            <td class="text-center">{{ $exr->where('student_id', $s->user_id)->first()->ave ?: '-' }}</td>
{{--                            <td>{!! Mk::getSuffix($exr->where('student_id', $s->user_id)->first()->pos) ?: '-' !!}</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--Print Button--}}
{{--                <div class="text-center mt-4">--}}
{{--                    <a target="_blank" href="{{  route('marks.print_tabulation', [$exam_id, $my_class_id, $section_id]) }}" class="btn btn-danger btn-lg"><i class="icon-printer mr-2"></i> Print Tabulation Sheet</a>--}}
{{--                </div>--}}
            </div>
        </div>
    @endif
@endsection
