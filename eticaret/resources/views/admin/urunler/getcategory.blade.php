<div class="container mt-3">
    <table class="table">
        <thead>
        <tr>
            <th>Görsel</th>
            <th>Ad</th>
            <th>Adet</th>
            <th>Fiyat</th>
        </tr>
        </thead>
        <tbody id="userTableBody">
        @foreach($products as $val)
            <tr>
                <td><img height="100px" src="/storage/productimages/{{$val->id}}.jpg"></td>
                <td>{{$val->product_name}}</td>
                <td>{{$val->count}}</td>
                <td>{{$val->price}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
