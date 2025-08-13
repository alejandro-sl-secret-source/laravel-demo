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
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($shops as $shop)
                        <tr>
                            <td><a href="{{ route('shops.show', $shop->id) }}">{{ $shop->name }}</a></td>
                            <td>{{ $shop->email }}</td>
                            <td>{{ $shop->is_active ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="{{ route('shops.edit', $shop->id) }}">Edit</a>
                                <br/>
                                <form method="POST" action="{{ route('shops.delete', $shop->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-link">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
            </table>

            <div style="margin-top: 20px;">
                <a href="{{ route('shops.create') }}">Create New Shop</a>
            </div>

        </div>
    </body>

    <style>
        .delete-link {
            background: none;
            border: none;
            cursor: pointer;
            text-decoration: underline;
            color: blue;
            font-family: 'Times New Roman', Times, serif;
            font-size: 16px;
            padding: 0;
        }
    </style>

</html>
