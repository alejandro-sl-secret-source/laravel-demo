@include('common.header')

    <body>
        <nav>
            <a href="{{ route('logout') }}">Log out</a>
        </nav>
        <div>
            @if (session('success'))
                <div style="color: green; margin: 15px 0;">
                    {{ session('success') }}
                </div>
            @endif
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
                                <form method="POST" id="delete-shop-form" action="{{ route('shops.delete', $shop->id) }}">
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

    <script>
        document.querySelectorAll("#delete-shop-form").forEach(function(form) {
            form.addEventListener("submit", function(event) {
                if (!confirm("Are you sure?")) {
                    event.preventDefault();
                }
            });
        });
    </script>

</html>
