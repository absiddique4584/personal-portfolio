@extends('admin.components.layout')

@section('title')
    Manage Homepage | Portfolio
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Homepage</a></li>
            </ul>
        </div>
    </div><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Homepage</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('homepage.create') }}" class="btn btn-primary pull-right">Add Homepage</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>paragraph</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($homepage as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ substr($row->title,0,18) }}</td>
                                    <td>{{ substr($row->sub_title,0,25) }}</td>
                                    <td>{{ substr($row->paragraph,0,25) }}</td>
                                    <td><img style="width: 40px; height: 40px;" src="{{ asset('uploads/homepage/'.$row->image) }}" alt=""></td>
                                    <td>
                                        <input type="checkbox" {{ $row->status === 'active' ? 'checked':'' }} id="homepageStatus" data-id="{{ $row->id }}" data-toggle="toggle" data-on="Active" data-off="Inactive"
                                               data-size="mini">
                                    </td>
                                    <td>
                                        <a href="{{ route('homepage.edit', base64_encode($row->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="{{ route('homepage.delete', base64_encode($row->id)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
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
