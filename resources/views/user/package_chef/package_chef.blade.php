@extends('user.layout.common')
@section('title' , 'Chef_Package')
@section('content')
    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <a href="">
        <div class="container-fluid" data-aos="fade-up">

            <div class="section-header">
               <p>Share <span>Your Moments</span> In Our Restaurant</p>
            </div>

            <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">
                  @foreach ($chef as $one )
                 <a href="{{ route('ui_package_order_page',$one->id) }}">
                    <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url({{ asset('storage/'.$one->image) }})">
                        <h3>{{ $one->name }}</h3>
                        <div class="price align-self-start"> $ {{ $one->price }} </div>
                        <p class="description">
                            {{ $one->info }}
                        </p>
                      </div><!-- End Event item -->
                 </a>
                  @endforeach
              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>
      </a>
      </section><!-- End Events Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Chefs</h2>
            <p>Our <span>Proffesional</span> Chefs</p>
          </div>

          <div class="row gy-4">
            @foreach ($pack as $p )

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="chef-member">
                  <div class="member-img">
                    <img src="{{ asset('storage/'.$p->image) }}" class="" height="500px" width="300px"  alt="">
                    {{-- <div class="social">
                      <a href=""><i class="bi bi-twitter"></i></a>
                      <a href=""><i class="bi bi-facebook"></i></a>
                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-linkedin"></i></a>
                    </div> --}}
                  </div>
                  <div class="member-info">
                    <h4>{{ $p->name }} </h4>
                    <small class="text-dark">{{ $p->email }}</small>
                    <span>{{ $p->role }}</span>

                    <p>{{ $p->content }}</p>
                  </div>
                </div>
              </div><!-- End Chefs Member -->


            @endforeach
          </div>

        </div>
      </section><!-- End Chefs Section -->

@endsection
