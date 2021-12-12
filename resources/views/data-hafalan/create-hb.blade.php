<div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>New Rote</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('hafalanbaru.add')}}" role="form">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="form-group form-group-default">
                                <label>Kode Hafalan</label>
                                <select class="@error('siswa_id') is-invalid @enderror form-select input-fixed" name="siswa_id" required>
                                    <option value selected="">--Choose Code--</option>
                                    @foreach($sis as $si)
                                    <option value="{{$si->id}}">{{$si->kode_hafalan}}</option>
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
                                <input name="juz" type="text" class="form-control" placeholder="fill number" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label><strong>Surat</strong></label>
                                <input name="surat" type="text" class="form-control" placeholder="fill surat" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label><strong>Ayat</strong></label>
                                <input name="ayat" type="text" class="form-control" placeholder="fill number" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label><strong>Jumlah Baris</strong></label>
                                <input name="jumlah_baris" type="text" class="form-control" placeholder="fill number" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->