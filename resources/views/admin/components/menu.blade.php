    <li class="nav-item"><a class="nav-link" href="<?= route('home') ?>">Сайт</a></li>
    <li class="nav-item"><a class="nav-link {{request()->routeIs('admin.index')?'active':''}}" href="<?= route('admin.index') ?>">Админка</a></li>

    <li class="nav-item"><a class="nav-link {{request()->routeIs('admin.page3')?'active':''}}" href="<?= route('admin.page3') ?>">Скачать изображение</a></li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Скачать текст
        </a>
        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
            <li class="nav-item"><a class="nav-link {{request()->routeIs('admin.page2')?'active':''}}" href="<?= route('admin.page2') ?>">Скачать все новости</a></li>
            @forelse($all_categories as $category_item)

            <li><a class="dropdown-item" href="{{route('admin.download',$category_item['id'] )}}">Скачать новости "{{$category_item['title']}}"</a></li>
            @empty
            <li><a class="dropdown-item" href="#">Нет категорий</a></li>
            @endforelse

        </ul>
    </li>


    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Редактировать
        </a>
        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink1">
            <li><a class="dropdown-item" href="{{route('admin.list_news')}}">Редактировать новости</a></li>
            <li><a class="dropdown-item" href="{{route('admin.list_categories')}}">Редактировать категории</a></li>
        </ul>
    </li>


    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Создать
        </a>
        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink2">
            <li><a class="dropdown-item {{request()->routeIs('admin.create')?'active':''}}" href="<?= route('admin.create') ?>">Создать новость</a></li>
            <li><a class="dropdown-item {{request()->routeIs('admin.create_category')?'active':''}}" href="{{route('admin.create_category')}}">Создать категорию</a></li>
        </ul>
    </li>