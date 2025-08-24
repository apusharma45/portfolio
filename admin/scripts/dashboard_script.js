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

function openUpdateModal(id, title, description, image, link, tech_stack, project_type) {
    document.getElementById("updateId").value = id;
    document.getElementById("updateTitle").value = title;
    document.getElementById("updateDescription").value = description;
    document.getElementById("updateImage").value = image;
    document.getElementById("updateLink").value = link;
    document.getElementById("updateTechStack").value = tech_stack;
    document.getElementById("updateProjectType").value = project_type;

    document.getElementById("updateModal").style.display = "flex";
}

function closeUpdateModal() {
    document.getElementById("updateModal").style.display = "none";
}


