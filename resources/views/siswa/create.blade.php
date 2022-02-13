<div class="modal fade" id="addSiswa" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('siswa.store')}}" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Nama Siswa</label>
                                <input id="nama_siswa" name="nama_siswa" type="text" class="form-control" placeholder="fill name" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label>Halaqoh</label>
                                <select class="@error('halaqoh_id') is-invalid @enderror form-select input-fixed" name="halaqoh_id" required>
                                    <option value selected="">--Pilih Halaqoh--</option>
                                    @foreach($halaqoh as $ha)
                                    <option value="{{$ha->id}}">{{$ha->nama_halaqoh}}</option>
                                    @endforeach
                                </select>
                                @error('halaqoh_id')
                                <div class="invalid-feedback" style="width: 300px !important;" role="alert">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-group form-group-default">
                                <label>Total Hafalan </label>
                                <input id="total_hafalan" name="total_hafalan" type="text" class="form-control" placeholder="fill name" required>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Upload Photo</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="image" type="file" id="formFile" required>
                                </div>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Basic Modal-->
            </form>