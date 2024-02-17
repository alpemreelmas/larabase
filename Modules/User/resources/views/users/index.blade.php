@extends("layouts.admin")
@push("css")
    @include("user::components.dataTable-css")
@endpush
@section("content")
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="d-flex justify-content-between">
                @can(auth()->user()->can("user_create"))
                    <a class="btn btn-primary my-3 w-auto d-flex justify-content-center align-items-center"
                       style="max-width: 200px" title="Add user" href="{{route("user-management.users.create")}}">
                        <span>Add user</span>
                    </a>
                @endcan
                @if(!request()->query("only_trashed") || request()->query("only_trashed") === "false")
                    <a class="btn btn-danger my-3 w-auto d-flex justify-content-center align-items-center"
                       style="max-width: 150px" title="Only Trashed" href="{{url("user-management/users?only_trashed=true")}}">
                        <span>Only Trashed</span>
                    </a>
                @endif
                @if(request()->query("only_trashed") && request()->query("only_trashed") === "true")
                    <a class="btn btn-secondary btn-icon-text my-3 w-auto d-flex justify-content-center align-items-center"
                       style="max-width: 200px" title="Go Back" href="{{url("user-management/users")}}">
                        <i data-feather="arrow-left" class="feather-12"></i>
                        Go Back
                    </a>
                @endif

            </div>
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
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->email_verified_at ? $user->email_verified_at : "-"}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->roles->pluck("name")->implode(", ")}}</td>
                                <td class="d-flex justify-content-center align-items-center gap-2">
                                    <a href="{{route("user-management.users.edit",["user"=>$user->id])}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <path d="M12 19l7-7 3 3-7 7-3-3z" />
                                            <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z" />
                                            <path d="M2 2l7.586 7.586" />
                                            <circle cx="11" cy="11" r="2" />
                                        </svg>
                                    </a>
                                    <form method="post" action="{{route("user-management.users.delete",["user"=>$user->id])}}">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="d-flex justify-content-center align-items-center bg-current border-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="main-grid-item-icon" fill="none" stroke="#060818" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <polyline points="3 6 5 6 21 6" />
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                <line x1="10" x2="10" y1="11" y2="17" />
                                                <line x1="14" x2="14" y1="11" y2="17" />
                                            </svg>
                                        </button>
                                    </form>
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

