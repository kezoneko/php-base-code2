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
                                            <img src="<?= $latestProductItem['image'] ?>" alt="" />
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

                            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    $i = 0;
                                    foreach ($recommendedProducts as $product): ?>
                                    <?php if ($i % 3 == 0): ?>
                                    <div class="item<?= ($i == 0) ? ' active' : '' ?>">
                                    <?php endif ?>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="<?= $product['image'] ?>" alt="" />
                                                        <h2><?= $product['price'] ?> &#8381;</h2>
                                                        <p><a href="/product/<?= $product['id'] ?>"><?= $product['name'] ?></a></p>
                                                        <a href="/cart/add/<?= $product['id'] ?>" data-id="<?= $product['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php if ($i != 0 AND (($i + 1) % 3 == 0)): ?>
                                    </div>
                                    <?php endif ?>
                                    <?php $i++; endforeach ?>
                                    </div>
                                </div>
                                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>            
                            </div>
                        </div><!--/recommended_items-->

                    </div>
                </div>
            </div>
        </section>

<?php include ROOT .'/views/layouts/footer.php' ?>
