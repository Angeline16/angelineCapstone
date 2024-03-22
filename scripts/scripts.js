const toggleButton = document.getElementById("toggleSidebar");
const sidebar = document.getElementById("sidebar");
const closeSidebar = document.getElementById("close");

toggleButton.addEventListener("click", () => {
  sidebar.classList.toggle("hidden");
});
closeSidebar.addEventListener("click", () => {
  sidebar.classList.toggle("hidden");
});
