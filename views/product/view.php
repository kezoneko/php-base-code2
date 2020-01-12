<?php include ROOT .'/views/layouts/header.php' ?>

        <section>
            <div class="container">
                <div class="row">
<?php include ROOT .'/views/layouts/navigation.php' ?>
                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="<?= Product::getImage($product['id']) ?>" alt="" />
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->
                                        <?= ($product['is_new']) ? '<img src="/template/images/product-details/new.jpg" class="newarrival" alt="" />' : '' ?>
                                        <h2><?= $product['name'] ?></h2>
                                        <p>Код товара: <?= $product['code'] ?></p>
                                        <span>
                                            <span><?= $product['price'] ?> &#8381;</span>
                                            <label>Количество:</label>
                                            <input type="text" value="3" />
                                            <button type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </button>
                                        </span>
                                        <p><b>Наличие:</b> <?= ($product['availability']) ? 'На складе' : 'Нет в наличии' ?></p>
                                        <p><b>Состояние:</b> <?= ($product['is_new']) ? 'Новое' : 'Не новое' ?></p>
                                        <p><b>Производитель:</b> <?= $product['brand'] ?></p>
                                    </div><!--/product-information-->
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-sm-12">
                                    <h5>Описание товара</h5>
                                    <?= $product['description'] ?>
                                </div>
                            </div>
                        </div><!--/product-details-->

                    </div>
                </div>
            </div>
        </section>
        

        <br/>
        <br/>
        
<?php include ROOT .'/views/layouts/footer.php' ?>
