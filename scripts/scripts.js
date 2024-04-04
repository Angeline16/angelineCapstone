const toggleButton = document.getElementById("toggleSidebar");
const sidebar = document.getElementById("sidebar");
const closeSidebar = document.getElementById("close");

toggleButton.addEventListener("click", () => {
  sidebar.classList.toggle("hidden");
});
closeSidebar.addEventListener("click", () => {
  sidebar.classList.toggle("hidden");
});

function updateImagePreview(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      // Update the src attribute of the image tag
      document.getElementById("uploaded-image").src = e.target.result;

      // Update the file name display
      const fileName = input.files[0].name;
      document.getElementById("file-name").innerText = fileName;
    };

    reader.readAsDataURL(input.files[0]); // Convert to data URL string
  }
}
