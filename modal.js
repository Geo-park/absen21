function openModal(id, kehadiran, tanggal) {
    document.getElementById("edit-id").value = id;
    document.getElementById("edit-kehadiran").value = kehadiran;
    document.getElementById("edit-tanggal").value = tanggal;

    document.getElementById("editModal").style.display = "block";
}

function closeModal() {
    document.getElementById("editModal").style.display = "none";
}

window.onclick = function(e) {
    const modal = document.getElementById("editModal");
    if (e.target == modal) closeModal();
}
