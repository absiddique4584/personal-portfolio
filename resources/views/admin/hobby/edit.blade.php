@extends('admin.components.layout')

@section('title')
    Update Hobby | Portfolio
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Update Category</a></li>
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
                            <h3>Update Hobby</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('hobbies.manage') }}" class="btn btn-primary pull-right">Manage Hobby</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('hobbies.update') }}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $hobbies->id }}">

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Hobby Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $hobbies->name }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="icon" class="col-sm-3 control-label">Hobby Icon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="icon" name="icon" value="{{ $hobbies->icon }}" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Update Hobby</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
