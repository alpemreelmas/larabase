@extends("layouts.admin")
@push("css")
    @include("user::components.dataTable-css")
@endpush
@section("content")
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Is Verified</th>
                        <th>Registered At</th>
                        <th>Roles</th>
                        <th class="no-content">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{dd($users)}}
                        @foreach($user as $users)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->email_verified_at ? $user->email_verified_at : "-"}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->roles->pluck("name")->implode(", ")}}</td>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-x-circle table-cancel">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="15" y1="9" x2="9" y2="15"></line>
                                        <line x1="9" y1="9" x2="15" y2="15"></line>
                                    </svg>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push("js")
    @include("user::components.dataTable")
@endpush

