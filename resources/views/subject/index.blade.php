@extends('layouts.app')

@section('title', 'Subjects')

@section('styles')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('page-heading')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>School Subjects</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="active">
                    <a href="{{ url('admin/subjects') }}">Subjects</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
 </div>
@endsection

@section('content')

<div class="wrapper wrapper-content">


<div class="row">
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Subjects offered in school</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover school-subjects-dataTables" >
                                    <thead>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Category </th>
                                        <th>Subject code</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subjects as $subject)
                                    <tr class="gradeA">
                                        <td>{{ $subject->name }}</td>
                                        <td>{{ $subject->category or 'N/A' }}</td>
                                        <td>{{ $subject->short_name or 'N/A' }}</td>
                                        <td class="center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline btn-xs btn-primary">View</button>
                                                <button type="button" class="btn btn-outline btn-xs btn-primary">Edit</button>
                                            </div>
                                        </td>

                                    </tr>
                                   @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Category </th>
                                        <th>Subject code</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    </table>
                                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Create New Subject</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>


                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <form class="form-horizontal" method="POST" action="{{ url('admin/subjects') }}">
                 {!! csrf_field() !!}

                    <p>Add new subject</p>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Subject Name *</label>
                        <div class="col-lg-8">
                            <input placeholder="subject name" class="form-control" type="text" name="name" autofocus="" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Subject Category *</label>
                        <div class="col-lg-8">
                            <input placeholder="subject category" class="form-control" type="text" name="category" required=""><span class="help-block m-b-none">e.d science, arts</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Subject Code *</label>
                        <div class="col-lg-8">
                            <input placeholder="code name for subject" class="form-control" type="text" name="short_name" required="">
                            <span class="help-block m-b-none">short name eg, Math for Mathematics</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-4 col-lg-8">
                            <button class="btn btn-sm btn-white" type="submit">Add subject</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

</div>
@endsection


@section('scripts')
<script src=" {{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>

<script>
 $(document).ready(function(){


            $('.school-subjects-dataTables').DataTable({

                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'pdf', title: 'students'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');

                    }
                    }
                ]

            });

})


</script>

@endsection