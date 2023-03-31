@extends('layouts.app')

@section('title')
Detail Page
@endsection

@section('content')

<div class="page-content page-details">
    <!-- BREADCRUMB -->
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB -->
    <!-- DETAILS -->
    <!-- GALLERY -->
    <section class="store-gallery mb-3" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" data-aos="zoom-in">
                    <transition name="slide-fade" mode="out-in">
                        <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image"
                            alt="" />
                    </transition>
                </div>
                <div class="col-lg-2">
                    <div class="row">
                        <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id"
                            data-aos="zoom-in" data-aos-delay="100">
                            <a href="#" @click="changeActive(index)">
                                <img :src="photo.url" class="w-100 thumbnail-image"
                                    :class="{active: index == activePhoto}" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- GALLERY -->
    <!-- DESCRIPTION -->
    <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h1>{{ $product->name }}</h1>
                        <div class="owner">By {{ $product->user->store_name }}</div>
                        <div class="price">$ {{ number_format($product->price) }}</div>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">
                        @auth
                        <form action="{{ route('detail-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-success px-4 text-white btn-block mb-3 button-cart">
                                Add to Cart
                            </button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-success px-4 text-white btn-block mb-3">
                            Sign in to Add
                        </a>
                        @endauth

                    </div>
                </div>
            </div>
        </section>
        <section class="store-description">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </section>
        <section class="store-review">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 col-lg-8 mt-3 mb-3">
                        <h4>Customer Review (<strong>3</strong>)</h4>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-12 col-lg-8">
                        <ul class="list-ustyled">
                            <li class="media">
                                <img src="/images/kyle-nicky.png" alt="Kyle Nicky" class="mr-3 rounded-circle" />
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">Kyle Nicky</h5>
                                    I thought it was not good for living room. I really happy
                                    to decided buy this product last week now feels like
                                    homey.
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-12 col-lg-8">
                        <ul class="list-ustyled">
                            <li class="media">
                                <img src="/images/unknown-error.png" alt="unknown user" class="mr-3 rounded-circle" />
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">Unknown User</h5>
                                    Color is great with the minimalist concept. Even I thought
                                    it was made by Cactus industry. I do really satisfied with
                                    this.
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="400">
                    <div class="col-12 col-lg-8">
                        <ul class="list-ustyled">
                            <li class="media">
                                <img src="/images/marry-sasha.png" alt="Marry Sasha" class="mr-3 rounded-circle" />
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">Marry Sasha</h5>
                                    When I saw at first, it was really awesome to have with.
                                    Just let me know if there is another upcoming product like
                                    this.
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- DESCRIPTION -->
    <!-- REVIEW -->

    <!-- REVIEW -->

    <!-- DETAILS -->
</div>

@endsection

@push('addon-script')
<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.slim.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="/script/navbar-script.js"></script>
<script>
    AOS.init();

</script>
<script src="/vendor/vue/vue.js"></script>
<script>
    var gallery = new Vue({
        el: "#gallery",
        mounted() {
            AOS.init();
        },
        data: {
            activePhoto: 0,
            photos: [
                @foreach($product->galleries as $gallery) {
                    
                        id: {{ $gallery->id }},
                        url: "{{ Storage::url($gallery->photo) }}",
                    
                },

                @endforeach
            ],
        },
        methods: {
            changeActive(id) {
                this.activePhoto = id;
            },
        },
    });

</script>
@endpush
