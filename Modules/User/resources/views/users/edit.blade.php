@extends("layouts.admin")
@push("css")
    <link href="{{asset("aee/")}}/plugins/css/dark/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
@endpush
@section("content")
    <div class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="row">
                    <div class="col-lg-6 col-12 ">
                        <x-flash-message />
                        <form method="post" action="{{route("user-management.users.update",["user"=>$user->id])}}">
                            @csrf
                            @method("PUT")
                            <div class="form-group mb-2">
                                <label for="e-text" class="visually-hidden">Name</label>
                                <input id="e-text" type="text" name="name" placeholder="Name" value="{{$user->name}}" class="form-control" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="e-text" class="visually-hidden">Email</label>
                                <input id="e-text" type="email" name="email" placeholder="Email" value="{{$user->email}}" class="form-control" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="e-text" class="visually-hidden">Email Verified At</label>
                                <input value="{{$user->email_verified_at}}" class="form-control " type="date" placeholder="Select Date..">
                            </div>
                            <div class="form-group">
                                <input type="submit" class=" btn btn-primary">
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
@push("js")
    <script src="{{asset("aee/")}}/plugins/src/flatpickr/flatpickr.js"></script>
    <script src="{{asset("aee/")}}/plugins/src/flatpickr/custom-flatpickr.js"></script>
@endpush
