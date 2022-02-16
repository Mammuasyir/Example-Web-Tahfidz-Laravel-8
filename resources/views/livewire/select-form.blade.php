<div>

    <div class="form-group">

        <label>Jenjang</label>
        <select class="form-select" required wire:model="jenjang" name="jenjang_id">
            <option selected>-- Pilih Jenjang --</option>
            @foreach($jenjang as $row)
            <option value="{{$row->id}}">{{$row->jenjang}}</option>

            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Kelas</label>
        <select class="form-select" required wire:model="Kelas" name="kelas_id">
            <option selected>-- Nama (Kelas) --</option>
            @foreach($kelas as $kel)
            <option value="{{$kel->id}}">{{$kel->kelas}}</option>

            @endforeach
        </select>
    </div>

</div>