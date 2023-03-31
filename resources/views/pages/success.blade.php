@extends('layouts.success')

@section('title')
Transaction Success!
@endsection

@section('content')

    <div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="/images/bag.svg" alt="Success" class="mb-4" />
              <h2>Transaction Processed!</h2>
              <p>
                Please wait for email confirmation from us we will inform the
                receipt as soon as possible!
              </p>
              <div>
                <a href="/dashboard.html" class="btn btn-success w-50 mt-4"
                  >My Dashboard</a
                >
                <a href="{{ route('home') }}" class="btn btn-signup w-50 mt-2"
                  >Go to Shopping</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
@endsection