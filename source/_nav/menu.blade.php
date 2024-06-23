<nav class="hidden lg:flex items-center justify-end text-lg">
    <a title="{{ $page->siteName }} Blog" href="/blog"
        class="ml-6 text-gray-700 hover:text-pink-600 {{ $page->isActive('/blog') ? 'active text-pink-600' : '' }}">
        Blog
    </a>

    <a title="{{ $page->siteName }} Bookshelf" href="/bookshelf"
        class="ml-6 text-gray-700 hover:text-pink-600 {{ $page->isActive('/bookshelf') ? 'active text-pink-600' : '' }}">
        Bookshelf
    </a>

    <a title="{{ $page->siteName }} About" href="/about"
        class="ml-6 text-gray-700 hover:text-pink-600 {{ $page->isActive('/about') ? 'active text-pink-600' : '' }}">
        About
    </a>

    <a title="{{ $page->siteName }} Contact" href="/contact"
        class="ml-6 text-gray-700 hover:text-pink-600 {{ $page->isActive('/contact') ? 'active text-pink-600' : '' }}">
        Contact
    </a>
</nav>
