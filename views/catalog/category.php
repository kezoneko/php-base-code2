<?php include ROOT .'/views/layouts/header.php' ?>
        <section>
            <div class="container">
                <div class="row">
<?php include ROOT .'/views/layouts/navigation.php' ?>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Товары категории "<?= $categoryName ?>"</h2>
                            <?php foreach ($categoryProducts as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?= Product::getImage($product['id']) ?>" alt="" />
                                            <h2><?= $product['price'] ?> &#8381;</h2>
                                            <p><a href="/product/<?= $product['id'] ?>"><?= 'ID: '. $product['id'] .', '. $product['name'] ?></a></p>
                                            <a href="/cart/add/<?= $product['id'] ?>" data-id="<?= $product['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?= ($product['is_new']) ? '<img src="/template/images/home/new.png" class="new" alt="" />' : '' ; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>

                            <!-- Постраничная навигация -->
                            <?= $pagination->get() ?>

                        </div><!--features_items-->

                    </div>
                </div>
            </div>
        </section>

<?php include ROOT .'/views/layouts/footer.php' ?>
