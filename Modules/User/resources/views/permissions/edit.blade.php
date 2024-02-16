@extends("layouts.admin")
@section("content")
    <div class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="row">
                    <div class="col-lg-6 col-12 ">
                        <form method="post" action="{{route("user-management.permissions.update",["permission"=>$permission->id])}}">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="e-text" class="visually-hidden">Name</label>
                                <input id="e-text" type="text" name="name" placeholder="Name" value="{{$permission->name}}" class="form-control" required>
                                <input type="submit" class="mt-4 btn btn-primary">
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
