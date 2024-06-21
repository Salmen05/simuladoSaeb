function login() {
    const logEmail = document.querySelector("#logEmail").value;
    const logSenha = document.querySelector("#logSenha").value;
    const logForm = document.querySelector("#logForm");
    const logAlert = document.querySelector("#logAlert");
    const logBtn = document.querySelector("#logBtn");
    if (logEmail.length == 0) {
        logAlert.style.display = 'block';
        logAlert.innerHTML = 'Campo de email vazio!';
    } else if (logSenha.length == 0) {
        logAlert.style.display = 'block';
        logAlert.innerHTML = 'Campo de senha vazio!';
    } else {
        logBtn.disabled = true;
        logAlert.style.display = 'none';
        const url = './auth.php';
        const formData = new FormData(logForm);
        fetch(url, {
            headers: {
                'Accept': 'application/json'
            },
            body: formData,
            method: 'POST'
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: "Sucesso!",
                        text: "Logado com sucesso.",
                        icon: "success",
                    });
                    setTimeout(function () {
                        window.location.href = "./dashboard.php";
                    }, 2000)
                } else if (data.errorType == 'email') {
                    Swal.fire({
                        title: "Oops!",
                        text: "Email não encontrado em nosso banco.",
                        icon: "error",
                    });
                    logBtn.disabled = false
                } else {
                    Swal.fire({
                        title: "Oops!",
                        text: "A senha não confere com a deste professor!",
                        icon: "error",
                    });
                    logBtn.disabled = false
                }
            })
    }
}
function addTurma(idprofessor) {
    const modalAddTurma = new bootstrap.Modal(document.querySelector("#modalAddTurma"));
    const btnAddTurma = document.querySelector("#btnAddTurma");
    modalAddTurma.show();
    btnAddTurma.addEventListener("click", function () {
        const regNomeTurma = document.querySelector("#regNomeTurma").value;
        const alertAddTurma = document.querySelector("#alertAddTurma");
        const formAddTurma = document.querySelector("#formAddTurma");
        if (regNomeTurma.length < 4) {
            alertAddTurma.style.display = 'block';
            alertAddTurma.innerHTML = "O nome deve conter no mínimo 4 caracteres!"
        } else {
            alertAddTurma.style.display = 'none';
            btnAddTurma.disabled = true;
            const url = "./insert.php"
            const formData = new FormData(formAddTurma);
            formData.append("idprofessor", idprofessor)
            fetch(url, {
                headers: {
                    'Accept': 'application/json'
                },
                bodu: formData,
                method: 'POST'
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
        }
    })

}
function loadContent(page) {
    const url = "./control.php";
    const formData = new FormData();
    formData.append("page", page);
    fetch(url, {
        headers: {
            'Accept': 'application/json'
        },
        body: formData,
        method: 'POST'
    })
        .then(response => response.text())
        .then(data => { document.querySelector("#conteudo").innerHTML = data })
}
window.onload = function () {
    loadContent('turma')
}