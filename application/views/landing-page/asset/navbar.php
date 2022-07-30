<!-- Header -->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark m-auto change bg-dark">
    <div class="container-fluid" style="width: 94%;">
        <!-- Navbar Brand -->
        <?php foreach ($website as $web) :?>
        <a class="navbar-brand" href="#">
            <img src="<?= base_url('assets/img/website/') . $web['logo'];?>" alt="BroMind Logo ">
        </a>
        <?php endforeach ?>

        <!-- Toggler on Mobile -->
        <button class="navbar-toggler" type="button" data-trigger="#main_nav">
            <img src="<?= base_url('assets/');?>img/icons/menu_collapse.svg" alt="Menu">
        </button>
        <div class="navbar-collapse" id="main_nav">
            <!-- Header Navbar Collapse -->
            <div class="offcanvas-header mt-2">
                <!-- cart -->
                <button class="btn bg-transparent">
                    <a href="#" class="nav-link iconShopping" data-toggle="modal" data-target="#singleCart">
                        <script type="text/javascript">
                            if(JSON.parse(localStorage.getItem('items')) ===null){

                            }else{
                                document.write('<div id="notif-sm"></div>');
                            }
                        </script>
                        <i class="fas fa-shopping-cart text-dark"></i>
                    </a>
                </button>
                <button class="btn btn-light btn-close float-right"><img src="<?= base_url('assets/img/icons/close.svg');?>" alt="Close" /></button>
            </div>

            <!-- Navbar Menu -->
            <ul class="navbar-nav text-center w-100" id="list">
                <li class="nav-item">
                    <a href="<?= base_url();?>" class="nav-link active">Home<span class="sr-only">(current)</span></a>
                </li>
                <?php
                foreach($page as $pg) :?>
                    <li class="nav-item">
                        <a href="<?= $pg->link ?>" class="nav-link active" target="<?php if($pg->link == 'https://www.youtube.com/user/mahapatih8'){ echo 'blank';} else { echo '';};?>"><?= $pg->id;?></a>
                    </li>
                <?php endforeach ?>
            </ul>

            <!--Language -->
            <ul class="navbar-nav" id="cart-lang">
                 <li class="nav-item d-none d-lg-block">
                    <a href="#" class="nav-link iconShopping-dekstop" data-toggle="modal" data-target="#singleCart">
                        <script type="text/javascript">
                            if(JSON.parse(localStorage.getItem('items')) === null){

                            }else{
                                document.write('<div id="notif-lg"></div>');
                            }
                        </script>
                        <img src="<?= base_url('assets/') . '/img/icons/shopping_cart.svg';?>" alt="My Cart">
                    </a>
                </li>
            </ul>
            
            <div class="language_translate text-center mt-3">
                <img src="<?= base_url('assets/img/icons/publicon_social.svg');?>" class="d-none d-lg-block" alt="Language">
                <img src="<?= base_url('assets/img/icons/publicon_social_black.svg');?>" class="d-lg-none d-xl-none" alt="Language">
                
                <select onchange="doGTranslate(this);" class="lg language">              
                    <option value="id|id" ></i> Indonesia</option>
                    <option value="id|en" >English</option> 
                </select>

                <div id="google_translate_element2"></div>
            </div>
        </div>
    </div>
</nav>