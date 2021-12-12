<div class="modal fade" id="editHalaqoh{{$ha->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">Edit Halaqoh</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('halaqoh.edit', $ha->id)}}" role="form">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Halaqoh</label>
                                <input id="halaqoh" name="nama_halaqoh" value="{{$ha->nama_halaqoh}}" type="text" class="form-control" placeholder="fill name">
                            </div>
                            <div class="form-group form-group-default">
                                <label>Nama Guru</label>
                                <input id="guru" name="nama_guru" value="{{$ha->nama_guru}}" type="text" class="form-control" placeholder="fill name">
                            </div>
                            <div class="form-group form-group-default">
                                <label>Kelas</label>
                                <select class="@error('kelas_id') is-invalid @enderror form-select input-fixed" name="kelas_id">
												<option value="">--Pilih Kelas--</option>
												@foreach($kelas as $ke)
                                                
                                                @if($ke->id == $ha->kelas_id)
												<option value="{{$ke->id}}" selected='selected'>{{$ke->kelas}}</option>
                                                @else
                                                <option value="{{$ke->id}}">{{$ke->kelas}}</option>
                                                @endif

												@endforeach
											</select>
											@error('kelas_id')
											<div class="invalid-feedback" style="width: 300px !important;" role="alert">
										<strong>{{$message}}</strong>
									</div>
									@enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Small Modal-->
