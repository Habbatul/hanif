const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('show');
      } else {
        entry.target.classList.remove('show');
      }
    });
  });
  
  const hiddenElements = document.querySelectorAll('.scrollAnimate');
  hiddenElements.forEach((el) => observer.observe(el));
//animasi 3
  const observer2 = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('show2');
      } else {
        entry.target.classList.remove('show2');
      }
    });
  });
  
  const hiddenElements2 = document.querySelectorAll('.scrollAnimate2');
  hiddenElements2.forEach((el) => observer2.observe(el));
//animasi3
const observer3 = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('show3');
      } else {
        entry.target.classList.remove('show3');
      }
    });
  });
  
  const hiddenElements3 = document.querySelectorAll('.stackUsed');
  hiddenElements3.forEach((el) => observer3.observe(el));

  //animasi4
const observer4 = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add('show4');
    } else {
      entry.target.classList.remove('show4');
    }
  });
});

const hiddenElements4 = document.querySelectorAll('.star');
hiddenElements4.forEach((el) => observer4.observe(el));

//animasi astroboy
const MIN_SCREEN_WIDTH_TAB = 700;
const MAX_SCREEN_WIDTH_TAB = 999;
const MIN_SCREEN_WIDTH = 1000;
const MAX_SCREEN_WIDTH = 1920;

// Fungsi untuk membuat dan mengamati Intersection Observer dengan rootMargin
function createAndObserveObserverWithRootMargin() {
  const observer = new IntersectionObserver(
    entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('show');
        } else {
          entry.target.classList.remove('show');
        }
      });
    },
    {
      rootMargin: '0px 0px -28% 0px', // Margin atas dikurangi 50px
    }
  );

  const hiddenElements = document.querySelectorAll('.scrollAstro');
  hiddenElements.forEach(el => observer.observe(el));
}

function createAndObserveObserverWithRootMarginTablet() {
  const observer = new IntersectionObserver(
    entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('show');
        } else {
          entry.target.classList.remove('show');
        }
      });
    },
    {
      rootMargin: '0px 0px -16% 0px', // Margin atas dikurangi 50px
    }
  );

  const hiddenElements = document.querySelectorAll('.scrollAstro');
  hiddenElements.forEach(el => observer.observe(el));
}

// Fungsi untuk membuat dan mengamati Intersection Observer tanpa rootMargin
function createAndObserveObserverWithoutRootMargin() {
  const observer = new IntersectionObserver(
    entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('show');
        } else {
          entry.target.classList.remove('show');
        }
      });
    }
  );

  const hiddenElements = document.querySelectorAll('.scrollAstro');
  hiddenElements.forEach(el => observer.observe(el));
}

// Periksa lebar layar dan pilih metode observasi yang sesuai
const screenWidth = window.innerWidth;
if (screenWidth >= MIN_SCREEN_WIDTH && screenWidth <= MAX_SCREEN_WIDTH) {
  createAndObserveObserverWithRootMargin();
} else if(screenWidth >= MIN_SCREEN_WIDTH_TAB  && screenWidth <= MAX_SCREEN_WIDTH_TAB ){
  createAndObserveObserverWithRootMarginTablet();
} 
else {
  createAndObserveObserverWithoutRootMargin();
}
