<div class="modal fade" id="editKelas{{$ke->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">Edit Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('kelas.edit', $ke->id)}}" role="form">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Jenjang</label>
                                <select name="jenjang_id" style="border: 1px solid;" required
                                    class="form-select bg-light">
                                    <option value="">&nbsp;&nbsp;&nbsp;-- Pilih Jenjang --</option>
                                    @foreach($jenjang as $row)
                                    @if($row->id == $ke->jenjang_id)
                                    <option value="{{$row->id}}" selected='selected'>&nbsp;&nbsp;&nbsp;{{$row->jenjang}}</option>
                                    @else
                                    <option value="{{$row->id}}">&nbsp;&nbsp;&nbsp;{{$row->jenjang}}</option>
                                    @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Kelas</label>
                                <input id="kelas" name="kelas" value="{{$ke->kelas}}" type="text" class="form-control" placeholder="fill name">
                            </div>
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
