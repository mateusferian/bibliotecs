var filtroSelect = document.getElementById("filtro");

// Adicione um ouvinte de evento para salvar a seleção no armazenamento local quando a seleção for alterada
filtroSelect.addEventListener("change", function() {
    localStorage.setItem("filtroSelecionado", filtroSelect.value);
});

// Verifique se há uma seleção armazenada localmente e defina-a como a opção selecionada
var filtroSelecionado = localStorage.getItem("filtroSelecionado");
if (filtroSelecionado) {
    filtroSelect.value = filtroSelecionado;
}