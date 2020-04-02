
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>LARAVEL 7 AUIO AND MP3 PLAYER</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
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

    <style>
      audio {
    filter: sepia(30%) saturate(100%) grayscale(1) contrast(99%) invert(22%);
    width: 220px;
    height: 25px;
    margin: 0;
  padding: 0;
  border: none;
  outline: none;
  border-radius: 2px;
  text-align:center;
  background-color: rgba(5, 173, 13, 0.49);
}

h1 {
  text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
               
}
    </style>

    @include('laravel7-iframe.style')

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-md-7 py-4">
              
              <div class="container">

                {{-- <h3 class="jumbotron">Laravel Multiple File Upload</h3> --}}
                <form action="{{ route('mp3.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="input-group form-group increment" >
                      <div class="form-row" >
                        <div class="col-md-3 mb-2">
                          <input type="file" style="height:38px" name="file[]" class="form-control" placeholder="Choose file">
                    </div>
                    <div class="col-md-3 mb-2">
                      <input type="text" name="artist_name[]" class="form-control" placeholder="Artist Name">
                    </div>
                    <div class="col-md-3 mb-2">
                      <input type="text" name="album_name[]" class="form-control" placeholder="Album Name">
                    </div> 
                    {{-- <div class="col-md-2 mb-2">
                      <div class="input-group-btn"> 
                        <button class="btn btn-success" style="width:270px" type="button"><i class="glyphicon glyphicon-plus"></i> Remove</button>
                      </div>
                    </div> --}}
                    <div class="col-md-3 mb-2">
                      <input type="text" name="album_year[]" class="form-control" placeholder="Album Year">
                    </div>
                    <div class="col-md-3 mb-2">
                      <input type="text" name="song_title[]" class="form-control" placeholder="Song Title">
                    </div>
                    {{-- <div class="col-md-3 mb-2">
                      <input type="text" name="song_display[]" class="form-control" placeholder="Song Display">
                    </div> --}}
                    <div class="col-md-3 mb-2">
                      <input type="file" style="height:38px" name="song_thumnail[]" class="form-control" placeholder="">
                    </div>
                    <div class="col-md-2 mb-2">
                      <div class="input-group-btn"> 
                        <button class="btn btn-success" style="width:270px" type="submit"><i class="fa fa-save"></i> Save</button>
                      </div>
                    </div>
                    </div>
                  </div>
                    {{-- <div class="parent hide">
                      <div class="form-group form-row" style="margin-top:10px">
                        <div class="col-md-3 mb-2">
                          <input type="file" name="file[]" class="form-control" placeholder="Choose file">
                    </div>
                    <div class="col-md-3 mb-2">
                      <input type="text" name="artist_name[]" class="form-control" placeholder="Artist Name">
                    </div>
                    <div class="col-md-3 mb-2">
                      <input type="text" name="album_name[]" class="form-control" placeholder="Album Name">
                    </div> 
                    <div class="col-md-2 mb-2">
                      <div class="input-group-btn"> 
                        <button class="btn btn-danger" style="width:270px" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                      </div>
                    </div>
                    <div class="col-md-3 mb-2">
                      <input type="text" name="album_year[]" class="form-control" placeholder="Album Name">
                    </div>
                    <div class="col-md-3 mb-2">
                      <input type="text" name="song_title[]" class="form-control" placeholder="Song Title">
                    </div>
                    <div class="col-md-3 mb-2">
                      <input type="text" name="song_duration[]" class="form-control" placeholder="Song Duration">
                    </div>
                    <div class="col-md-3 mb-2">
                      <input type="file" name="song_thumnail[]" class="form-control" placeholder="">
                    </div>
                    </div>
                    </div> --}}
            
                    {{-- <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button> --}}
            
              </form>        
              </div>
            </div>
           
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <i  width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 fa fa-music"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></i>
            <strong>MP3 PLAYER</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center" style="background:#17a2b8">
        <div class="container">
          <h1 class="jumbotron-heading" style="font-weight:bolder; color:cornsilk">LARAVEL 7 AUDIO AND MP3 PLAYER <i class="fa fa-music"></i></h1>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            @foreach ($songs as $key => $item)
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" style="height:110px" src="{{asset('/laravel7/thumnail/' .$item->song_thumnail)}}" alt="Card image cap">
                <div class="card-body">
                  <marquee style="font-family:Book Antiqua; color: #FFFFFF" bgcolor="#212529" scrolldelay="200">{{$item->album_name}}      -----  {{$item->song_title}}      -----  {{$item->song_title}}</marquee>
                  <marquee behavior="2" direction=""> <p class="card-text" style="font-weight:40px;"></p></marquee>
                <div style="font-weight:40px; text-align:center; width:220px; font-size:bold; font-family: 'Times New Roman', Times, serif; background-color:#212529; color:#fff">
                <strong>{{$item->artist_name}}</strong>
              </div>
                <audio id="myTune{{$key}}" controls controlsList="nofullscreen nodownload noremoteplayback">
                  <source  src="{{ asset('laravel7/mp3/' .$item->song_name)}}">
                </audio>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <button id="playButton" onclick="document.getElementById('myTune{{$key}}').play()" class="btn btn-primary btn-sm btn-round" >
                     <i class="fa fa-play"> </i>
                      </button>
                      <button id="pauseButton" onclick="document.getElementById('myTune{{$key}}').pause()" class="btn btn-info btn-sm btn-round" >
                        <i class="fa fa-pause"> </i>
                         </button>

                      <button class="btn btn-secondary btn-sm btn-round " type="button" >
                        <i class="fa fa-step-forward"> </i>
                         </button>

                         <button id="stopButton"  onclick="document.getElementById('myTune{{$key}}').pause(); document.getElementById('myTune{{$key}}').currentTime = 0;" class="btn btn-sm btn-round btn-danger"> <i class="fa fa-stop"> </i></button>
                         
                         <button class="btn btn-secondary btn-sm btn-round " type="button">
                          <i class="fa fa-step-backward"> </i>
                           </button>

                           
                      <button onclick="document.getElementById('myTune{{$key}}').volume+=0.1" class="btn btn-warning btn-sm btn-round " type="button" >
                        <i class="fa fa-volume-up"> </i>
                         </button>
                         <button onclick="document.getElementById('myTune{{$key}}').volume-=0.1" class="btn btn-warning btn-sm btn-round " type="button">
                          <i class="fa fa-volume-down"> </i>
                           </button>
                      <button onclick="document.getElementById('myTune{{$key}}').muted=!document.getElementById('myTune{{$key}}').muted" type="button" class="btn btn-sm btn-round btn-info"><i class="fa fa-volume-off"></i></button>
                    </div>
                
                    {{-- <small class="text-muted">{{date('H:i:s', strtotime($item->created_at))}} mins</small> --}}
                  </div>
                      @include('laravel7-iframe.table')
                </div>
              </div>
            </div>
            @endforeach
            
      </div>
      {{ $songs->links() }}
    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        {{-- <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p> --}}
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script type="text/javascript">

      $(document).ready(function() {
  
        $(".btn-success").click(function(){ 
            var html = $(".parent").html();
            $(".increment").after(html);
        });
  
        $("body").on("click",".btn-danger",function(){ 
            $(this).parents(".form-group").remove();
        });
  
      });

          // Finds all iframes from youtubes and gives them a unique class
    // jQuery('iframe[src*="https://www.youtube.com/embed/"]').addClass("youtube-iframe");

