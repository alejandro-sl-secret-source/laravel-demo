@include('common.header')

    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="margin-top: 10px;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <body>
        <div>
            <h1>Create New Shop</h1>
            <form method="POST" action="{{ route('shops.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div style="margin-top: 20px">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    @error('name')
                        <div style="margin-top: 10px; color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div style="margin-top: 20px">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required>
                    @error('email')
                        <div style="margin-top: 10px; color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div style="margin-top: 20px">
                    <label for="is_active">Active</label>
                    <input type="checkbox" id="is_active" name="is_active" value="1">Yes
                    <input type="checkbox" id="is_active" name="is_active" value="0">No
                    @error('is_active')
                        <div style="margin-top: 10px; color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div style="margin-top: 20px">
                    <button type="submit">Create Shop</button>
                </div>
            </form>
        </div>
    </body>
</html>
