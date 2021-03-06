
@extends('site.components.layout')

@section('title')
  Portfolio
@endsection

@section('content')

    <!-- HOME START--><br><br>
    <section class="bg-home bg-light d-table w-100" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="title-heading mt-5">
                        <h6 style="color: blueviolet;" class="sub-title">Looking for a Developer !</h6>
                        <h1 class="heading text-primary mb-3">I'M MD ABU BAKAR SIDDIQUE (SUMON)</h1>
                        <p class="para-desc text-muted">Obviously I'm a Web Developer with over 2 years of experience. Experienced with all stages of the development cycle for dynamic web projects.</p>
                        <div class="mt-4 pt-2">
                            <a href="javascript:void(0)" class="btn btn-primary rounded mb-2 mr-2">Hire me</a>
                            <a href="javascript:void(0)" class="btn btn-outline-primary rounded mb-2">Download CV <i data-feather="download" class="fea icon-sm"></i></a>
                        </div><br><br>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <a href="#about" data-scroll-nav="1" class="mouse-icon rounded-pill bg-transparent mouse-down">
            <span class="wheel position-relative d-block mover"></span>
        </a>
    </section><!--end section--><br><br>
    <!-- HOME END-->

    <!-- About Start -->
    <section class="section pb-3" id="about">
        @foreach($homepage as $row )
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-5">
                    <div class="about-hero">
                        <img style="height: 420px; width: auto;" src="{{ asset('uploads/homepage/'.$row->image) }}" class="img-fluid mx-auto d-block about-tween position-relative rounded" alt="">
                    </div>
                </div><!--end col-->

                <div class="col-lg-7 col-md-7 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="section-title mb-0 ml-lg-5 ml-md-3">
                        <h4 class="title text-primary mb-3">{{ $row->title }}</h4>
                        <h6 class="designation mb-3">{{ $row->sub_title}}</h6>
                        <p class="text-muted">{{ $row->paragraph}} I'm a Full Stack Web Developer mainly & I have good experience on  PHP,Laravel,React.js . I'm currently performing as a Public Figure & Motivational Speaker on My Youtube Channel. I have been working as a Web Developer over the last 2 years. I used to work on Freelancer.com ,Fiverr.com and so so & Now I'm in a partnership business with some of my clients. On the other side. I was the Chife Operating Officer of an Affiliate Network </p>

                        <div class="mt-4">
                            <a href="#projects" class="btn btn-primary mouse-down">View Portfolio</a>
                        </div>
                    </div>
                </div><!--end col-->


            </div><!--end row-->
        </div><!--end container-->
        @endforeach
            <br><br><br>


        <div class="container mt-100 mt-60">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <div class="titles">
                            <h4 style="color: blueviolet;" class="title title-line text-uppercase mb-4 pb-4">Hobbies & Interests</h4>
                            <span></span>
                        </div>
                        <p class="text-muted mx-auto para-desc mb-0">Obviously I'm a Web Developer. Experienced with all stages of the development cycle for dynamic web projects and web Application</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->


            <div class="row">
                @foreach($hobbies as $row)
                <div class="col-lg-3 col-md-4 col-12 mt-4 pt-2">
                    <div class="interests-desc bg-light position-relative px-2 py-3 rounded">
                        <div class="hobbies d-flex align-items-center">
                            <div class="text-center rounded-pill mr-4">
                                <i data-feather="{{ $row->icon }}" class="icon fea icon-ex-lg"></i>
                            </div>
                            <div class="content">
                                <h6 class="title mb-0"> {{ $row->name }}</h6>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                @endforeach

            </div>




        </div><!--end container--><br><br>

        <div class="container-fluid mt-100 mt-60">
            <div class="rounded py-md-5 py-4" style="background: url('{{asset('assets/website/smart.jpg')}}') center center; height: 380px; width: 100%;">
                <div class="container">

                    <div class="row" id="counter">
                        @foreach($interests as $row)
                        <div class="col-lg-3 col-6">
                            <div class="counter-box rounded py-3 text-center">
                                <div class="counter-icon">
                                    <i data-feather="{{ $row->icon }}" class="fea icon-md text-primary"></i>
                                </div>
                                <h3 class="counter-value mt-3 text-white" data-count="{{ $row->number }}">95</h3>
                                <h6 class="counter-head font-weight-normal mb-0 text-white">{{ $row->title }}</h6>
                            </div><!--end counter box-->
                        </div><!--end col-->
                        @endforeach
                    </div><!--end row-->

                </div><!--end container-->
            </div><!--end div-->
        </div><!--end container fluid-->
    </section><br><br>
    <!-- About end -->

    <!-- Services Start -->
    <section class="section bg-light" id="services">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <div class="titles"><br>
                            <h4 style="color: blueviolet;" class="title title-line text-uppercase mb-4 pb-4">What Do I Offer ?</h4>
                            <span></span>
                        </div>
                        <p class="text-muted mx-auto para-desc mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->


