
<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-signin">


          @if(session()->has('Sukses'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('Sukses') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if(session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif


          <img class="mb-4 mx-auto d-block" src="image/dsn.png" alt="" width="155" height="85" class="">
          <h1 class="h3 mb-4 fw-normal text-center ">Please Login</h1>

            <form action="/login" method="post">
              @csrf

              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-floating">
                <input type="password" name="password" class="form-control"
                id="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>

        </main>
    </div>
</div>
