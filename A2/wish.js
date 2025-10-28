// Function to add an item to the wishlist
function add(item) {
    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

    if (!wishlist.includes(item)) {
        wishlist.push(item);
        localStorage.setItem("wishlist", JSON.stringify(wishlist));
        alert(item + " has been added to your wishlist!");
    }
}

// Function to remove an item from the wishlist
function removed(item) {
    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

    if (wishlist.includes(item)) {
        wishlist = wishlist.filter(wishlistItem => wishlistItem !== item);
        localStorage.setItem("wishlist", JSON.stringify(wishlist));
        alert(item + " has been removed from your wishlist.");
    }
}

// Function to check if an item is in the wishlist
function inWish(item) {
    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];
    return wishlist.includes(item);
}

// Initialize the button to toggle add/remove functionality
function toggle(button, item) {
    if (inWish(item)) {
        button.textContent = "Remove from Wishlist";
        button.onclick = () => {
            removed(item);
            toggle(button, item);
        };
    } else {
        button.textContent = "Add to Wishlist";
        button.onclick = () => {
            add(item);
            toggle(button, item);
        };
    }
}

// Function to display wishlist items
function display() {
    const wishlistContainer = document.getElementById("wishlist-container");
    const wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

    wishlistContainer.innerHTML = ""; // Clear existing content

    if (wishlist.length === 0) {
        wishlistContainer.innerHTML = "<p>Your wishlist is empty.</p>";
    } else {
        wishlist.forEach(item => {
            // Create item elements
            const itemDiv = document.createElement("div");
            itemDiv.classList.add("wishlist-item");

            const itemName = document.createElement("p");
            itemName.textContent = item;

            const removeButton = document.createElement("button");
            removeButton.textContent = "Remove";
            removeButton.onclick = () => {
                removed(item);
                display(); // Refresh the display after removal
            };

            // Append elements
            itemDiv.appendChild(itemName);
            itemDiv.appendChild(removeButton);
            wishlistContainer.appendChild(itemDiv);
        });
    }
}

// Call display() when wishlist.html is loaded

if (document.getElementById("wishlist-container")) {
    display();
}

