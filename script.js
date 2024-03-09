const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}


function buyNowClicked() {

      alert('You need to login first.');
      // Replace 'signin.html' with the actual URL of your sign-in page
      window.location.href = './customer_login.php';
  }


//   For Animation when scroll the page

  document.addEventListener('DOMContentLoaded', function () {
    const animatedElements = document.querySelectorAll('.animate__animated');

    function isInViewport(element) {
      const rect = element.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
    }

    function handleScroll() {
      animatedElements.forEach(function (element) {
        if (isInViewport(element)) {
          element.classList.add('animate__fadeInUp');
        }
      });
    }

    // Attach the handleScroll function to the scroll event
    window.addEventListener('scroll', handleScroll);

    // Initial check for elements in the viewport on page load
    handleScroll();
  });
