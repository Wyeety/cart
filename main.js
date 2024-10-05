// navabr
const menuIcon = document.querySelector('.menu-icon');
const cancelIcon = document.querySelector('.cancel-icon');
const navItems = document.querySelector('.nav-items');

menuIcon.addEventListener('click', () => {
   navItems.classList.add('active');
   menuIcon.style.display = 'none';
   cancelIcon.style.display = 'block';
});

cancelIcon.addEventListener('click', () => {
   navItems.classList.remove('active');
   cancelIcon.style.display = 'none';
   menuIcon.style.display = 'block';
});
// navbar

window.onload = function() {
   var message = document.getElementById('loginMessage');
   if (message) {
       setTimeout(function() {
           message.style.opacity = '0';
           setTimeout(function() {
               message.style.display = 'none';
           }, 1000); // Match this with the CSS transition duration
       }, 1000); // Delay before hiding the message
   }
};

function confirmDelete() {
    return confirm("Are you sure you want to delete this product?");
}



