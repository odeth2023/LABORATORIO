@extends('layouts.MasterpageCliente')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        @foreach($c as $item)
                            <li><a href="{{ route('user.confiteriaD',$item) }}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
</div>


<!-- Product Section Begin -->
<section class="product_section layout_padding">
        <div class="container">
            <div class="row">
            @foreach($producto as $item)
                <div class="col-sm-6 col-md-4 col-lg-3 ">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{asset('$item->img')}}" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                           {{$item->name}}
                           </h5>
                        </div>
                        <h5>
                            {{$item->description}}
                        </h5>
                        <br>
                        <div class="quantity buttons_added">
                            <input type="button" value="-" class="minus">
                            <input type="number" step="1" min="0" max="" name="quantity" value="0" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                            <input type="button" value="+" class="plus" >
                            <div class="detail-boxX">
                                <h6>
                                {{$item->price}}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            

            <div class="product__pagination">
                <a href="confiteria.html">1</a>
                <a href="combos.html">2</a>
                <a href="combos.html"><i class="fa fa-long-arrow-right"></i></a>
            </div>
            <a href="#" class="btn btn-danger"><h5>Continuar</h5></a>
        </div>
</section>
<!-- Product Section End -->


@endsection

