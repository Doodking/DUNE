@section('create')
    <div class="container">
        <div class="py-5 text-center">
            <img class="mb-4" src="https://logos-download.com/wp-content/uploads/2016/06/Playstation_logo_black.png" alt="" width="72" height="72">
            <h2>Checkout form</h2>
            <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>
        @foreach($store as $s)
            <form action="{{route('createaproduct', $s->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">Price of product</label>
                    <input type="text" class="form-control" name="price" id="exampleFormControlInput3" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Choose category</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Food</option>
                        <option>Wear</option>
                        <option>Tech</option>
                        <option>Books</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Photo</label>
                    <input type="file" class="form-control" name="image" id="exampleFormControlInput1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description of shop</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button class="btn btn-outline-warning" type="submit">Create</button>
            </form>
        @endforeach

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2020 DUNE</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
