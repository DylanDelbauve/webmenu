document.getElementById("save").addEventListener("click", () => {
    var button = document.getElementById("save");
    button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Chargement...';
    button.disabled = true;
    document.getElementById('form').submit();
  });