@extends('layouts.home.app')

@section('content')


    <!-- Banner -->
    <section class="banner-4 large-container" id="banner">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 col-md-12">
                    <div class="main-banner main-banner-content">
                        <span class="mb-3 d-inline-block wow fadeInLeft" data-wow-duration="400ms">eBook includes <strong>iBooks, PDF, ePub & audio</strong> versions</span>
                        <h1 class="wow fadeInLeft font-serif" data-wow-delay="200ms">What if you could change <br>your world?</h1>
                        <p class="mb-4 wow fadeInUp" data-wow-delay="400ms">If this sounds unbelievable to you, then you’re at the right place. Because this book is about to show you how to make that change, right there, where you are.</p>
                        <a href="{{route('member.generate-media-link')}}" target="_blank" class="btn btn-white mt-2 text-capitalize wow fadeInUp"  data-wow-delay="450ms">
                            Share a copy now <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="banner-img4 wow fadeInUp">
                        <img src="{{asset('home/images/about/ryw_cover.jpg')}}" alt="" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Counter -->
    <section class="counter-4 large-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-item mb-5 mb-lg-0 wow fadeInLeft" data-wow-delay="100ms">
                        <div class="icon">
                            <i class="fa fa-download"></i>
                        </div>
                        <div class="content">
                            <h2 class="count">2,567,422 </h2>
                            <span>Copies Downloaded</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-item mb-5 mb-lg-0 wow fadeInLeft" data-wow-delay="200ms">
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="content">
                            <h2 class="count">4</h2>
                            <span>Chapters</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-item mb-5 mb-lg-0 wow fadeInLeft" data-wow-delay="300ms">
                        <div class="icon">
                            <i class="fa fa-link"></i>
                        </div>
                        <div class="content">
                            <h2 class="count">929</h2>
                            <span>Unique Links Created</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-item mb-5 mb-lg-0 wow fadeInLeft" data-wow-delay="400ms">
                        <div class="icon">
                            <i class="fa fa-balance-scale"></i>
                        </div>
                        <div class="content">
                            <h2 class="count">168</h2>
                            <span>Case studies</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter End -->


    <!-- Chapter -->
    <section class="section chapter chapter-4" id="chapter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-12">
                    <div class="section-heading text-center">
                        <span class="featured-text wow fadeInDown" data-wow-delay="200ms">You Have A Choice</span>
                        <h2 class="text-lg font-serif wow fadeInDown" data-wow-delay="120ms">Does A Part of Your Life Seem Out of Order?</h2>
                        <p class="lead">
                            We understand that sometimes, things may not exactly go the way we planned
                            them but then if you’re often dealing with crisis in your finances, marriage, ministry,
                            family, health, business, academics etc.,
                            then you really need a change. And this book would show you how to make that change.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-xl-4">
                    <div class="chapter-inner left-chapter">
                        <div class="chapter-item d-flex">
                            <i class="flaticon-check"></i>
                            <div class="content pl-4">
                                <h4>Discover</h4>
                                <p>Discover how to harness the power of your imagination.</p>
                            </div>
                        </div>
                        <div class="chapter-item d-flex">
                            <i class="flaticon-check"></i>
                            <div class="content pl-4">
                                <h4>Learn</h4>
                                <p>Learn how to apply scriptures to everyday life’s challenges.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-12 order-md-3 mb-5 mb-lg-0 ">
                    <div class="book-preview preview-4 wow fadeInUp " data-wow-delay="300ms">
                        <img src="{{asset('home/images/about/kindle.png')}}" class="background-device img-fluid" alt="">
                        <div class="owl-book owl-carousel owl-theme" style="opacity: 1; display: block;">
                            <div class="book-item">
                                <img src="{{asset('home/images/about/cover_p.jpg')}}" alt="" class="img-fluid">
                                <div class="overlay">
                                    <a href="{{asset('home/images/about/cover_p.jpg')}}" class="popup-gallery img-fluid" data-title="Image Caption"><i class="ti-fullscreen"></i></a>
                                </div>
                            </div>

                            <div class="book-item">
                                <img src="{{asset('home/images/about/front_p.jpg')}}" alt="" class="img-fluid">
                                <div class="overlay">
                                    <a href="{{asset('home/images/about/front_p.jpg')}}" class="popup-gallery img-fluid" data-title="Image Caption"><i class="ti-fullscreen"></i></a>
                                </div>
                            </div>

                            <div class="book-item">
                                <img src="{{asset('home/images/about/content_p.jpg')}}" alt="" class="img-fluid">
                                <div class="overlay">
                                    <a href="{{asset('home/images/about/content_p.jpg')}}" class="popup-gallery img-fluid" data-title="Image Caption"><i class="ti-fullscreen"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-xl-4 order-md-2">
                    <div class="chapter-inner right-chapter mt-5 mt-lg-0">
                        <div class="chapter-item d-flex">
                            <i class="flaticon-check"></i>
                            <div class="content pl-4">
                                <h4>Practice</h4>
                                <p> Practice nurturing your positive desires to create a change.</p>
                            </div>
                        </div>
                        <div class="chapter-item d-flex">
                            <i class="flaticon-check"></i>
                            <div class="content pl-4">
                                <h4>Find out</h4>
                                <p>  Find out how to grow your dreams and how to create with your words.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Chapter End -->

    <!-- About Book -->
    <br><br><br><br>
    <section class="about-author pb-80" id="author">
        <div class="shape-bg2"> <img src="{{asset('home/images/bg/shape_2.png')}}" alt="" class="img-fluid w-100"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="author-img2">
                        <img src="{{asset('home/images/about/lwod_cover.jpg')}}" alt="" class="img-fluid w-100">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="author-info mt-5 mt-lg-0 pl-lg-5">
                        <span class="featured-text">About The Book</span>
                        <h2 class="text-lg font-serif">Recreating your world</h2>

                        <p class="mb-4 mt-3">If your world or sphere of contact does not please you, or if you don’t like the way things are around you, <strong class="text-dark">YOU CAN CHANGE IT!</strong>
                            <br>
                            Nobody but you can change it. It is so very vital for you to know that you have a choice in life. You don’t have to stay with the status quo. The truth is, you are either changing the circumstances of your life and your world or your world is changing you!
                            Do you want to achieve your goals?
                            What is that thing you are praying about?
                            <br><br>
                            Don’t wander around looking for someone to tell you what to do and how to do it. You can recreate the circumstances of your life and change them to suit you.
                            <br><br>
                            This book contains principles on how you can recreate your world. Study and practice them because God’s word can produce what it talks about. YOU can recreate your world.

                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Call to action -->
    <section class="section cta-home">
        <div class="container">
            @livewire('send-link')
        </div>
    </section>
    <!-- Subscribe END -->

@endsection
