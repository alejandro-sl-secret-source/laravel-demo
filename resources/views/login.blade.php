@include('common.header')

    <body>
        <div>
            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="margin-top: 10px;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <h1>Login</h1>
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div style="margin-top: 20px">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required>
                    @error('email')
                        <div style="margin-top: 10px; color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div style="margin-top: 20px">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <div style="margin-top: 10px; color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-top: 20px">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>
