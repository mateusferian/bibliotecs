<script>
function checkFileSize() {
        var fileInput = document.getElementById('arquivo2');
        if (fileInput.files.length > 0) {
            var fileSize = fileInput.files[0].size; 
            var maxSize = <?php echo $uploadMaxSizeBytes; ?>;

            if (fileSize > maxSize) {
                Swal.fire({
                    icon: 'error',
                    title: 'O PDF tem que ter um tamanho menor que ' + <?php echo $uploadMaxSizeBytes; ?> + ' bytes!!',
                    customClass: {
                  popup: 'swalFireLivro',
              },
              showConfirmButton: false,
              allowOutsideClick: false
          });
      
          setTimeout(function() {
            window.location.href = '<?php echo $url; ?>';
          }, 4000);

                return false;
            }
        }
        return true;
    }
</script>