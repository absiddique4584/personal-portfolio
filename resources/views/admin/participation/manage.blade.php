@extends('admin.components.layout')

@section('title')
    Manage Participation | Portfolio
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Participation</a></li>
            </ul>
        </div>
    </div><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-sm-12 ">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Hobbies</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('participations.create') }}" class="btn btn-primary pull-right">Add Participation</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>year-date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($participations as $participation)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $participation->name }}</td>
                                    <td>{{ substr($participation->title,1,20) }}</td>
                                    <td>{{ substr($participation->desc,1,20) }}</td>
                                    <td>{{ $participation->year_date }}</td>
                                    <td>
                                        <input type="checkbox"  {{ $participation->status === 'active' ? 'checked':'' }} id="participationStatus" data-id="{{ $participation->id }}" data-toggle="toggle" data-on="Active" data-off="Inactive" data-size="mini">
                                    </td>
                                    <td>
                                        <a href="{{ route('participations.edit', base64_encode($participation->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="{{ route('participations.delete', base64_encode($participation->id)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
