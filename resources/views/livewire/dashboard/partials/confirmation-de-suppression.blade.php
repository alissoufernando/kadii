<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

  window.addEventListener('show-delete-confirmation', event => {
    Swal.fire({
      title: 'Etes-vous sûr?',
      text: "Vous ne pourrez pas revenir en arrière !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Oui'
    }).then((result) => {
      if (result.isConfirmed) {
        Livewire.emit('deleteConfirmation')
      }
    })
  })
  window.addEventListener('deleted', event => {
    Swal.fire(
      'Supprimer!',
      event.detail.message,
      'success'
    )
  })

</script>
