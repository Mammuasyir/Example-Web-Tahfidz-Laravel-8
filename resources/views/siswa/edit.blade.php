<div class="modal fade" id="editSiswa{{$si->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">Edit Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('siswa.update', $si->id)}}" role="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Nama Siswa</label>
                                <input id="nama_siswa" name="nama_siswa" value="{{$si->nama_siswa}}" type="text" class="form-control" placeholder="fill name">
                            </div>
                            <div class="form-group form-group-default">
                                <label>Halaqoh</label>
                                <select class="@error('halaqoh_id') is-invalid @enderror form-select input-fixed" name="halaqoh_id">
                                    <option value="">--Pilih Halaqoh--</option>
                                    @foreach($halaqoh as $ha)
                                    @if($ha->id == $si->halaqoh_id) 
                                    <option value="{{$ha->id}}" selected='selected'>{{$ha->nama_halaqoh}}</option>
                                    @else
                                    <option value="{{$ha->id}}">{{$ha->nama_halaqoh}}</option>
                                    @endif
                                    
                                    @endforeach
                                </select>
                                @error('halaqoh_id')
                                <div class="invalid-feedback" style="width: 300px !important;" role="alert">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group form-group-default">
                                <label>Kode Hafalan </label>
                                <input id="kode_hafalan" name="kode_hafalan" value="{{$si->kode_hafalan}}" type="text" class="form-control" placeholder="fill code">
                            </div>
                            <div class="form-group form-group-default">
                                <label>Total Hafalan </label>
                                <input id="total_hafalan" name="total_hafalan" value="{{$si->total_hafalan}}" type="text" class="form-control" placeholder="fill name">
                            </div>
                            <div class="form-group form-group-default">
                                <label>Photo </label>
                                <div class="col-lg-6 col-md-20 col-sm-8">
                                <img src="{{url('storage/', $si->image)}}" alt="Image" class="rounded-circle" style="width: 100px !important; height: 100px">
                            </div>
                            <br>
                                <input name="image" type="file" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
            </form>
        </div>
    </div>
</div><!-- End Small Modal-->