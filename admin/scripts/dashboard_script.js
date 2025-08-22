function openModal(id) {
    document.getElementById('deleteModal').style.display = 'flex';
    document.getElementById('deleteProjectId').value = id;
}

function closeModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

window.onclick = function(event) {
    let modal = document.getElementById('deleteModal');
    let addModal = document.getElementById('addModal');
    if (event.target === modal) {
        closeModal();
    }
    if (event.target === addModal) closeAddModal();
}

function openAddModal() {
    document.getElementById('addModal').style.display = 'flex';
}

function closeAddModal() {
    document.getElementById('addModal').style.display = 'none';
}

