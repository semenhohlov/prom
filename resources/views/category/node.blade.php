<li>
    {{$node->group_name}}
    <ul>
    @foreach($node->children as $child)
        @include('category.node', ['node' => $child])
    @endforeach
    </ul>
</li>