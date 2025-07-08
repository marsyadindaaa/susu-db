
function toggleMenu() {
  const navList = document.querySelector('nav ul');
  navList.classList.toggle('show');
}

// Tombol scroll ke atas
function scrollToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Tampilkan tombol saat scroll
window.onscroll = function () {
  const btn = document.getElementById("scrollTopBtn");
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    btn.style.display = "block";
  } else {
    btn.style.display = "none";
  }
};

document.addEventListener("DOMContentLoaded", function () {
  const ulasanContainer = document.getElementById("ulasanContainer");
  const nextBtn = document.getElementById("nextBtn");
  const prevBtn = document.getElementById("prevBtn");

  nextBtn.addEventListener("click", () => {
    ulasanContainer.scrollBy({ left: 300, behavior: "smooth" });
  });

  prevBtn.addEventListener("click", () => {
    ulasanContainer.scrollBy({ left: -300, behavior: "smooth" });
  });
});
