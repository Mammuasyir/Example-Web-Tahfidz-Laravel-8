<div class="modal fade" id="verticalycenter{{$haf->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Edit Hafalan Baru</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('hafalanbaru.edit', $haf->id)}}" role="form">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="form-group form-group-default">
                                <label>Kode Hafalan</label>
                                <select class="@error('siswa_id') is-invalid @enderror form-select input-fixed" name="siswa_id">
                                    <option value="">--Choose Code--</option>
                                    @foreach($sis as $siw)
                                    @if($siw->id == $haf->siswa_id)
                                    <option value="{{$siw->id}}" selected='selected'>{{$siw->kode_hafalan}}</option>
                                    @else
                                    <option value="{{$siw->id}}">{{$siw->kode_hafalan}}</option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('siswa_id')
                                <div class="invalid-feedback" style="width: 300px !important;" role="alert">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group form-group-default">
                                <label><strong>Juz</strong></label>
                                <input name="juz" value="{{$haf->juz}}" type="text" class="form-control" placeholder="fill number">
                            </div>
                            <div class="form-group form-group-default">
                                <label><strong>Surat</strong></label>
                                <input name="surat" value="{{$haf->surat}}" type="text" class="form-control" placeholder="fill surat">
                            </div>
                            <div class="form-group form-group-default">
                                <label><strong>Ayat</strong></label>
                                <input name="ayat" value="{{$haf->ayat}}" type="text" class="form-control" placeholder="fill number">
                            </div>
                            <div class="form-group form-group-default">
                                <label><strong>Jumlah Baris</strong></label>
                                <input name="jumlah_baris" value="{{$haf->jumlah_baris}}" type="text" class="form-control" placeholder="fill number">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->