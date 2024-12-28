@include('sections.head')
<body class="g-sidenav-show  bg-gray-200">


    @include('sections.aside')
    @include('sections.nav')
    <a href="{{ route('create_catrgory') }}">
    <button style="margin-left: 1300px;" class="btn btn-primary">Create New Category</button>
    </a>
    <div style="margin-left: 300px">
    @include('sections.category_table')
    </div>
    @include('sections.fixed')
    @include('sections.js')
</body>

</html>
