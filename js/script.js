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
            formData.append("idprofessor", idprofessor);
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
                            title: "Turma adicionada com sucesso!",
                            text: "Você já pode verificar a turma na tabela.",
                            icon: "success",
                        });
                        modalAddTurma.hide();
                        loadContent('turma');
                    } else {
                        Swal.fire({
                            title: "Não foi possível adicionar a turma!",
                            text: "Foi encontrado um erro ao registrar a turma.",
                            icon: "error",
                        });
                        formAddTurma.reset();
                    };
                    console.log(data);
                })
        }
    })
}
function deletarTurma(idturma) {
    const url = "./rowCount.php";
    const formData = new FormData();
    formData.append("idturma", idturma);
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
                    title: "Oops!",
                    text: "Ainda existem atividades para a turma realizar.",
                    icon: "error",
                });
            } else {
                const modalDeleteTurma = new bootstrap.Modal(document.querySelector("#modalDeleteTurma"));
                const bodyModalDeleteTurma = document.querySelector("#bodyModalDeleteTurma");
                const modalDeleTurmaBtn = document.querySelector("#modalDeleTurmaBtn");
                modalDeleteTurma.show();
                bodyModalDeleteTurma.innerHTML = `Você tem certeza que deseja deletar a turma ${idturma}?`;
                modalDeleTurmaBtn.addEventListener("click", function () {
                    const url2 = './delete.php';
                    fetch(url2, {
                        headers: {
                            'Accept': 'application/json'
                        },
                        body: formData,
                        method: 'POST'
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                modalDeleteTurma.hide();
                                Swal.fire({
                                    title: "Sucesso!",
                                    text: "Turma deletada com sucesso.",
                                    icon: "success",
                                });
                                modalDeleteTurma.hide();
                                loadContent('turma');
                            } else {
                                Swal.fire({
                                    title: "Oops!",
                                    text: "Erro ao deletar turma.",
                                    icon: "error",
                                });
                                console.log(data);
                            }
                        })
                })
            }
        })
}
function visualizarTurma(idturma) {
    const formData = new FormData();
    formData.append("idturma", idturma);
    const url = "./atividade.php";
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
function addAtividade(idturma) {

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