@extends('layouts.masterpage')

@section('content')

<div class="page-header">

    <div class="page-block">

        <div class="row align-items-center">

            <div class="col-md-8">

                <div class="page-header-title">

                    <h5 class="m-b-10">BIENVENIDO admin- {{ Auth::user()->name }}</h5>
                    
                    {{ Auth::user()->id }}

                </div>

            </div>

           

        </div>

    </div>

</div>


@endsection

