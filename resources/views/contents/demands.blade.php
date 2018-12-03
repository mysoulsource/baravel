<div class="container-fluid" style="background: #e74a45; padding: 20px 15px; margin-top: 30px;">


        <div class="container">
            <div class="row mt-3">
                <br/>
                <div class="col text-center demand-title">
                    <h2>Demands</h2>
                    <p>counter to count up to a target number</p>
                </div>
            </div>
        <div class="row">
            @forelse($demands as $demand)

            <div class="col-md-3">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="{{asset('img/bloods/'.$demand->bloodName->image)}}"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">{{ $demand->title }}</h4>
                        <p class="desc">{{ $demand->detail }}</p>
                        <div class="rating-wrap">
                            <div class="label-rating">{{ $demand->location }}</div>
                            {{--<div class="label-rating">154 orders </div>--}}
                        </div> <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" @click.prevent="acceptDemand( {{$demand->id}} )" class="btn btn-sm btn-success float-right">Accept</a>
                        <div class="price-wrap h5">
                            <span class="price-new">{{  $demand->date }}</span>
                        </div> <!-- price-wrap.// -->
                    </div> <!-- bottom-wrap.// -->
                </figure>
            </div> <!-- col // -->
            @empty
                <p>No Demands</p>
            @endforelse
        </div>
            <div class="row mt-3">
                <br/>
                <div class="col text-center">
                    <button class="btn btn-primary">View More..</button>
                </div>
            </div>
        </div>
</div>