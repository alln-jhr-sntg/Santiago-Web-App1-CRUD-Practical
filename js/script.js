document.addEventListener("DOMContentLoaded", function () {
  const rows = document.querySelectorAll("tr[data-quantity]");

  rows.forEach(row => {
    const qty = parseInt(row.dataset.quantity, 10);
    if (qty < 5) {
      row.style.backgroundColor = "#ffe5e5"; // Light red
      row.style.color = "#900"; // Dark red
      row.style.fontWeight = "bold";
    }
  });

  const modal = document.getElementById("lowStockModal");
  const btn = document.getElementById("lowStockBtn");
  const close = document.getElementById("closeModal");

  if (btn && modal && close) {
    btn.onclick = () => modal.style.display = "block";
    close.onclick = () => modal.style.display = "none";
    window.onclick = (e) => {
      if (e.target == modal) modal.style.display = "none";
    };
  }

});

