<html>
<head>
    <title></title>
</head>
<body>
    <script>
        var countAlat = {{$tools->count()}};
        var countBahan = {{$materials->count()}};
        var countStep = {{$steps->count()}};
    </script>
    <form action="{{ route('editProduct') }}" method="POST" enctype="multipart/form-data">
        Nama : <input type="text" name="Name" value="{{$product->nama}}"> {{ $errors->first('Name') }}
        <br><br>
        Label : <input type="text" name="Label" value="{{$product->label}}"> {{ $errors->first('Label') }}
        <br><br>
        Tingkat Kesulitan : <input type="text" name="Level" value="{{$product->kesulitan}}"> {{ $errors->first('Level') }}
        <br><br>
        Perkiraan Harga : <input type="text" name="Price" value="{{$product->harga}}"> {{ $errors->first('Price') }}
        <br><br>
        Kategori : <input type="text" name="Category" value="{{$product->kategori}}"> {{ $errors->first('Category') }}
        <br><br>
        Penjelasan Karya : <input type="text" name="Desc" value="{{$product->penjelasan}}"> {{ $errors->first('Desc') }}
        <br><br>
        <img src="../../{{ $product->picture}}" height=200 width=200><br><br>
        Gambar : <input type="file" name="Picture"> {{ $errors->first('Picture') }} 
        <br><br>
        <div id='alat'>
            Alat : <br>
            <?php
                $i = 1;
                $temp = 'alat' . $i;
            ?>
            @foreach($tools as $tool)
                <input type="text" name="alat{{$i}}" value="{{$tool->nama}}"> {{ $errors->first($temp) }}<br><br>
                <?php
                    $i++;
                    $temp = 'alat' . $i;
                ?>
            @endforeach
            
        </div>
        <br><br>
        <div id='bahan'>
            Bahan : <br>
            <?php
                $i = 1;
                $temp = 'bahan' . $i;
            ?>
            @foreach($materials as $material)
                <input type="text" name="bahan{{$i}}" value="{{$material->nama}}"> {{ $errors->first($temp) }}<br><br>
                <?php
                    $i++;
                    $temp = 'bahan' . $i;
                ?>
            @endforeach
        </div>
        Langkah : <br><br>
            <?php
                $i = 1;
                $temp = 'judulstep' . $i;
                $temp2 = 'descstep' . $i;
            ?>
            @foreach($steps as $step)
                <div id='langkah'>
                Langkah {{$i}} = <br><br>
                Judul : <input type="text" name="judulstep{{$i}}" value="{{$step->judul}}"><br><br> {{ $errors->first($temp) }} 
                Deskripsi : <input type="text" name="descstep{{$i}}" value="{{$step->penjelasan}}"><br><br> 
                {{ $errors->first('$temp2') }} 
                <?php
                    $arr = $productCtrl->getStepPictures($step->id);
                    $j = 1;
                    $temp = 'step' . $i . '-' . $j;
                    $temp2 = 'descstep' . $i . '-' . $j;
                ?>
                 @foreach ($arr as $pict)
                    @if($pict!=null)
                        <img src="../{{ $pict->picture}}" height=200 width=200><br><br>
                        Gambar {{$j}}: <input type="file" name="step{{$i}}-{{$j}}"> {{ $errors->first($temp) }} <br><br>
                        Judul Gambar {{$j}}: <input type="text" name="judulstep{{$i}}-{{$j}}" value="{{$pict->judul}}"> {{ $errors->first($temp2) }} 
                        <br><br>
                        <?php
                            $j++;
                            $temp = 'step' . $i . '-' . $j;
                            $temp2 = 'descstep' . $i . '-' . $j;
                        ?>
                    @endif
                @endforeach
                <?php
                    $i++;
                    $temp = 'judulstep' . $i;
                    $temp2 = 'descstep' . $i;
                ?>
                </div>
            @endforeach
        <input type="hidden" id="countAlat" name="countAlat" value='{{$tools->count()}}'>
        <input type="hidden" id="countBahan" name="countBahan" value='{{$materials->count()}}'>
        <input type="hidden" id="countStep" name="countStep" value='{{$steps->count()}}'>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
        <input type="submit">
    </form> 
</body>
</html>
