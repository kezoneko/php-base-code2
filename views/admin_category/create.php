<?php include ROOT .'/views/layouts/header_admin.php' ?>

<section>
    <div class="container">
        <div class="row">
            
            <br>

            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li class="active">Добавить категорию</li>
                </ul>
            </div>

            <h4>Добавить новую категорию</h4>

<?php if (isset($errors) && is_array($errors)):?>
    <?php foreach ($errors as $error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
    <?php endforeach ?>
<?php endif ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        
                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="">

                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="">

                        <p>Статус</p>
                        <select name="status" id="status">
                            <option value="1" selected>Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>

                        <br><br>

                        <input type="submit" name="submit" value="Добавить" class="btn btn-default">

                        <br><br>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT .'/views/layouts/footer_admin.php' ?>
