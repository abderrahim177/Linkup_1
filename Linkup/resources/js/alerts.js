function showSuccessAlert(message) {
    Swal.fire({
        title: 'Nadi!',
        text: message,
        icon: 'success',
        confirmButtonText: 'Ok',
        confirmButtonColor: '#2563eb',
        timer: 3000, 
        timerProgressBar: true
    });
}