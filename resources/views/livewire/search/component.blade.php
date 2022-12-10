<div class="input-group">
    <input wire:model="search" type="text" class="form-control" placeholder="Buscar por nombre" id="q">
    <span class="input-group-btn">
        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
    </span>
</div><!-- /input-group -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        livewire.on('scan-code', action => {
            $('#code').val('')
        });
    });
</script>
