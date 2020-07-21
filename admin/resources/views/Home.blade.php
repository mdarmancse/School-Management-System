@extends('layout.app')

@section('title','Home')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-4 p-3">
                <div class="card">
                <div class="card-body">
                    <h3 class="count card-title">{{$TotalReviews}}</h3>
                    <h3 class="count card-text">Total Visitors</h3>
                </div>
                </div>
            </div>






            <div class="col-md-4 p-3">
                <div class="card">
                <div class="card-body">
                    <h3 class="count card-title">{{$TotalReviews}}</h3>
                    <h3 class="count card-text">Total Reviews</h3>
                </div>
                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="card">
                <div class="card-body">
                    <h3 class="count card-title">{{$TotalContact}}</h3>
                    <h3 class="count card-text">Total Contacts</h3>
                </div>
                </div>
            </div>



        </div>
    </div>



@endsection
