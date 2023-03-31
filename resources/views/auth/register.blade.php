@extends('layouts.auth')

@section('title')
Register!
@endsection

@section('content')

<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center justify-content-center row-login">
                <div class="col-lg-4">
                    <h2>Register Page Saha Store</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label>Full Name</label>
                            <input v-model="name" id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input v-model="email" @change="checkEmail()" id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                :class="{'is-invalid' : this.email_unavailable }" value="{{ old('email') }}" required
                                autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="password-confirmation" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Store</label>
                            <p class="text-muted">Do you want to open a shop?</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="is_store_open" id="openStoreTrue"
                                    v-model="is_store_open" :value="true" />
                                <label for="openStoreTrue" class="custom-control-label">Yes, I want</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="is_store_open"
                                    id="openStoreFalse" v-model="is_store_open" :value="false" />
                                <label for="openStoreFalse" class="custom-control-label">No, next time</label>
                            </div>
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label>Store Name</label>
                            <input id="store_name" v-mode="store_name" type="text"
                                class="form-control @error('store_name') is-invalid @enderror" name="store_name"
                                required autocomplete autofocus>

                            @error('store_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label>Category</label>
                            <select name="categories_id" class="form-control">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-4"
                            :disabled="this.email_unavailable">Register Now</button>
                        <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-4">Back to Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('addon-script')

<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
<script>
    Vue.use(Toasted);
    var register = new Vue({
        el: "#register",
        mounted() {
            AOS.init();

        },
        methods: {
            checkEmail: function () {
                var self = this;

                axios.get('{{ route('api-register-check') }}', {
                            params: {
                                email: this.email
                            }
                        })
                    .then(function (response) {
                        if (response.data == 'Available') {
                            self.$toasted.show(
                                "Your email is available for registration at Saha Store!", {
                                    position: "top-center",
                                    className: ["rounded"],
                                    duration: 1000
                                }
                            );

                            self.email_unavailable = false;

                        } else {
                            self.$toasted.error(
                                "Sorry, it seems the email is already registered in our system.", {
                                    position: "top-center",
                                    className: ["rounded"],
                                    duration: 1000
                                }
                            );

                            self.email_unavailable = true;
                        }
                    })

            }
        },
        data() {
            return {
                name: "Dimas Adit",
                email: "frontdimass@gmail.com",
                is_store_open: true,
                store_name: "",
                email_unavailable: false,
            }
        }
    });

</script>

@endpush
