@include('common.header')

    <body>
        <div>
            <h1>Shop Detail</h1>
            <div>
                <h3>Name: {{ $shop->name }}</h3>
                <h3>Email: {{ $shop->email }}</h3>
                <h4>Active: {{ $shop->is_active ? 'Yes' : 'No' }}</h4>
            </div>

            <div style="margin-top: 20px;">
                <a href="{{ route('shops.index') }}">Shops List</a>
            </div>

        </div>
    </body>
</html>
