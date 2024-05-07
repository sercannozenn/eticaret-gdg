<ul>
    @foreach($categories as $category)
        <li>
            {{ $category->name }}
            @if($category->children->isNotEmpty())
                @include('categories', ['categories' => $category->children])
            @endif
        </li>
    @endforeach
</ul>
