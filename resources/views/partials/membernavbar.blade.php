
<li {{ Request::is('catalog*') ? ' class=active ' : '' }}">
    <a href="{{ url('/blog') }}">Blog</a>
</li>
<li {{ Request::is('orders*') ? ' class=active ' : '' }}">
    <a href="{{ url('/myblogs') }}">My Blogs</a>
</li>
