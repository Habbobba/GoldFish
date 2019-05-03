<div class="navbar">
  <div class="container">
    <ul class="navigation">
@foreach(App\Models\CMS\Menu::orderBy('order','asc')->where('group', null)->get() as $menuItem)
   <li {{ $menuItem->url ? '' : "class=dropdown" }}>
     <a href="/{{$menuItem->url}}" {{ (str_contains(strtolower($menuItem->url), strtolower($group)) ? 'class=selected' : '' ) }}>
        {{ $menuItem->title }}
     </a>
  </li>
@endforeach
<li>
<a class="right" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</li>
</ul>
</div>
</div>
<div class="sub-navigation">
  <div class="container">
    <ul class="navigation">
      @foreach(App\Models\CMS\Menu::children(strtolower($group))->Get() as $item)
        <li><a href="/{{$item->url}}" {{ (Request::is($item->url) ? 'class=selected' : '') }}>{{ $item->title}}</a></li>
      @endforeach
    </ul>
  </div>
</div>