jQuery(".stop-button").click(function() {
  // changes the iframe src to prevent playback or stop the video playback in our case
  $('.youtube-iframe').each(function(index) {
    $(this).attr('src', $(this).attr('src'));
    return false;
  });
  
//click function
});

$(document).ready(function() {
  $('#play-mp3').on('click', function(ev) {
 
    $("#mp3")[0].src += "&autoplay=1";
    ev.preventDefault();
 
  });
});


//use .one to ensure this only happens once
$("#play-mp3").one(function(){
  //as noted in addendum, check for querystring exitence
  var symbol = $("#mp3")[0].src.indexOf("?") > -1 ? "&" : "?";
  //modify source to autoplay and start video
  // $("#mp3")[0].src += symbol + "autoplay=1";
 });


      $(document).ready(function () {
    var ownVideos = $("iframe");
    $.each(ownVideos, function (i, video) {                
        var frameContent = $(video).contents().find('body').html();
        if (frameContent) {
            $(video).contents().find('body').html(frameContent.replace("autoplay", ""));
        }
    });
  });

  function playPrevious() {
    audioElement.pause();
 
    currentAudioIndex--;
 
    if (currentAudioIndex < 0) {
        currentAudioIndex = audios.length - 1;
    }
 
    console.log(currentAudioIndex);
    audioElement.src = audios[currentAudioIndex].src;
 
    audioElement.play(); 
}

var activeSong;
//Plays the song. Just pass the id of the audio element.
function play(id){
  //Sets the active song to the song being played. All other functions depend on this.
  activeSong = document.getElementById(id);
  //Plays the song defined in the audio tag.
  activeSong.play();

  //Calculates the starting volume percentage of the song.
  var percentageOfVolume = activeSong.volume / 1;
  var percentageOfVolumeMeter = document.getElementById('volumeMeter').offsetWidth * percentageOfVolume;

  //Fills out the volume status bar.
  document.getElementById('volumeStatus').style.width = Math.round(percentageOfVolumeSlider) + "px";
}
 
// ...
  
  </script>


  </body>
</html>
