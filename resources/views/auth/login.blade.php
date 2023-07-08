<x-layout>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card col-6 p-4 my-4">
                <label for=""><h1 class="text-primary">Login</h1></label>
                <form action="/login" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input required type="email" name="email" value="{{old('email')}}" class="form-control">
                        <x-error name="email" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input required type="password" name="password" class="form-control">
                        <x-error name="password" />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>