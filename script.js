const senhasValidas = {
    'professor': '123',
    'portaria': '456',
    'diretor': 'MANS'
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

function Login() {
    document.getElementById('login').style.display = 'block';
    document.getElementById('cadastro').style.display = 'none';
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

function Mostrar_registros(cargo) {

    document.getElementById('lista_registros').style.display = 'block';
    fetch('mostrar.php?tipo=' + cargo)
        .then(response => response.json())
        .then(data => {
            if (data.length === 0) {
                alert('Nenhum registro encontrado para ' + cargo);
                return;
            }

            let textos = `<h3>Registros de ${cargo === 'professor' ? 'Ocorrências' : 'Fluxo de Saída'}</h3>`;
            textos += '<table border="1" style="width:100%; border-collapse: collapse;">';
            textos += '<tr><th>Aluno</th><th>Autor</th><th>Motivo</th><th>Data/Hora</th></tr>';

            data.forEach(registro => {
                textos += `
                    <tr>
                        <td>${registro.ID_aluno}</td>
                        <td>${registro.ID_usuario}</td>
                        <td>${registro.motivo}</td>
                        <td>${registro.horario}</td>
                    </tr>`;
            });

            textos += '</table>';

            document.getElementById('lista_registros').innerHTML = textos; 
        })
        .catch(error => {
            alert('Erro ao carregar os dados.');
        });
}
