@extends("layouts.admin")
@push("css")
    @include("user::components.dataTable-css")
@endpush
@section("content")
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <x-flash-message />
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Created At</th>
                        <th class="no-content">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->permissions->pluck("name")->implode(", ")}}</td>
                                <td>{{$role->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route("user-management.roles.edit",["role"=>$role->id])}}">
                                        <!-- https://feathericons.dev/?search=pen-tool&iconset=feather -->
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <path d="M12 19l7-7 3 3-7 7-3-3z" />
                                            <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z" />
                                            <path d="M2 2l7.586 7.586" />
                                            <circle cx="11" cy="11" r="2" />
                                        </svg>
                                    </a>
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

