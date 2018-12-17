<!--================ Home Banner Area =================-->
<style>
    .home_banner_area{
        background: url('{{asset('img/banners/'.$banner->img)}}');
    }
    .home_banner_area .banner_inner .banner_content h3{
        font-size: 40px;
    line-height: 24px;
    font-family: "Roboto", sans-serif;
    font-weight: normal;
    color: #ffffff;
    padding: 4px 0px 30px;
    margin: auto;
    max-width: 470px;
    }
</style>
<section class="home_banner_area">
    <div class="overlay"></div>
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row">
                <div class="offset-lg-2 col-lg-8">
                    <img class="img-fluid" src="{{asset('img/banner/text-img.png')}}" alt="">
                    <p>{{$banner->sub_title}}</p>
                    <h3>{{$banner->title}}</h3>
                    <a class="main_btn mr-10" href="#">Login</a>
                    <a class="white_bg_btn" href="#">Register</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->