
document.getElementById('toggleFormButton').onclick = function(event) {
    const form = document.getElementById('productForm');
    if (form.classList.contains('hidden')) {
        // Jika form tersembunyi, tampilkan form
        form.classList.remove('hidden');
    } 
    if ($(event.target).data('trigger') == 'edit') {
    }else {
        resetForm(); // Reset form saat ditampilkan
    }
    $(event.target).data('trigger', '');
};

// Function to delete a product
function deleteCategory(categoryid, csrfToken) {
    if (confirm('Are you sure you want to delete this product?')) {
        fetch(`/category/delete/${categoryid}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken, // Menyertakan CSRF token
                'Content-Type': 'application/json'
            },
        })
        .then(response => {
            if (response.ok) {
                alert('Category deleted successfully');
                location.reload(); // Memuat ulang halaman untuk melihat perubahan
            } else {
                alert('Failed to delete Category');
            }
        })
        .catch(error => console.error('Error:', error));
    }
}
function edit(categoryid, csrfToken) {
    fetch(`/category/edit/${categoryid}`, {
        method: 'GET', // Mengubah menjadi method GET
        headers: {
            'X-CSRF-TOKEN': csrfToken, // Menyertakan CSRF token jika diperlukan
            'Content-Type': 'application/json'
        },
    })
    .then(response => response.json()) // Mengambil data JSON dari respons
    .then(data => {
        if (data) {
            resetForm();
            console.log(data);
            a = data.product;
            // Mengisi form dengan data yang didapatkan dari server
            $("[name='productcategoryid']").val(a.ProductCategoryID);
            $("[name='name']").val(a.Name);
            $("[name='code']").val(a.Code);
            $(document.getElementById('toggleFormButton')).data('trigger', 'edit').click();
            // Jika ada field lain, tambahkan di sini
        } else {
            alert('Failed to load Category data');
        }
    })
    .catch(error => console.error('Error:', error));
}

function resetForm() {
    // Reset form menggunakan jQuery
    $('#form')[0].reset(); // Menggunakan .reset() pada elemen form
    $("[name='productid']").val('');
}
