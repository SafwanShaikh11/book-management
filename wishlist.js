function addToWishlist(id) {
    // Use AJAX to add item to wishlist
    fetch(`php/wishlist.php?action=add&id=${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Item added to wishlist!');
            }
        });
}

function loadWishlist() {
    fetch('php/wishlist.php?action=list')
        .then(response => response.json())
        .then(data => {
            const list = document.getElementById('wishlist');
            list.innerHTML = '';
            data.forEach(item => {
                const li = document.createElement('li');
                li.textContent = item.name;
                list.appendChild(li);
            });
        });
}

document.addEventListener('DOMContentLoaded', loadWishlist);
