<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #cbd5e1;
            color: black;
        }

        #total {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 50%;
            justify-content: right;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <table id="customers">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar Produk</th>
                <th>Nama Produk</th>
                <th>Qty</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ Storage::url('/storage/image-products/') . $product->product->image }}"
                            style="width: 15px" alt=""></td>
                    <td>{{ $product->product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>Rp {{ number_format((int) $product->product->harga) }}</td>
                    <td>Rp {{ number_format((int) $product->subtotal) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table id="total">
        <tr class="border-b">
            <td>Jumlah Jenis Barang</td>
            <td class="text-right">{{ $jumlah_barang }} Jenis</td>
        </tr>
        <tr class="border-b">
            <td>Jumlah Barang</td>
            <td class="text-right">{{ $quantity }}</td>
        </tr>
        <tr class="border-b">
            <td>Total</td>
            <td class="text-right total-harga">
                <h3>Rp
                    {{ number_format((int) $subtotal) }}</h3>
            </td>
        </tr>
    </table>
</body>

</html>
