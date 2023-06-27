<style>
    .header-style {
        position: relative;
        z-index: 1;
        display: flex;
    }

    .header-style::after {
        content: '';
        width: 100%;
        height: 2px;
        background: #000000;
        /* position the line within the parent element */
        position: absolute;
        bottom: 0.5em;
        /* half the height of the text from the bottom */
        left: 50%;
        transform: translateX(-50%);
        /* horizontally center it */
        z-index: -1;
        /* display it behind the parent */
    }

    .header-style::after:hover {
        background: #173b6c;
    }
</style>
@extends('layouts.master_home')
@section('home_content')
    @include('layouts.body.hero')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero-container" data-aos="fade-in">
            <h1>Lucas Braga</h1>
            <p>I'm a <span class="typed" data-typed-items="Software Engineer, Mern Developer, Cloud Expert"></span>
            </p>
        </div>
    </section><!-- End Hero -->
    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2 class="header-style" style="padding-bottom: initial">
                        {{-- /<img height="40px" src="{{ asset('image/header-icons/summary-icon.png') }}" alt="about">  --}}<span
                            style="background-color: #fff; padding-left: 0.5em; padding-right: 0.5em">About</span>
                    </h2>

                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat
                        sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <img src="{{ asset('frontend/assets/img/profile-img.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                        {{-- <h3>{{ $about->profession }}</h3> --}}
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore
                            et dolore
                            magna aliqua.
                        </p>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>
                                            {{ date('F jS, Y', strtotime($about->date_of_birth)) }}
                                        </span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>
                                        <span> <a
                                                href="{{ $about->website }}">{{ explode('//', $about->website)[1] }}</a></span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong>
                                        <span> <a
                                                href="tel:{{ $about->phone }}">{{ sprintf('%s %s %s %s', substr($about->phone, 0, 3), substr($about->phone, 3, 2), substr($about->phone, 5, 5), substr($about->phone, 10, 4)) }}</a>
                                        </span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><a
                                                href="https://maps.google.com/maps?daddr={{ $about->city }}, {{ $about->country }}">{{ "$about->city, " . mb_strtoupper(substr($about->country, 0, 3)) }}</a></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong>
                                        <span>{{ (new DateTime($about->date_of_birth))->diff(new DateTime())->y }}</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>
                                            {{ $about->degree }} </span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>email:</strong>
                                        <span>{{ $about->email }}</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong>
                                        <span> {{ $about->freelance == '1' ? 'Available' : 'Not Available' }} </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p>
                            Your website is the center of your digital eco-system, like a brick and mortar location, the
                            experience matters once a customer enters, just as much as the perception they have of you
                            before
                            they walk through the door.
                            <br>
                            – Leland Dieno
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->
        <!-- ======= Facts Section ======= -->
        <section id="facts" class="facts">
            <div class="container">

                <div class="section-title">
                    <h2 class="header-style" style="padding-bottom: initial">
                        {{-- /<img height="40px" src="{{ asset('image/header-icons/summary-icon.png') }}" alt="about">  --}}<span
                            style="background-color: #fff; padding-left: 0.5em; padding-right: 0.5em">Facts</span>
                    </h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat
                        sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row no-gutters">

                    @foreach ($facts as $key => $fact)
                        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up"
                            data-aos-delay="{{ $key * 100 }}">
                            <div class="count-box">
                                <i class="{{ $fact->icon->classes }}"></i>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $fact->number }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong> {{ $fact->name }} </strong>{{ $fact->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Facts Section -->

        <!-- ======= Skills Section ======= -->
        <section id="skills" class="skills section-bg">
            <div class="container">

                <div class="section-title">
                    <h2 class="header-style row" style="padding-bottom: initial">
                        {{-- /<img height="40px" src="{{ asset('image/header-icons/summary-icon.png') }}" alt="about">  --}}<span
                            style="background-color: #fff; padding-left: 0.5em; padding-right: 0.5em">Skills</span>
                    </h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat
                        sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row skills-content">
                    @foreach ($skills as $key => $skill)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $key % 2 == 0 ? '0' : '100' }}">
                            <div class="progress" style="overflow:initial;">
                                <span class="skill">{{ $skill->name }} <i
                                        class="val">{{ $skill->percent }}%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->percent }}"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Skills Section -->

        <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume">
            <div class="container">

                <div class="section-title">
                    <h2 class="header-style" style="padding-bottom: initial">
                        {{-- /<img height="40px" src="{{ asset('image/header-icons/summary-icon.png') }}" alt="about">  --}}<span
                            style="background-color: #fff; padding-left: 0.5em; padding-right: 0.5em">Resume</span>
                    </h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat
                        sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-up">
                        <h3 class="resume-title">Sumary</h3>
                        <div class="resume-item pb-0">
                            <h4>{{ $resumeSummary->title }}</h4>
                            <p><em>{!! $resumeSummary->description !!}</em></p>
                        </div>

                        <h3 class="resume-title">Education</h3>
                        @foreach ($resumeEducation as $education)
                            <div class="resume-item">
                                <h4> {{ $education->title }} </h4>
                                <h5>{{ date('Y', strtotime($education->start_date)) }} -
                                    {{ isset($education->end_date) ? date('Y', strtotime($education->end_date)) : 'Present' }}
                                </h5>
                                <p><em>{{ $education->company }},
                                        {{ $education->city }}{{ isset($education->state) ? "/$education->state" : '' }},
                                        {{ $education->country }} </em></p>
                                <p>{!! $education->description !!}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="resume-title">Professional Experience</h3>
                        @foreach ($resumeExperience as $experience)
                            <div class="resume-item">
                                <h4>{{ $experience->title }}</h4>
                                <h5>{{ date('Y', strtotime($experience->start_date)) }} -
                                    {{ isset($experience->end_date) ? date('Y', strtotime($experience->end_date)) : 'Present' }}
                                </h5>
                                <p><em>{{ $experience->company }},
                                        {{ $experience->city }}{{ isset($experience->state) ? "/$experience->state" : '' }},
                                        {{ $experience->country }}</em></p>
                                <p>{!! $experience->description !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section><!-- End Resume Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2 class="header-style" style="padding-bottom: initial">
                        {{-- /<img height="40px" src="{{ asset('image/header-icons/summary-icon.png') }}" alt="about">  --}}<span
                            style="background-color: #fff; padding-left: 0.5em; padding-right: 0.5em">Portfolio</span>    
                    </h2>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($tags as $tag)
                                <li data-filter="{{ '.filter-' . strtolower($tag->name) }}">{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="300">
                    @foreach ($portfolios as $portfolio)
                        <div class="{{ 'col-lg-4 col-md-6 portfolio-item filter-' . strtolower($portfolio->tag_name) }}">
                            <div class="portfolio-wrap">
                                <img src="{{ asset($portfolio->image) }}" class="img-fluid" alt="">
                                <h4>{{ $portfolio->name }}</h4>
                                <p>{{ $portfolio->tag_name }}</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset($portfolio->image) }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                                    <a href="{{ url('portfolio/' . $portfolio->id) }}" title="More Details"><i
                                            class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Portfolio Section -->


        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2 class="header-style" style="padding-bottom: initial">
                        {{-- /<img height="40px" src="{{ asset('image/header-icons/summary-icon.png') }}" alt="about">  --}}<span
                            style="background-color: #fff; padding-left: 0.5em; padding-right: 0.5em">Services</span>    
                    </h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat
                        sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">
                    @foreach ($services as $key => $service)
                        <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                            <div class="icon"><i class="{{ $service->icon->classes }}"></i></div>
                            <h4 class="title"><a href="">{{ $service->name }}</a></h4>
                            <p class="description">{{ $service->description }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container">

                <div class="section-title">
                    <h2 class="header-style" style="padding-bottom: initial">
                        {{-- /<img height="40px" src="{{ asset('image/header-icons/summary-icon.png') }}" alt="about">  --}}<span
                            style="background-color: #fff; padding-left: 0.5em; padding-right: 0.5em">Testimonials</span>
                    </h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat
                        sit in iste officiis commodi quidem hic quas.</p>
                </div>
                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach ($testimonials as $key => $testimonial)
                            <div class="swiper-slide">
                                <div class="testimonial-item" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        {{ $testimonial->description }}
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                    <img src="{{ asset($testimonial->image) }}" class="testimonial-img" alt="">
                                    <h3>{{ $testimonial->name }}</h3>
                                    <h4> {{ $testimonial->designation }} </h4>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2 class="header-style" style="padding-bottom: initial">
                        {{-- /<img height="40px" src="{{ asset('image/header-icons/summary-icon.png') }}" alt="about">  --}}<span
                            style="background-color: #fff; padding-left: 0.5em; padding-right: 0.5em">Contact</span>
                    </h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat
                        sit in iste officiis commodi quidem hic quas.</p>
                </div>
                @if (Cookie::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Cookie::get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row" data-aos="fade-in">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>{{ $contact->address }}</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p> {{ $contact->email }}</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p> {{ sprintf('%s %s %s %s', substr($contact->phone, 0, 3), substr($contact->phone, 3, 2), substr($contact->phone, 5, 5), substr($contact->phone, 10, 4)) }}
                                </p>
                            </div>
                            <iframe style="border:0; width: 100%; height: 350px;"
                                src="{{ 'https://www.google.com/maps?q=' . $contact->address . '&output=embed' }}"
                                frameborder="0" allowfullscreen=""></iframe>
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="{{ route('contact.form') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Your Name</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Message</label>
                                <textarea class="form-control" name="message" rows="10" required></textarea>
                            </div>
                            <div class="text-center"><button class="btn btn-info" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section>
    </main>
    <!-- End Contact
@endsection
