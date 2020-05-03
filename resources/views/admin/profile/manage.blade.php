

        @extends('admin.components.layout')

        @section('title')
            Manage Profile | Online Shop
        @endsection
        @section('content')

            <div class="content-header">
                <!-- leftside content header -->
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Profile</a></li>
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
                                    <h3>Profile</h3>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{ route('profiles.edit') }}" class="btn btn-primary pull-right">Edit Profile</a>
                                </div>
                            </div>
                            <hr style="margin-top: 0">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Image</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($profiles as $profile)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $profile->name }}</td>
                                            <td>{{ $profile->address }}</td>
                                            <td>{{ $profile->phone }}</td>
                                            <td><img style="width: 40px; height: 40px;" src="{{ asset('uploads/profile/'.$profile->image) }}" alt=""></td>
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






