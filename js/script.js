function registrar() {
  const regNome = document.querySelector("#regNome").value;
  const regEmail = document.querySelector("#regEmail").value;
  const regSenha = document.querySelector("#regSenha").value;
  const regAlert = document.querySelector("#regAlert");
  if (regNome.length < 6) {
    regAlert.style.display = "block";
    regAlert.innerHTML = "O nome deve conter no mínimo 3 caracteres!";
  } else if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(regEmail)) {
    regAlert.style.display = "block";
    regAlert.innerHTML = "Insira um email válido!";
  } else if (regSenha < 0) {
    regAlert.style.display = "block";
    regAlert.innerHTML = "A senha deve conter no mínimo 6 caracteres!";
  } else {
    regAlert.style.display = "none";
    const formReg = document.querySelector("#formReg");
    const formData = new FormData(formReg);
    const url = "./insert.php";
    fetch(url, {
      headers: {
        Accept: "application/json",
      },
      body: formData,
      method: "POST",
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
      });
  }
}
