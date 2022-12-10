@include('livewire.startpage.init')

<script>
  document.addEventListener('DOMContentLoaded', function() {
      window.livewire.on('show-modal', Msg => {
          $('#modal-details').modal('show')
      })
  })
  window.livewire.on('show-modal', msg => {
      $('#theModal').modal('show');
  });
</script> 
