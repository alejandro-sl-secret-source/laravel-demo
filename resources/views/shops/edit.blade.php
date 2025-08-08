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

            <h1>Edit Shop {{$shop->name}}</h1>
            <form method="POST" action="{{ route('shops.update', $shop->id) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div style="margin-top: 20px">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required value="{{$shop->name}}">
                    @error('name')
                        <div style="margin-top: 10px; color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div style="margin-top: 20px">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required value="{{$shop->email}}">
                    @error('email')
                        <div style="margin-top: 10px; color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div style="margin-top: 20px">
                    <label for="is_active">Active</label>
                    <input type="checkbox" id="is_active" name="is_active" value="1" @if($shop->is_active)checked @endif">Yes
                    <input type="checkbox" id="is_active" name="is_active" value="0" @if(!$shop->is_active)checked @endif">No
                    @error('is_active')
                        <div style="margin-top: 10px; color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div style="margin-top: 20px">
                    <button type="submit">Edit Shop</button>
                </div>
            </form>
        </div>
    </body>
</html>
