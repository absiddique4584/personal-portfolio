@extends('admin.components.layout')

@section('title')
    Manage Blog | Portfolio
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Blogs</a></li>
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
                            <h3>Blogs</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('blogs.create') }}" class="btn btn-primary pull-right">Add Blog</a>
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
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ substr($blog->name,0,18) }}</td>
                                    <td>{{ substr($blog->title,0,18) }}</td>
                                    <td>{{ substr($blog->desc,0,20) }}</td>
                                    <td><img style="width: 40px; height: 40px;" src="{{ asset('uploads/blog/'.$blog->image) }}" alt=""></td>
                                    <td>
                                        <input type="checkbox" {{ $blog->status === 'active' ? 'checked':'' }} id="blogStatus" data-id="{{ $blog->id }}" data-toggle="toggle" data-on="Active" data-off="Inactive"
                                               data-size="mini">
                                    </td>
                                    <td>
                                        <a href="{{ route('blogs.edit', base64_encode($blog->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="{{ route('blogs.delete', base64_encode($blog->id)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
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
