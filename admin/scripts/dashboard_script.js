function openModal(id) {
    document.getElementById('deleteModal').style.display = 'flex';
    document.getElementById('deleteProjectId').value = id;
}

function closeModal() {
    document.getElementById('deleteModal').style.display = 'none';
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

function openAddSkillModal() {
    document.getElementById('addSkillModal').style.display = 'flex';
}

function closeAddSkillModal() {
    document.getElementById('addSkillModal').style.display = 'none';
}

function openUpdateSkillModal(id, category, name, icon_type, icon_value, percentage) {
    document.getElementById("updateSkillId").value = id;
    document.getElementById("updateSkillCategory").value = category;
    document.getElementById("updateSkillName").value = name;
    document.getElementById("updateSkillType").value = icon_type;
    document.getElementById("updateSkillIconValue").value = icon_value;
    document.getElementById("updateSkillPercentage").value = percentage;

    document.getElementById("updateSkillModal").style.display = "flex";
}


function closeUpdateSkillModal() {
    document.getElementById("updateSkillModal").style.display = "none";
}

function openDeleteSkillModal(id) {
    document.getElementById('deleteSkillModal').style.display = 'flex';
    document.getElementById('deleteSkillId').value = id;
}

function closeDeleteSkillModal() {
    document.getElementById('deleteSkillModal').style.display = 'none';
}

window.onclick = function(event) {
    let modals = [
        'deleteModal', 'addModal',
        'updateModal', 'addSkillModal',
        'updateSkillModal', 'deleteSkillModal'
    ];

    modals.forEach(function(modalId) {
        let modal = document.getElementById(modalId);
        if (event.target === modal) modal.style.display = 'none';
    });
};