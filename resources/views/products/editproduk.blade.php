<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f5f5f5;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 350px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 8px 16px;
            margin-right: 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }

        button[type="reset"] {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <form action="{{ route('products.update', $nama_produk->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="{{ $nama_produk->title }}">

        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" id="deskripsi" >{{ $nama_produk->deskripsi }}</textarea>

        <label for="stok">Stok:</label>
        <input type="text" name="stok" id="stok" value="{{ $nama_produk->stock }}">

        <label for="harga">Harga:</label>
        <input type="text" name="harga" id="harga" value="{{ $nama_produk->price }}">

        <button type="submit">Update</button>
        <button type="reset">Batal</button>
    </form>
</body>
</html>
