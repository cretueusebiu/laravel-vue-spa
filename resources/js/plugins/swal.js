
import Swal from 'sweetalert2/dist/sweetalert2.js'
const confirm = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success swal2-styled',
    cancelButton: 'btn btn-danger swal2-styled'
  },
  buttonsStyling: false
})

export default confirm
