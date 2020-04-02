<style>
    @import url(https://fonts.googleapis.com/css?family=Exo+2:300);
@import url(https://fonts.googleapis.com/css?family=Zeyada);

.col-xs-1,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9,.col-xs-10,.col-xs-11,.col-xs-12,.col-sm-1,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-10,.col-sm-11,.col-sm-12,.col-md-1,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-10,.col-md-11,.col-md-12,.col-lg-1,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-10,.col-lg-11,.col-lg-12{position:relative;padding: 0;}

html, body {
  height: 100%;
}

#accueil {
  background: url(http://images.forwallpaper.com/files/thumbs/preview/20/205186__photo-close-up-snow-leaves-blur-bokeh-background-wallpaper_p.jpg) no-repeat center;
  background-size: cover;
  margin-top: 50px;
  height: 500px;
  height: 100%;
}

#accueil h1 {
  position: relative;
  top: 120px;
  font-size: 10em;
  font-family: "Zeyada";
  text-align: center;
  color: #fff;
  text-transform: uppercase;
}

#accueil h2 {
  position: relative;
  top: 150px;
  text-align: center;
  font-size: 3em;
  font-family: "Zeyada";
  text-transform: uppercase;
  color: #fff;
}

#gallery {
  height: 100%;
}

figure {
    height: 250px;
    width: 250px;
    display: block;
    overflow: hidden;
    z-index: 100;
}

figcaption {
    height: 250px;
    width: 100%;
    background: url(http://gridelicious.net/themes/treble/demo/assets/images/css/thumb_over.png) no-repeat center 150px black;
    text-align: center;
    position: absolute;
    bottom: 0;
    left: -500px;
    opacity: 0; 
    padding: 5px;
}

a {
    color: #fff;
}

a:hover figcaption {
    opacity: 0.8;
    left: 0;
    color: #fff;
    transition: all 0.7s;
}

#contact  {
  height: 100%;
  padding: 20px;
  margin-top: -50px;
  background: url(http://images.forwallpaper.com/files/thumbs/preview/20/205186__photo-close-up-snow-leaves-blur-bokeh-background-wallpaper_p.jpg) no-repeat center;
  background-size: cover;
  overflow: hidden;
}

#contact h1 {
  font-family: "Zeyada";
  font-size: 10em;
  text-align: center;
  color: #fff;
}

input {
  height: 50px;
  color: #fff;
}
.form-control {
  color: #fff;
  max-width: 600px;
  margin: 0 auto;
  display: block;
  border: none;
  border-radius: 0;
  background: rgba(255, 255, 255, 0.4);
  resize: none;
}

.submit {
  display: block;
  margin: 0 auto;
  background: #34495e;
  border-radius: 0;
  border: none;
  color: #fff;
}

.btn-default:hover {
  background: #2c3e50;
  color: #fff;
}



@media (max-width: 768px) { 
  #accueil h1, #contact h1 {
    font-size: 4.6em;
  }
}
</style>