<header>



        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                @foreach($banners as $banner)
                <div class="carousel-item" style="background-image: url('{{asset('img/banners/'.$banner->img)}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">{{$banner->title}}</h2>
                        <p class="lead">{{$banner->sub_title}}</p>
                    </div>
                </div>
                @endforeach
                <!-- Slide Two - Set the background image for this slide in the line below -->

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
 
</header>