<div class="row">
    @foreach($services as $row)
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">

                    <div class="service-wrapper rounded position-relative text-center border border-footer p-4 pt-5 pb-5">

                        <div class="icon text-primary">
                            <i data-feather="{{ $row->icon1 }}" class="fea icon-md"></i>
                        </div>
                        <div class="content mt-4">
                            <h5 class="title">{{ $row->name }}</h5>
                            <p class="text-muted mt-3 mb-0">{{ $row->short_des }}</p>
                        </div>
                        <div class="big-icon">
                            <i data-feather="{{ $row->icon2 }}" class="fea icons"></i>
                        </div>

                    </div>

                </div><!--end col-->
    @endforeach
</div>




            </div><!--end row-->
        </div><!--end container-->
    </section><br><br>
    <!-- Services End -->

    <!-- Resume Start -->
    <section class="section" id="resume">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <div class="titles">
                            <h4 style="color: blueviolet" class="title title-line text-uppercase mb-4 pb-4">Work Participation</h4>
                            <span></span>
                        </div>
                        <p class="text-muted mx-auto para-desc mb-0">Obviously I'm a Web Developer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-12">
                    <div class="main-icon rounded-pill text-center mt-4 pt-2">
                        <i data-feather="star" class="fea icon-md-sm"></i>
                    </div>
                    <div class="timeline-page pt-2 position-relative">


                        @foreach($participations as $row)
                        <div class="timeline-item mt-4">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="duration date-label-left border rounded p-2 pl-4 pr-4 position-relative shadow text-left">{{ $row->year_date }}</div>
                                </div><!--end col-->
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="event event-description-right rounded p-4 border float-left text-left">
                                        <h5 class="title mb-0 text-capitalize">{{ $row->name }}</h5>
                                        <small class="company">{{ $row->title }}</small>
                                        <p class="timeline-subtitle mt-3 mb-0 text-muted">{{ $row->desc }}</p>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end timeline item-->
                        @endforeach


                    </div><!--end timeline page-->
                    <!-- TIMELINE END -->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section--><br><br>
    <!-- Skill End -->
