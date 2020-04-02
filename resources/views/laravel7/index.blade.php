
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Album example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css" integrity="sha256-AgL8yEmNfLtCpH+gYp9xqJwiDITGqcwAbI8tCfnY2lw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js" integrity="sha256-OG/103wXh6XINV06JTPspzNgKNa/jnP1LjPP5Y3XQDY=" crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>

  <body>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-md-7 py-4">
                {{-- <form action="{{ route('image.store') }}" method="post"  class="dropzone" id="my-awesome-dropzone">
                    @csrf
                </form> --}}
                <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
                  @csrf

                    <div class="row">
                      <div class="col-md-4">
                        <input type="file" name="file" class="form-control" placeholder="Choose file">
                      </div>
                      <br>
                      <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Artist Name">
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Album Name">
                      </div>
                    {{-- </div>
                    <br>
                    <div class="row"> --}}
                      <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Song Title">
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Song Duration">
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="">
                      </div>
                    </div>

                      <button type="submit" class="btn btn-round btn-success">Save File</button>

                </form>


                <a href="{{route('image.index')}}" class="btn btn-round btn-info"> Home</a>
            </div>
           
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Album</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">LARAVEL 7 IMAGE UPLOAD WITH DROPZONE</h1>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            @foreach ($images as $key => $item)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{asset('/laravel7/images/' .$item->image_name)}}" alt="Card image cap">
                <div class="card-body">
                <p class="card-text">{{$item->image_title}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <button class="btn btn-primary btn-sm btn-round accordion-toggle" type="button" data-toggle="collapse" data-target="#play{{$key}}" aria-expanded="false" aria-controls="collapseExample">
                      Play
                      </button>

                    <form action="{{url('delete', $item->id)}}" method="put">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-round btn-danger">Remove Image</button>
                    </form>
                      <button type="button" class="btn btn-sm btn-round btn-info">Edit Image</button>
                    </div>
                    <br><br>
                    <small class="text-muted">{{date('H:i:s', strtotime($item->created_at))}} mins</small>
                  </div>
                      @include('laravel7-iframe.table')
                </div>
              </div>
            </div>
            @endforeach
            
      </div>

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
  </body>
</html>
