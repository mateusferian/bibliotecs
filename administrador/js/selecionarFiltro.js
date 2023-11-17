document.addEventListener("DOMContentLoaded", function () {
    // Verifica se é uma nova sessão
    var newSession = localStorage.getItem("newSession");

    if (!newSession) {
        // Recupera a opção selecionada do localStorage
        var selectedOption = localStorage.getItem("selectedOption");

        // Define a opção selecionada no select
        if (selectedOption) {
            document.getElementById("filtro").value = selectedOption;
        } else {
            // Se não houver uma opção previamente selecionada, seleciona "sem filtro"
            document.getElementById("filtro").value = "semFiltro";
        }
    } else {
        // Reinicia a sessão apenas se o filtro não estiver vazio
        var selectedOption = document.getElementById("filtro").value;
        if (selectedOption) {
            localStorage.removeItem("selectedOption");
            localStorage.removeItem("newSession");
        }
    }

    // Adiciona um evento para salvar a opção selecionada quando o valor do filtro é alterado
    document.getElementById("filtro").addEventListener("change", function () {
        saveSelectedOption();
    });
});

function saveSelectedOption() {
    // Salva a opção selecionada no localStorage
    var selectedOption = document.getElementById("filtro").value;
    localStorage.setItem("selectedOption", selectedOption);
    return true; // Permite o envio do formulário
}
