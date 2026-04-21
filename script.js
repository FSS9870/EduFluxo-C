const senhasValidas = {
    'professor': '123',
    'portaria': '456'
};

function Selecionar_cargo(cargo) {
    document.getElementById('cadastro').style.display = 'block';  
    document.getElementById('cargo').value = cargo;
    document.querySelector("#cadastro h2").innerText = "Cadastro de " + cargo;
}

function Verificar_permissoes(cargo) {
    if (cargo == 'professor') {
        document.getElementById("ocorrencias").style.display = "block";
        document.getElementById("fluxo_saida").style.display = "none";
    } else if (cargo == 'portaria') {
        document.getElementById("fluxo_saida").style.display = "block";
        document.getElementById("ocorrencias").style.display = "none";
    }
}

function Selecionar_registro(cargo) {
    document.getElementById('registro').style.display = "block";
    document.getElementById('tipo_registro').value = cargo;

    if (cargo == 'professor') {
        document.querySelector("#registro h2").innerText = "Registrar ocorrência";
    } else if (cargo == 'portaria') {
        document.querySelector("#registro h2").innerText = "Registrar saída";
    }
}