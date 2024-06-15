<template>
    <link rel="stylesheet" href="index.css">
    <nav class="navbar navbar-expand-lg container-menu">
        <div class="container">
            <div class="col-5 col-sm-6 col-lg-3">
                <a class="navbar-brand mx-auto" href="#">
                    <h3>Boca Rosa</h3>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ul-container-menu">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid containerEcomm">
        <div class="row">
            <div class=" col-ecomm">
                <img src="./test5.png" class=" img-fluid" alt="">
            </div>
        </div>
    </div>

    <div class="container container-categorys">
        <div class="row">
            <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                <a href="#" class="category-item item-1">
                    <img src="./1.webp" class="icon" width="80" height="80" alt="">
                    <h3 class="title-category">Cuidados com a Pele</h3>
                </a>
            </div>
            <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                <a href="#" class="category-item item-2">
                    <img src="./1.webp" class="icon" width="80" height="80" alt="">
                    <h3 class="title-category">Batons</h3>
                </a>
            </div>
            <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                <a href="#" class="category-item item-3">
                    <img src="./1.webp" class="icon" width="80" height="80" alt="">
                    <h3 class="title-category">Maquiagens</h3>
                </a>
            </div>
            <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                <a href="#" class="category-item item-4">
                    <img src="./1.webp" class="icon" width="80" height="80" alt="">
                    <h3 class="title-category">Blusher</h3>
                </a>
            </div>
            <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                <a href="#" class="category-item item-5">
                    <img src="./1.webp" class="icon" width="80" height="80" alt="">
                    <h3 class="title-category">Acessórios</h3>
                </a>
            </div>
            <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                <a href="#" class="category-item item-6">
                    <img src="./1.webp" class="icon" width="80" height="80" alt="">
                    <h3 class="title-category">Todos os Produtos</h3>
                </a>
            </div>
        </div>
    </div>

    <div class="container container-prod">
        <hr>
        <h2 class="text-center">Produtos com Ofertas</h2>
        <hr>
        <div class="row">
            <div class="col-6 col-lg-4 mb-4 mb-sm-8">
                <div class="product-item">
                    <div class="product-thumb">
                        <a href="#" class="d-block">
                            <img src="./3.webp" width="370" height="450" alt="Imagem-HasTech">
                        </a>
                        <div class="product-action row">
                            <button type="button" class="product-action-btn action-btn-quick-view col-5"
                                data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                <span>
                                   Comprar Agora
                                </span>
                            </button>
                            <button type="button" class="product-action-btn action-btn-cart col-5" data-bs-toggle="modal"
                                data-bs-target="#action-CartAddModal">
                                <span>
                                    Adicionar ao carrinho
                                </span>
                            </button>
                        </div>
                        <div class="product-info">
                            <h4>Batom Ruby Rose</h4>
                        </div>
                        <div class="prices">
                            <span class="price">R$: 29,90</span>
                            <span class="price-old">R$: 29,90</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

</script>


<style>
body {
    box-sizing: border-box;
    padding: 0 !important;
    margin: 0 !important;
    background-color: #fff !important;
}

.container-menu {
    font-family: "Shantell Sans", cursive;
}

.ul-container-menu li a {
    margin-left: 25px;
    font-size: 20px;
    font-weight: 500;
    height: 100px;
    padding: 0 12px;
    display: inline-block;
    line-height: 100px;
    letter-spacing: 0;
    position: relative;
    text-transform: capitalize;
    transition: all 0s ease-out;
    -webkit-transition: all 0s ease-out;
}

.col-ecomm {
    height: 450px;
    padding: 0px !important;
}

.container-categorys {
    padding-bottom: 1vh;
    /* padding-top: 2vh; */
}

.category-item {
    border-radius: 10px;
    display: block;
    padding: 45px 15px 30px;
    height: 100%;
    position: relative;
    text-align: center;
    transition: all .5s ease 0s;
    text-decoration: none;
}

.item-1 {
    background-color: #dcffd2;
}

.item-2 {
    background-color: rgb(223, 228, 255);
}

.item-3 {
    background-color: rgb(255, 237, 180);
}

.item-4 {
    background-color: rgb(255, 234, 204);
}

.item-5 {
    background-color: rgb(255, 218, 224);
}

.item-6 {
    background-color: rgb(255, 243, 218);
}

.category-item:hover {
    box-shadow: 0 4px 15px rgba(0, 0, 0, .15);
    transition: all .5s ease 0s;
}

.category-item .icon {
    margin-bottom: 43px;
    transition: all .8s ease 0s;
}

.category-item .title-category {
    color: #1d4a21;
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 0;
    position: relative;
    padding-top: 11px;
    font-family: Inter, sans-serif;
}

.category-item .title-category:before {
    background-color: #ff6565;
    content: "";
    height: 1px;
    left: 50%;
    position: absolute;
    top: 0;
    transform: translate(-50%);
    -webkit-transform: translate(-50%);
    -moz-transform: translate(-50%);
    -ms-transform: translate(-50%);
    -o-transform: translate(-50%);
    width: 25px;
}

.container-prod{
    margin-top: 50px;
    margin-bottom: 50px;
}


.product-item {
    position: relative;
    display: inline-block;
}

.product-thumb {
    position: relative;
}

.product-thumb img{
    border-radius: 20px;
}

.product-action {
    position: absolute;
    /* top: 0; */
    left: 0;
    opacity: 0;
    transition: opacity 0.3s;
    bottom: 15vh;
}
.product-item .product-action  {
    border-radius: 50px;
    height: 50px;
    letter-spacing: .2em;
    font-size: 13px;
    color: #231942;
    font-weight: 500;
    margin: 0 20px;
    padding: 5px 22px 5px 26px;
    text-align: center;
    text-transform: uppercase;
    transition-delay: .15s;
}

.product-item button{
    margin-left: 5px;
    margin-right: 5px;
}

.product-item .product-info{
    margin-top: 15px;
}

.product-item .product-action .product-action-btn{
    background-color: #fff;
    border-radius: 50px;
    border: 2px solid #e63946;
    color: #231942;
    /* display: inline-block; */
    transform: translateY(40px);
    -webkit-transform: translateY(40px);
    -moz-transform: translateY(40px);
    -ms-transform: translateY(40px);
    -o-transform: translateY(40px);
    transition: all .5s ease 0s;
    transition-delay: .1s;
}

.product-item .product-action .product-action-btn:hover{
    transition-delay: .1s;
    box-shadow: 0 4px 15px rgba(0, 0, 0, .15);
    transition: all .5s ease 0s;
}

.product-thumb:hover .product-action {
    opacity: 1;
}

.product-item .price{
    font-size: 21px;
    font-weight: 500;
}

.product-item .price-old{
    color: #364958;
    font-size: 12px;
    font-weight: 300;
    margin-left: 7px;
    -webkit-text-decoration-line: line-through;
    text-decoration-line: line-through;
}

.containerApp {
    display: none;
}
</style>