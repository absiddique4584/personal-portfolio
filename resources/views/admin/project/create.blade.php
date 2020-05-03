@extends('admin.components.layout')

@section('title')
    Add New Portfolio | Portfolio
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Add Portfolio</a></li>
            </ul>
        </div>
    </div><br/><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated slideInUp">
        <div class="col-sm-8 col-sm-offset-2">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Add New Portfolio</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('projects.manage') }}" class="btn btn-primary pull-right">Manage Portfolio</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('projects.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="image" class="col-sm-3 control-label"> Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label"> Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required placeholder=" Project Title">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="sub_title" class="col-sm-3 control-label">Sub-title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{ old('sub_title') }}" required placeholder="Project Sub Title">
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Add Portfolio</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
