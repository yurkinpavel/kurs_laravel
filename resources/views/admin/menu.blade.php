<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">
            <li class="nav-item"><a class="nav-link"  href="<?=route('home')?>">Главная</a></li>
            <li class="nav-item"><a class="nav-link"   href="<?=route('admin.index')?>">Админка</a></li>
            <li class="nav-item"><a class="nav-link"  href="<?=route('admin.page2')?>">Страница 2</a></li>
            <li class="nav-item"><a class="nav-link"  href="<?=route('admin.page3')?>">Страница 3</a></li>
            <li class="nav-item"><a class="nav-link"  href="<?=route('addnews')?>">Добавить новость</a></li>
</ul>
        </div>
    </div>
</nav>