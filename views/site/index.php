<?php include ROOT .'/views/layouts/header.php' ?>
        <section>
            <div class="container">
                <div class="row">
<?php include ROOT .'/views/layouts/navigation.php' ?>
                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Последние товары</h2>
                            <?php foreach ($latestProducts as $latestProductItem): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?= Product::getImage($latestProductItem['id']) ?>" alt="" />
                                            <h2><?= $latestProductItem['price'] ?> &#8381;</h2>
                                            <p><a href="/product/<?= $latestProductItem['id'] ?>"><?= $latestProductItem['name'] ?></a></p>
                                            <a href="/cart/add/<?= $latestProductItem['id'] ?>" data-id="<?= $latestProductItem['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?= ($latestProductItem['is_new']) ? '<img src="/template/images/home/new.png" class="new" alt="" />' : '' ; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>

                        </div><!--features_items-->

                        <div class="recommended_items"><!--recommended_items-->
                            <h2 class="title text-center">Рекомендуемые товары</h2>

                            <div class="cycle-slideshow"
                                    data-cycle-fx="carousel"
                                    data-cycle-timeout="5000"
                                    data-cycle-prev="#prev"
                                    data-cycle-next="#next"
                                    data-cycle-carousel-visible=3
                                    date-cycle-carousel-fluid=true
                                    data-cycle-slides="div.item2">
<?php $i = 0; foreach ($recommendedProducts as $product): ?>
                                <div class="item2">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?= Product::getImage($product['id']) ?>" alt="" />
                                                <h2><?= $product['price'] ?> &#8381;</h2>
                                                <p><a href="/product/<?= $product['id'] ?>"><?= $product['name'] ?></a></p>
                                                <a href="/cart/add/<?= $product['id'] ?>" data-id="<?= $product['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<?php $i++; endforeach ?>
                                <a class="left recommended-item-control" href="#" id="prev" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right recommended-item-control" href="#" id="next" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>

                            

                        </div><!--/recommended_items-->

                    </div>
                </div>
            </div>
        </section>

<?php include ROOT .'/views/layouts/footer.php' ?>
