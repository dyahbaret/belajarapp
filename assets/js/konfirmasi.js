function hapusMenu(url) {

    Swal.fire({
        tittle: 'Are you sure?',
                text: "Yakin ingin hapus menu?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.value){
            document.location.href = url;
        }
    })
}

function hapusRole(url) {
 
   
    Swal.fire({
        tittle: 'Are you sure?',
                text: "Yakin ingin hapus role?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.value){
            document.location.href = url;
        }
    })
}
function hapuSubmenu(url) {
    Swal.fire({
        tittle: 'Are you sure?',
                text: "Yakin ingin hapus sub menu?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.value){
            document.location.href = url;
        }
    })
}



