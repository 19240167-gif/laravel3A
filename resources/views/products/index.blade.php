<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
div {
    text-align: center;
}
</style>

</head>
<body>
    <h1>DATA PRODUK</h1>
  <a href="{{route('products.create')}}">Tambah Produk</a>
  <div class="center">
   
    @csrf
    <table border="1">
        <tr>
            <th>Pilih</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        @forelse ($nama_produk as $product)
        <tr>
            <td><input type="checkbox" name="ids[]" value="{{ $product->id }}"></td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->deskripsi }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->price }}</td>
            <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
            
             <a href="{{route('products.edit',$product->id)}}">Edit</a>
             @csrf
             @method('DELETE')
             <button type="submit">HAPUS</button>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">Data masih kosong</td>
        </tr>
        @endforelse
    </table>

    <button type="submit" onclick="return confirm('Apakah yakin ingin menghapus produk yang dipilih?')">Hapus Terpilih</button>
</form>

</body>
</html>