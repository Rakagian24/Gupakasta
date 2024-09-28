<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Kas Umum</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
            word-wrap: break-word;
            font-family: 'Times New Roman', Times, serif;
        }

        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
            word-wrap: break-word;
            font-family: 'Times New Roman', Times, serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            position: absolute;
            left: 0;
            top: 0;
            height: 70px;
        }

        .header p {
            margin: 2px 0;
            font-weight: bold;
        }

        .sub-header {
            justify-content: space-between;
            margin-top: 10px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .column-tanggal,
        .column-rekening,
        .column-debet,
        .column-kredit,
        .column-saldo {
            width: 15%;
        }

        .column-no-bukti {
            width: 20%;
        }

        .column-uraian {
            width: 25%;
        }

        .signature-section {
            /* margin-top: 40px; */
            /* display: flex; */
            flex-direction: column;
            /* justify-content: space-between;
            font-size: 12px;
            width: 100%; */
            /* align-items: flex-start; */
            /* Align items to the top */
        }

        .signature-box {
            text-align: center;
            width: 40%;
            /* Ensure each box takes up 45% of the width */
        }

        .signature-box p {
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ asset('images/bandung.png') }}" alt="Logo">
        <p>PEMERINTAH KOTA BANDUNG</p>
        <p>BUKU KAS UMUM</p>
        <p>BENDAHARA PENGELUARAN</p>
        <p>Periode 01 {{ \Carbon\Carbon::now()->translatedFormat('F Y') }} s.d
            {{ \Carbon\Carbon::now()->endOfMonth()->translatedFormat('d F Y') }}</p>
    </div>

    <div class="sub-header">
        <div>Unit Organisasi: Dinas Perumahan dan Kawasan Permukiman</div>
        <div>Sub Unit: Sekretariat</div>
    </div>

    <table>
        <thead>
            <tr style="text-align: center">
                <th class="column-tanggal">Tanggal</th>
                <th class="column-no-bukti">No Bukti</th>
                <th class="column-rekening">Rekening</th>
                <th class="column-uraian">Uraian</th>
                <th class="column-debet">Debet</th>
                <th class="column-kredit">Kredit</th>
                <th class="column-saldo">Saldo</th>
            </tr>
            <tr style="text-align: center">
                <th class="column-tanggal">1</th>
                <th class="column-no-bukti">2</th>
                <th class="column-rekening">3</th>
                <th class="column-uraian">4</th>
                <th class="column-debet">5</th>
                <th class="column-kredit">6</th>
                <th class="column-saldo">7</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sortedData as $sd)
                <tr>
                    <td class="column-tanggal">{{ $sd->tanggal }}</td>
                    <td class="column-no-bukti">{{ $sd->no_bukti }}</td>
                    <td class="column-rekening">
                        @if (isset($sd->anggaranRekening))
                            {{ $sd->anggaranRekening->subRincianObjek->rincianObjek->objek->jenis->kelompok->akun->kode_akun }}.{{ $sd->anggaranRekening->subRincianObjek->rincianObjek->objek->jenis->kelompok->kode_kelompok }}.{{ $sd->anggaranRekening->subRincianObjek->rincianObjek->objek->jenis->kode_jenis }}.{{ $sd->anggaranRekening->subRincianObjek->rincianObjek->kode_rincian_objek }}.{{ $sd->anggaranRekening->subRincianObjek->kode_sub_rincian_objek }}
                        @endif
                    </td>
                    <td class="column-uraian">{{ $sd->uraian }}</td>
                    <td class="column-debet">{{ number_format($sd->pencairan, 2, ',', '.') }}</td>
                    <td class="column-kredit">{{ number_format($sd->gu, 2, ',', '.') }}</td>
                    <td class="column-saldo">{{ number_format($sd->saldo, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table style="border: none; margin-top: 40px;">
        <tr>
            <td style="border: none; text-align: center;">
                <p>Mengetahui/Menyetujui:</p>
                <p>Kuasa Pengguna Anggaran</p>
                <p style="text-decoration: underline; margin-top: 60px;">LUTHFIKHI DAUS, ST., M.Si</p>
                <p>NIP 197810012003121005</p>
            </td>
            <td style="border: none; text-align: center;">
                <p>Bandung, {{ now()->format('d F Y') }}</p>
                <p>BENDAHARA PENGELUARAN PEMBANTU</p>
                <p style="text-decoration: underline; margin-top: 60px;">ASEP MOCHAMAD TONI</p>
                <p>NIP 197509242007011007</p>
            </td>
        </tr>
    </table>
    {{-- <div style="display: flex" class="signature-section">
        <div class="signature-box">
            <p>Mengetahui/Menyetujui:</p>
            <p>Kuasa Pengguna Anggaran</p>
            <p style="text-decoration: underline; margin-top: 60px;">LUTHFIKHI DAUS, ST., M.Si</p>
            <p>NIP 197810012003121005</p>
        </div>
        <div style="margin-left: 400px" class="signature-box">
            <p>Bandung, {{ now()->format('d F Y') }}</p>
            <p>BENDAHARA PENGELUARAN PEMBANTU</p>
            <p style="text-decoration: underline; margin-top: 60px;">ASEP MOCHAMAD TONI</p>
            <p>NIP 197509242007011007</p>
        </div>
    </div> --}}

</body>

</html>
