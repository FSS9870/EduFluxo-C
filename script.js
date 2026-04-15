const senhasValidas = {
    'professor': '123',
    'portaria': '456'
};

function Selecionar_cargo(cargo) {
    document.getElementById('cadastro').style.display = 'block';
    
    document.getElementById('cargo').value = cargo;
    
    document.querySelector("cadastro").innerText = "Cadastro de " + cargo;
}