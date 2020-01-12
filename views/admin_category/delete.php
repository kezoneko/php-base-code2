<?php include ROOT .'/views/layouts/header_admin.php' ?>

<section>
    <div class="container">
        <div class="row">
            
            <br>

            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li class="active">Удалить категорию</li>
                </ul>
            </div>

            <h4>Удалить категорию №<?= $id ?></h4>

            <p>Вы действительно хотите удалить категорию?</p>
            <form action="#" method="post">
                <input type="submit" name=submit value="Удалить" class="btn btn-default">
            </form>

        </div>
    </div>
</section>

<?php include ROOT .'/views/layouts/footer_admin.php' ?>
