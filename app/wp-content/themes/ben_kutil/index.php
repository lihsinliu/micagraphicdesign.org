<?php
/*
  The main template file
*/
?>

<?php get_header(); ?>

<main class="page" role="main">
  <div class="main">
    <div class="home lede ui">
      <div class="lede attach ui">
        <a href="#" class="permalink">
          <img src="http://lorempixel.com/600/600" alt="" class="src"></a>
      </div> <!-- /.attach -->
      <div class="lede content">
        <div class="lede header">
          <h2 class="lede heading">
            <a href="#" class="lede permalink">Event Item 1</a>
          </h2> <!-- /.heading -->
          <div class="lede meta">
            <p class="date">Oct 12 2014 12:00 PM</p>
            <p class="location">
              <a class="map link" href="#">Main Building</a>
            </p>
          </div> <!-- /.meta -->
        </div><!-- /.header -->
        <div class="lede copy">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos provident sunt dolore, laborum illum laboriosam laudantium, consequuntur necessitatibus veritatis impedit non rerum, dignissimos illo expedita quam amet totam fugit eveniet.
          </p>
        </div><!-- /.copy -->
        <div class="lede footer">
          <nav class="lede categories ui">
            <a href="#" class="category">Lecture</a>
            <a href="#" class="category">On Campus</a>
          </nav>
          <nav class="lede tags ui">
            <a href="#" class="tag">Typography</a>
          </nav>
        </div> <!-- /.footer -->
      </div><!-- /.content -->
    </div><!-- /.lede -->





    <section class="events">
      <h1 class="events heading">Events</h1>
      <ul class="events items ui">
        <li class="event item teaser" id="event-1">
          <div class="attach"><a href="#" class="permalink"><img src="http://lorempixel.com/600/600/animals/1" alt="" class="src"></a></div><!-- /.attach -->
          <div class="body">
            <div class="header">
              <h2 class="heading">Event Item 1</h2><!-- /.heading -->
              <div class="meta">
                <p class="date">Oct. 12 2014 12:00 PM</p><!-- /.date -->
                <p class="location"><a href="#" class="map link">Main Building</a></p><!-- /.location -->
              </div><!-- /.meta -->
            </div><!-- /.header -->
            <div class="copy">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div><!-- /.copy -->
          </div><!-- /.body -->
        </li><!-- /#event-1.event item teaser -->


        <li class="event item teaser" id="event-2">
          <div class="attach"><a href="#" class="permalink"><img src="http://lorempixel.com/600/600/animals/2" alt="" class="src"></a></div><!-- /.attach -->
          <div class="body">
            <div class="header">
              <h2 class="heading">Event Item 2</h2><!-- /.heading -->
              <div class="meta">
                <p class="date">Oct. 12 2014 12:00 PM</p><!-- /.date -->
                <p class="location"><a href="#" class="map link">Main Building</a></p><!-- /.location -->
              </div><!-- /.meta -->
            </div><!-- /.header -->
            <div class="copy">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div><!-- /.copy -->
          </div><!-- /.body -->
        </li><!-- /#event-2.event item teaser -->


        <li class="event item teaser" id="event-3">
          <div class="attach"><a href="#" class="permalink"><img src="http://lorempixel.com/600/600/animals/3" alt="" class="src"></a></div><!-- /.attach -->
          <div class="body">
            <div class="header">
              <h2 class="heading">Event Item 3</h2><!-- /.heading -->
              <div class="meta">
                <p class="date">Oct. 12 2014 12:00 PM</p><!-- /.date -->
                <p class="location"><a href="#" class="map link">Main Building</a></p><!-- /.location -->
              </div><!-- /.meta -->
            </div><!-- /.header -->
            <div class="copy">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div><!-- /.copy -->
          </div><!-- /.body -->
        </li><!-- /#event-3.event item teaser -->


        <li class="event item teaser" id="event-4">
          <div class="attach"><a href="#" class="permalink"><img src="http://lorempixel.com/600/600/animals/4" alt="" class="src"></a></div><!-- /.attach -->
          <div class="body">
            <div class="header">
              <h2 class="heading">Event Item 4</h2><!-- /.heading -->
              <div class="meta">
                <p class="date">Oct. 12 2014 12:00 PM</p><!-- /.date -->
                <p class="location"><a href="#" class="map link">Main Building</a></p><!-- /.location -->
              </div><!-- /.meta -->
            </div><!-- /.header -->
            <div class="copy">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div><!-- /.copy -->
          </div><!-- /.body -->
        </li><!-- /#event-4.event item teaser -->


        <li class="event item teaser" id="event-5">
          <div class="attach"><a href="#" class="permalink"><img src="http://lorempixel.com/600/600/animals/5" alt="" class="src"></a></div><!-- /.attach -->
          <div class="body">
            <div class="header">
              <h2 class="heading">Event Item 5</h2><!-- /.heading -->
              <div class="meta">
                <p class="date">Oct. 12 2014 12:00 PM</p><!-- /.date -->
                <p class="location"><a href="#" class="map link">Main Building</a></p><!-- /.location -->
              </div><!-- /.meta -->
            </div><!-- /.header -->
            <div class="copy">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div><!-- /.copy -->
          </div><!-- /.body -->
        </li><!-- /#event-5.event item teaser -->
      </ul><!-- /.events items ui -->

      <div class="footer">
        <a href="#" class="more button">
          See More
          <span>Graphic Design Events</span>
        </a>
      </div>
    </section><!-- /.events teasers items -->





    <section class="gallery">
      <h1 class="heading">Current Work</h1><!-- /.heading -->


      <ul class="slides">
        <li class="slide" id="slide-1"><a href="http://lorempixel.com/1000/1000/abstract/1" data-rel="gallery" class="link lightbox">
            <img src="http://lorempixel.com/500/500/abstract/1" alt="" class="src">
            <div class="caption">
              <p class="title">Title of Piece 1</p><!-- /.title -->
              <h2 class="name">Name of Artist</h2><!-- /.name -->
            </div><!-- /.caption -->
          </a></li><!-- /#slide-1.slide -->


        <li class="slide" id="slide-2"><a href="http://lorempixel.com/1000/1000/abstract/2" data-rel="gallery" class="link lightbox">
            <img src="http://lorempixel.com/500/500/abstract/2" alt="" class="src">
            <div class="caption">
              <p class="title">Title of Piece 2</p><!-- /.title -->
              <h2 class="name">Name of Artist</h2><!-- /.name -->
            </div><!-- /.caption -->
          </a></li><!-- /#slide-2.slide -->


        <li class="slide" id="slide-3"><a href="http://lorempixel.com/1000/1000/abstract/3" data-rel="gallery" class="link lightbox">
            <img src="http://lorempixel.com/500/500/abstract/3" alt="" class="src">
            <div class="caption">
              <p class="title">Title of Piece 3</p><!-- /.title -->
              <h2 class="name">Name of Artist</h2><!-- /.name -->
            </div><!-- /.caption -->
          </a></li><!-- /#slide-3.slide -->


        <li class="slide" id="slide-4"><a href="http://lorempixel.com/1000/1000/abstract/4" data-rel="gallery" class="link lightbox">
            <img src="http://lorempixel.com/500/500/abstract/4" alt="" class="src">
            <div class="caption">
              <p class="title">Title of Piece 4</p><!-- /.title -->
              <h2 class="name">Name of Artist</h2><!-- /.name -->
            </div><!-- /.caption -->
          </a></li><!-- /#slide-4.slide -->


        <li class="slide" id="slide-5"><a href="http://lorempixel.com/1000/1000/abstract/5" data-rel="gallery" class="link lightbox">
            <img src="http://lorempixel.com/500/500/abstract/5" alt="" class="src">
            <div class="caption">
              <p class="title">Title of Piece 5</p><!-- /.title -->
              <h2 class="name">Name of Artist</h2><!-- /.name -->
            </div><!-- /.caption -->
          </a></li><!-- /#slide-5.slide -->


        <li class="slide" id="slide-6"><a href="http://lorempixel.com/1000/1000/abstract/6" data-rel="gallery" class="link lightbox">
            <img src="http://lorempixel.com/500/500/abstract/6" alt="" class="src">
            <div class="caption">
              <p class="title">Title of Piece 6</p><!-- /.title -->
              <h2 class="name">Name of Artist</h2><!-- /.name -->
            </div><!-- /.caption -->
          </a></li><!-- /#slide-6.slide -->
      </ul><!-- /.slides -->


      <div class="footer">
        <a href="#" class="more button">
          See More
          <span>Graphic Design Work</span>
        </a>
      </div>
    </section><!-- /.gallery -->





    <section class="spotify">
      <div class="item playlist">
        <div class="header">
          <h1 class="heading"><a href="#" class="permalink">We’re Not Dead Yet: Mixtap from the Class of 2012</a></h1><!-- /.heading -->
          <div class="byline"><em class="type playlist">Playlist by:<a href="#ronin" class="link">Ronin Wood</a></em></div>
        </div><!-- /.header -->
        <div class="copy">
          <iframe src="https://embed.spotify.com/?uri=https://play.spotify.com/user/britesprite/playlist/1fgp4JAEyuHbMJbNs2xuos" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>
        </div>
      </div><!-- /.item playlist -->
    </section><!-- /.spotify -->
  </div><!-- /.main -->
</main>


<?php get_footer(); ?>
