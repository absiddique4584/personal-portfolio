@extends('admin.components.layout')

@section('title')
    Update Participation | Portfolio
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Update Participation</a></li>
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
                            <h3>Update Participation</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('participations.manage') }}" class="btn btn-primary pull-right">Manage Participation</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('participations.update') }}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $participations->id }}">


                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Participation Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $participations->name }}" required >
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Participation Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" value="{{ $participations->title }}" required >
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="desc" class="col-sm-3 control-label">Participation Desc.</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="desc" name="desc" value="{{ $participations->desc }}" required >
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="year_date" class="col-sm-3 control-label">Participation DateTime</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="year_date" name="year_date" value="{{ $participations->year_date }}" required>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Update Participation</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
