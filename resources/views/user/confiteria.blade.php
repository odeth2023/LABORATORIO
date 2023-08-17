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
            <div class="roww">
                <div class="col-sm-6 col-md-4 col-lg-3 ">
                    <div class="box">
                        <div class="img-box">
                            <img src="img/product/confitería/COMBOS/CBO-1.jpeg" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                            Combo 2 Dulce OL CC
                           </h5>
                        </div>
                        <h5>
                            1 Canchita Gigante (Dulce) + 2 Bebidas (32oz). *Sabor bebida sujeto a stock / canchita sin refill
                        </h5>
                        <br>
                        <div class="quantity buttons_added">
                            <input type="button" value="-" class="minus">
                            <input type="number" step="1" min="0" max="" name="quantity" value="0" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                            <input type="button" value="+" class="plus" >
                            <div class="detail-boxX">
                                <h6>
                                    S/47.00
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="img/product/confitería/COMBOS/CBO-2.jpeg" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                            Combo 2 Salado OL CC
                           </h5>
                        </div>
                        <h5>
                            Canchita Gigante Salada + 2 Bebidas (32oz). *Sabor bebida sujeto a stock / canchita sin refill
                        </h5>
                        <br>
                        <div class="quantity buttons_added">
                            <input type="button" value="-" class="minus">
                            <input type="number" step="1" min="0" max="" name="quantity" value="0" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                            <input type="button" value="+" class="plus" >
                            <div class="detail-boxX">
                                <h6>
                                    S/43.00
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="img/product/confitería/COMBOS/CBO-3.jpeg" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                            Combo 2 Mix OL CC
                           </h5>
                        </div>
                        <h5>
                            1 Canchita Gigante (Mix) + 2 Bebidas (32oz). *Sabor bebida sujeto a stock / canchita sin refill
                        </h5>
                        <br>
                        <div class="quantity buttons_added">
                            <input type="button" value="-" class="minus">
                            <input type="number" step="1" min="0" max="" name="quantity" value="0" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                            <input type="button" value="+" class="plus" >
                            <div class="detail-boxX">
                                <h6>
                                    S/47.00
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="img/product/confitería/COMBOS/CBO-4.jpeg" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                            Com.2 Salado Dob.Gig. OL
                           </h5>
                        </div>
                        <h5>
                            2 Canchita Gigante Salada + 2 Bebidas Grandes (32oz) *Sabor bebida sujeto a stock / canchita sin refill
                        </h5>
                        <br>
                        <div class="quantity buttons_added">
                            <input type="button" value="-" class="minus">
                            <input type="number" step="1" min="0" max="" name="quantity" value="0" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                            <input type="button" value="+" class="plus" >
                            <div class="detail-boxX">
                                <h6>
                                    S/54.00
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="img/product/confitería/COMBOS/CBO-5.jpeg" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                            Com.2 Mix Dob.Gig. OL
                           </h5>
                        </div>
                        <h5>
                            ¡Exclusivo para ti! 2 Canchita Gigante + 2 Bebidas Grandes (32oz) a un precio especial / Canchita sin refill
                        </h5>
                        <br>
                        <div class="quantity buttons_added">
                            <input type="button" value="-" class="minus">
                            <input type="number" step="1" min="0" max="" name="quantity" value="0" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                            <input type="button" value="+" class="plus" >
                            <div class="detail-boxX">
                                <h6>
                                    S/58.00
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="img/product/confitería/COMBOS/CBO-6.jpeg" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                            Com.2 Dulce Dob.Gig. OL
                           </h5>
                        </div>
                        <h5>
                            2 Canchita Gigante (Dulce) + 2 Bebidas Grandes (32oz) . *Sabor bebida sujeto a stock / canchita sin refill
                        </h5>
                        <br>
                        <div class="quantity buttons_added">
                            <input type="button" value="-" class="minus">
                            <input type="number" step="1" min="0" max="" name="quantity" value="0" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                            <input type="button" value="+" class="plus" >
                            <div class="detail-boxX">
                                <h6>
                                    S/58.00
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
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



