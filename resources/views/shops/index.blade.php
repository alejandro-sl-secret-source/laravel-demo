@include('common.header')

    <body>
        <div>
            <h1>Shops</h1>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shops as $shop)
                        <tr>
                            <td><a href="{{ route('shops.show', $shop->id) }}">{{ $shop->name }}</a></td>
                            <td>{{ $shop->email }}</td>
                            <td>{{ $shop->is_active ? 'Yes' : 'No' }}</td>
                        </tr>
                    @endforeach
            </table>

            <div style="margin-top: 20px;">
                <a href="{{ route('shops.create') }}">Create New Shop</a>
            </div>

        </div>
    </body>
</html>
