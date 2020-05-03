@extends('admin.components.layout')

@section('title')
    Update Homepage | Portfolio
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Update Homepage</a></li>
            </ul>
        </div>
    </div><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated shake">
        <div class="col-sm-8 col-sm-offset-2">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Update Homepage</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('homepage.manage') }}" class="btn btn-primary pull-right">Manage Homepage</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('homepage.update',$homepage->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')



                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" value="{{ $homepage->title }}" required placeholder="Homepage Title">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="sub_title" class="col-sm-3 control-label">Sub Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{ $homepage->sub_title }}" required placeholder="Sub Title">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="paragraph" class="col-sm-3 control-label">Paragraph</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="paragraph" name="paragraph" value="{{ $homepage->paragraph }}" required placeholder="Paragraph">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-sm-3 control-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="image" name="image" value="{{ $homepage->image }}" required>
                            </div>
                        </div>




                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Update Homepage</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
