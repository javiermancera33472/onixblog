<li {{ Request::is('catalog*') ? ' class=active ' : ''}}>
    <a href="{{ url('/blog') }}">Blogs</a>
</li>  

<li id="liTables">
    <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tables<span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        
        <li {{ Request::is('courses*') ? ' class=active ' : ''}}>
            <a href="{{ url('/categories') }}">Categories</a>
        </li>
        <li {{ Request::is('authors*') ? ' class=active ' : ''}}>
            <a href="{{ url('/members') }}">Authors</a>
        </li>
        <li {{ Request::is('settings*') ? ' class=active ' : ''}}>
            <a href="{{ url('/settings') }}">Blog Elapsed Time</a>
        </li>
    </ul>
</li>
