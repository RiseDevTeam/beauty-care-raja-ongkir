<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Cek Harga Ongkir</title>
</head>

<body>
    <div class="container mt-5">
        <a href="{{ route('proses_pembayaran') }}" class="btn btn-danger">Back</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Service</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Biaya Ongkos Kirim</th>
                    <th scope="col">Pilih</th>
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('pilih_ongkir') }}" method="POST">
                    @foreach ($daftarOngkir as $ongkir)
                        @foreach ($ongkir['costs'] as $ongkos)
                            @csrf
                            <tr>
                                <th scope="row">{{ $ongkir['code'] }}
                                    <input type="text" name="code" value="{{ $ongkir['code'] }}">
                                </th>
                                <td>{{ $ongkir['name'] }}
                                    <input type="text" name="nama" value="{{ $ongkir['name'] }}">
                                </td>
                                <td>
                                    {{ $ongkos['service'] }}
                                    <input type="text" name="service" value="{{ $ongkos['service'] }}">
                                </td>
                                <td>
                                    {{ $ongkos['description'] }}
                                    <input type="text" name="description" value="{{ $ongkos['description'] }}">
                                </td>
                                @foreach ($ongkos['cost'] as $cost)
                                    <td>{{ $cost['value'] }}
                                        <input type="text" name="value" value="{{ $cost['value'] }}">
                                        <input type="submit" name="value">
                                    </td>
                                @endforeach
                                <td>
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    @endforeach
                </form>
            </tbody>
        </table>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>
