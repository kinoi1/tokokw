// Function to delete a product
function deleteProduct(productId, csrfToken) {
    if (confirm('Are you sure you want to delete this product?')) {
        fetch(`/product/delete/${productId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken, // Menyertakan CSRF token
                'Content-Type': 'application/json'
            },
        })
        .then(response => {
            if (response.ok) {
                alert('Product deleted successfully');
                location.reload(); // Memuat ulang halaman untuk melihat perubahan
            } else {
                alert('Failed to delete product');
            }
        })
        .catch(error => console.error('Error:', error));
    }
}
