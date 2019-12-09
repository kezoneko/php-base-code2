 <!DOCTYPE html>
<html lang="ru">
  <head>
    <title>Mini Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="/phpstart/template/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/phpstart/template/css/bootstrap.min.css">
    <link rel="stylesheet" href="/phpstart/template/css/magnific-popup.css">
    <link rel="stylesheet" href="/phpstart/template/css/jquery-ui.css">
    <link rel="stylesheet" href="/phpstart/template/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/phpstart/template/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/phpstart/template/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/phpstart/template/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="/phpstart/template/css/aos.css">

    <link rel="stylesheet" href="/phpstart/template/css/style.css">
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">
          
          <div class="col-12 search-form-wrap js-search-form">
            <form method="get" action="#">
              <input type="text" id="s" class="form-control" placeholder="Поиск...">
              <button class="search-btn" type="submit"><span class="icon-search"></span></button>
            </form>
          </div>

          <div class="col-4 site-logo">
            <a href="/phpstart" class="text-black h2 mb-0">KSkill Блог</a>
          </div>

          <div class="col-8 text-right">
            <nav class="site-navigation" role="navigation">
              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                <li><a href="/phpstart/">Главная</a></li>
                <li><a href="/phpstart/news/">Новости</a></li>
                <li><a href="/phpstart/archives/">Архив</a></li>
                <li><a href="/phpstart/products/">Продукция</a></li>
                <li><a href="/phpstart/articles/">Статьи</a></li>
                <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>

      </div>
    </header>
    
    
    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Раздел</span>
            <h3>Новости</h3>
            <p>Важные события из моей жизни и всего того, что интересно</p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-white">
      <div class="container">
        <div class="row">
          <?php foreach ($newsList as $key => $newsItem): ?>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="/phpstart/news/<?= $newsItem['id'] ?>"><img src="<?= $newsItem['preview'] ?>" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-warning mb-3">Образ жизни</span>

              <h2><a href="/phpstart/news/<?= $newsItem['id'] ?>"><?= $newsItem['title'] ?></a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="/phpstart/template/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">Автор <a href="#"><?= $newsItem['author_name'] ?></a></span>
                <span>&nbsp;-&nbsp; <?= $newsItem['date'] ?></span>
              </div>
              
                <p><?= $newsItem['short_content'] ?></p>
                <p><a href="/phpstart/news/<?= $newsItem['id'] ?>">Подробнее</a></p>
              </div>
            </div>
          </div>
          <?php endforeach ?>
          
        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            <div class="custom-pagination">
              <span>1</span>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <span>...</span>
              <a href="#">15</a>
            </div>
          </div>
      </div>
    </div>
  </div>
    
    
    
    <div class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4">О сайте</h3>
            <p>Сайт ведения заметок и событий из моей жизни</p>
          </div>
          <div class="col-md-3 ml-auto">
            <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
            <ul class="list-unstyled float-left mr-5">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Advertise</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Subscribes</a></li>
            </ul>
            <ul class="list-unstyled float-left">
              <li><a href="#">Travel</a></li>
              <li><a href="#">Lifestyle</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Nature</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            

            <div>
              <h3 class="footer-heading mb-4">Связь со мной</h3>
              <p>
                <a href="#"><span class="icon-instagram pt-2 pr-2 pb-2 pl-0"></span></a>
                <a href="#"><span class="icon-vk p-2"></span></a>
                <a href="#"><span class="icon-rss p-2"></span></a>
                <a href="#"><span class="icon-envelope p-2"></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
          </div>
        </div>
      </div>
    </div>
    
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>


    
  </body>
</html>
