                <li class="nav-item"><a class="nav-link {{request()->routeIs('home')?'active':''}}" href="{{route('home')}}">Главная</a></li>
                <li class="nav-item"><a class="nav-link {{request()->routeIs('news')?'active':''}}" href="{{route('news')}}">Новости</a></li>
                <li class="nav-item"><a class="nav-link {{request()->routeIs('categories')?'active':''}}" href="{{route('categories')}}">Новости по категориям</a></li>
                <li class="nav-item"><a class="nav-link {{request()->routeIs('about')?'active':''}}" href="{{route('about')}}">О нас</a></li>
                <li class="nav-item"><a class="nav-link {{request()->routeIs('admin.index')?'active':''}}" href="{{route('admin.index')}}">Админка</a></li>
 