@extends("layouts.admin")
@section("content")
    <div class="row layout-top-spacing">
        <form action="{{route("permission.store")}}">
            <div class="row mb-4">
                <div class="col-sm-12">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email address *">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password *">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password *">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                            Subscribe to weekly newsletter
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
