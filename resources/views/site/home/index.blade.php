
@extends("site/template")

@section("title" , "Adote")
@section("conteudo")

<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
                    
            <div class="card-body">
                <!-- <form  method="POST"> -->
                    @csrf
                    @include("site/home/_form")
                    <button class="mt-3 btn btn-outline-secondary" id="actionSave">
                        <i class="icon icon-xs text-gray-600 align-middle" data-feather="send"></i>    
                        Gravar
                    </button>

                <!-- </form> -->
            </div>
        </div>
    </div>
    <div id="section" class="col-12 col-lg-6 d-none">
        <div class="card text-capitalize text-center">
            <div class="card-header">
                <h5 class="m-0"></h5>
            </div>
            <div class="card-body">
                <div class="container_image">
                    <div class="img img-thumbnail shadow-lg">
                </div>
                <h2 class="ellipsis" ></h2>
            </div>
            <div class="card-footer">
                <button class="mt-3 btn btn-outline-primary" id="refreshImage">
                    <i class="icon icon-xs text-gray-600 align-middle" data-feather="refresh-cw"></i>    
                    Atualizar 
                </button>
            </div>
        </div>
    </div>
</div>
@endsection