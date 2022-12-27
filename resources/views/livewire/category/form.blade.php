<div >
    @include('common.modalHead')
    <div class="row">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    {{ $selected_id > 0 ? 'Editar' : 'Crear' }} categoria
                </h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        <label for="categories">NOMBRE DE LA CATEGORIA</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                            <input type="text" class="form-control" id="categories" placeholder="ej: Cursos"
                                wire:model.lazy="name">
                        </div>
                    </div>
                    <div class="form-group">
                        @error('name')
                            <span class="text-danger er">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="custom-file-label">Imágen {{ $image }}</label>
                            <input type="file" id="" wire:model="image"
                                accept="image/x-png, image/gif, image/jpeg">
                            @error('image')
                                <span class="text-danger er">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!-- /.box-body -->
                </div>
            </form>
        </div>
    </div>
    @include('common.modalFooter')
</div>
