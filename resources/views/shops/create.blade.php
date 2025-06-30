@include('common.header')

    <body>
        <div>
            <h1>Create New Shop</h1>
            <form method="POST" action="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div>
                    <label for="is_active">Active</label>
                    <input type="checkbox" id="is_active" name="is_active" value="1">Yes
                    <input type="checkbox" id="is_active" name="is_active" value="0">No
                </div>
                <div>
                    <button type="submit">Create Shop</button>
                </div>
            </form>
        </div>
    </body>
</html>
