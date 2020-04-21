@section('forma')
    {{--<form action="/posts/create" method="post">
        @csrf
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationDefault01">First name</label>
                <input type="text" class="form-control" id="validationDefault01" name="first_name" value="Mark" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault02">Last name</label>
                <input type="text" class="form-control" id="validationDefault02" name="last_name" value="Otto" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefaultUsername">Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                    </div>
                    <input type="text" class="form-control" name="username" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationDefault03">City</label>
                <input type="text" class="form-control" id="validationDefault03" name="city" required>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" name="check" required>
                <label class="form-check-label" for="invalidCheck2">
                    Agree to terms and conditions
                </label>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>--}}
    <form action="{{route('forma')}}" method="post">
        @csrf
        <div class="form-group col-sm-8">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" {{--aria-describedby="emailHelp"--}}>
            {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
        </div>
        <div class="form-group col-sm-8">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        {{--<div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>--}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
