@extends('layouts.app')

@section('content')
    <div class="container">

        <section>
            @if( session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            <div class="row">
                @foreach($products as $Prodoucts)
                    <div class="col-md-4">
                        <div class="card" >
                            <img src="{{$Prodoucts->image}}" class="card-img-top" >
                            <div class="card-body">
                                <h5 class="card-title">{{$Prodoucts->title}}</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <p class="card-text"> $ {{$Prodoucts->price}}</p>

                                <a href="{{ route('cart.add',$Prodoucts->id)}}" class="btn btn-primary"> Buy</a>                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection

