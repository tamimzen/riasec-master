<table>
    <thead>
        <tr>
            <th colspan="9" class="text-center font-bold">
                <b>
                    <h1>Laporan Hasil Tes Mahasiswa <?= $prodi ?> Tahun 20<?= $tahun?></h1>
                </b>
            </th>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Program Studi</th>
            <th>Angkatan</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Hasil Tes</th> 
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        ?>

    @foreach ($dataUser as $item)
        <tr class="intro-x">
            <td class="w-20">{{ $no ++ }}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->nim}}</td>
            <td>{{$item->programstudi->program_studi ?? "-"}}</td>
            <td class="text-center">{{$item->tahun->tahun ?? null}}</td>
            <td>{{Str::limit($item->email, 15, '..')}}</td>
            <td>{{$item->phone ?? null}}</td>
            <td class="text-secondary"> {{ $item->tipe ? $item->tipe->tipe->namatipe : '-' }}</td> 
           
        </tr>
        
        @endforeach

    </tbody>
</table>