<hr>
    <!-- Skill & CTA START -->
    <section style="margin-right: 300px;" class="">
        <div class="container-fluid">
            <div class="row position-relative">

                <div class="col-lg-8 offset-lg-4">
                    <div class="cta-full-img-box">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <div class="section-title">
                                    <div class="titles"><br><br>
                                        <h4 style="color: blueviolet" class="title title-line text-uppercase mb-4 pb-4">Work Expertise</h4>
                                        <span></span>
                                    </div>
                                    <p  class="text-muted mx-auto para-desc mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="row align-items-center">


                            <div class="col-lg-12">
                                <div class="tab-content pl-lg-12" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-cloud" role="tabpanel" aria-labelledby="pills-cloud-tab">

                               @foreach($expertise as $row)
                                            <div class="progress-box mt-4 pt-2">
                                                <h6 class="font-weight-normal">{{ $row->title }}</h6>
                                                <div class="progress">
                                                    <div class="progress-bar position-relative bg-primary" style="width:{{ $row->percent }}%;">
                                                        <div style="color: #ffffff;" class="progress-value d-block text-dark h6">{{ $row->number}}%</div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div><!--end teb pane-->

                                </div><!--end tab content-->
                            </div><!--end col-->
                        </div> <!-- end row -->
                    </div> <!-- end about detail -->
                </div> <!-- end col -->
            </div><!--end row-->
        </div><!--end container fluid-->
    </section><!--end section--><br><br>
    <!-- Skill & CTA End -->

    <!-- Projects End --><br>
    <section class="section bg-light" id="projects">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <div class="titles"><br>
                            <h4 style="color: blueviolet" class="title title-line text-uppercase mb-4 pb-4">My Portfolio</h4>
                            <span></span>
                        </div>
                        <p class="text-muted mx-auto para-desc mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>

        <div class="container">

            <div class="row mt-4 pt-2">
                <div class="col-lg-12">
                    <ul class="portfolioFilter text-center mb-0 list-unstyled">
                        <li class="list-inline-item mb-3"><a href="#" data-filter="*" class="active text-dark mr-2 py-2 px-3 rounded">All</a></li>

                        @foreach($categories as $row)
                        <li class="list-inline-item mb-3"><a href="#" data-filter=".{{$row->slug}}" class=" text-dark mr-2 py-2 px-3 rounded">{{$row->name}}</a></li>
                        @endforeach
                    </ul>
                </div><!--end col-->
            </div><!--end row-->


            <div class="portfolioContainer row">
                @foreach($subcategories as $row)
                <div class="col-lg-4 col-md-6 mt-4 pt-2 {{$row->category->slug}}">
                    <div class="portfolio-box rounded position-relative overflow-hidden">
                        <div class="portfolio-box-img position-relative overflow-hidden">
                            <img style="width: 310px; height: 250px; margin-left: 30px;" src="{{ asset('uploads/subcategory/'.$row->image) }}" class="img-fluid" alt="member-image">
                        </div>
                        <div class="gallary-title py-4 text-center'">
                            <h5 style="text-align: center;">{{$row->title}}</h5>
                        </div>
                    </div>
                </div><!--end col-->
                @endforeach
            </div><!-- End row -->
            <div class="row">
                <div class="col-lg-12 mt-4 pt-2">
                    <div class="text-center">
                        <a href="#" class="btn btn-outline-primary">More Picture <i data-feather="refresh-cw" class="fea icon-sm"></i></a>
                    </div><br>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section--><br><br>
    <!-- Projects End -->

    <!-- Testimonial Start -->
    <section style="margin-left: 10px;" class="cta-full">
        <div class="container-fluid">
            <div class="row position-relative">
                <div class="col-lg-12">
                    <div class="cta-full-img-box">

                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <div class="section-title">

                                    <div class="titles">
                                        <h4 style="color: blueviolet;" class="title title-line text-uppercase mb-4 pb-4">Clients say</h4>
                                        <span></span>
                                    </div>
                                    <p class="text-muted mx-auto para-desc mb-0">Obviously I'm a Web Developer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->




                        <div class="row">

                            <div class="col-12">

                                <div id="clients-testi" class="owl-carousel mt-3">
                                @foreach($sliders as $row)

                                    <!--Start Client-->
                                    <div class="client-review border rounded m-3 mb-4 position-relative shadow">
                                        <div class="review-star">
                                            <ul class="list-unstyled float-right mb-0">
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li style=" margin-right: 10px;" class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                            </ul>
                                            <div class="review-base">
                                                <h6 style="margin-top: 10px; margin-left: 10px;" class="title">{{$row->title}}</h6>
                                            </div>
                                        </div><!--end review star-->
                                        <p class="text-muted review-para font-italic mt-3 mb-3 ml-2">{{$row->short_desc}}</p>
                                        <div class="reviewer d-flex align-items-center">
                                            <img style="height: 380px;width: 350px;" src="{{ asset('uploads/slider/'.$row->image) }}" class="img-fluid rounded-circle avatar avatar-small mr-3" alt="">

                                            <div class="content">
                                                <h5 style="margin-right: 5px;" class="name mb-0">{{$row->sub_title}}</h5>

                                            </div>
                                        </div><!--end reviewer-->
                                        <br>
                                    </div><!--end client review-->
                                    <!--End Client-->
                                    @endforeach

                                </div><!--end testi review-->

                            </div><!--end col-->

                        </div><!--end row-->


                    </div> <!-- end about detail -->
                </div> <!-- end col -->
            </div><!--end row-->
        </div><!--end container fluid-->
    </section><!--end section-->
    <!-- Testimonial End -->

    <!-- Blog Start -->
    <section class="section bg-light pb-3" id="news">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <div class="titles"><br>
                            <h4 style="color: blueviolet;" class="title title-line text-uppercase mb-4 pb-4">Latest News & Blog</h4>
                            <span></span>
                        </div>
                        <p class="text-muted mx-auto para-desc mb-0">Obviously I'm a Web Developer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @foreach($blogs as $row)
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="blog-post rounded shadow">
                        <img style="width: 360px; height: 200px;" src="{{ asset('uploads/blog/'.$row->image) }}" class="img-fluid rounded-top" alt="">
                        <div class="content pt-4 pb-4 p-3">
                            <ul class="list-unstyled d-flex justify-content-between post-meta">
                                <li><i data-feather="user" class="fea icon-sm mr-1"></i><a href="javascript:void(0)" class="text-dark">{{$row->name}}</a></li>
                                <li><i data-feather="tag" class="fea icon-sm mr-1"></i><a href="javascript:void(0)" class="text-dark">{{$row->title}}</a></li>
                            </ul>
                            <h5 class="mb-3"><a href="#" class="title text-dark">{{$row->desc}}</a></h5>
                            <ul class="list-unstyled mb-0 pt-3 border-top d-flex justify-content-between">
                                <li><a href="javascript:void(0)" class="text-dark">Read More <i data-feather="chevron-right" class="fea icon-sm"></i></a></li>
                                <li><i class="mdi mdi-calendar-edit mr-1"></i>10th April, 2020</li>
                            </ul>
                        </div><!--end content-->
                    </div><!--end blog post-->
                </div><!--end col-->
                @endforeach


            </div><!--end row-->
        </div><!--end container--><br><br><br><br>

        <div class="container-fluid mt-100 mt-60">
            <div class="rounded-pill py-5" style="background: url('{{asset('assets/website/hero1.jpg')}}') center center; height: 300px;width: 100%;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <h4 class="text-light">I Am Available For Freelancer Projects.</h4>
                            <p style="color: #ff55ff;" class="text-white-50 mx-auto mt-4 para-desc">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                            <div class="mt-4">
                                <a href="#contact" class="btn btn-primary mouse-down">Hire me <i data-feather="chevron-down" class="fea icon-sm"></i></a>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div><!--end div-->
        </div><!--end container fluid-->
        <br>
    </section><!--end section-->
    <br>
    <!-- Blog Start -->

    <!-- Contact Start -->
    <section class="section pb-0" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <div class="titles"><br>
                            <h4 style="color: blueviolet;" class="title title-line text-uppercase mb-4 pb-4">Contact Me</h4>
                            <span></span>
                        </div>
                        <p class="text-muted mx-auto para-desc mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-md-4 mt-4 pt-2">
                    <div class="contact-detail text-center">
                        <div class="icon">
                            <i data-feather="phone" class="fea icon-md"></i>
                        </div>
                        <div class="content mt-4">
                            <h5 class="title text-uppercase">Phone</h5>
                            <p class="text-muted">Promising development turmoil inclusive education transformative community</p>
                            <a href="tel:+152534-468-854" class="text-primary">+8801738254983</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 mt-4 pt-2">
                    <div class="contact-detail text-center">
                        <div class="icon">
                            <i data-feather="mail" class="fea icon-md"></i>
                        </div>
                        <div class="content mt-4">
                            <h5 class="title text-uppercase">Email</h5>
                            <p class="text-muted">Promising development turmoil inclusive education transformative community</p>
                            <a href="mailto:contact@example.com" class="text-primary">mdsumon7914@gmail.com</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 mt-4 pt-2">
                    <div class="contact-detail text-center">
                        <div class="icon">
                            <i data-feather="map-pin" class="fea icon-md"></i>
                        </div>
                        <div class="content mt-4">
                            <h5 class="title text-uppercase">Location</h5>
                            <p class="text-muted">Kellabond C,O Bazar Sadar Rangpur <br>Bangladesh</p>
                            <a href="https://www.google.com/maps/d/viewer?mid=10Dg861xJNy18dTvB6dHk9fp8dRQ&ie=UTF8&hl=en&msa=0&ll=25.738381533558673%2C89.23240183019402&spn=34.668997%2C78.662109&z=13" class="video-play-icon text-primary">View on Google map</a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->

    <section class="section pt-5 mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="custom-form mb-sm-30">
                        <div id="message"></div>


                        <form method="post" action="{{ route('messages.store') }}" >
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group">
                                                <input name="name" id="name" type="text" value="{{ old('name') }}" class="form-control border rounded" placeholder=" Name :"  >
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group">
                                                <input name="email" id="email" type="email" value="{{ old('email') }}" class="form-control border rounded" placeholder="Your email :"   >
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="subject" id="subject" value="{{ old('subject') }}" class="form-control border rounded" placeholder="Your subject :"  >
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end col-->

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <textarea name="comments" id="comments" value="{{ old('comments') }}" rows="4" class="form-control border rounded" placeholder="Your Message :"></textarea>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="submit" class=" btn btn-primary" >Send Message</button>

                                    <div id="simple-msg"></div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->
                    </div><!--end custom-form-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Contact End -->

@endsection
