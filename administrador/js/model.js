function openDescriptionModal(element) {
    const descricao = element.getAttribute("data-description");
    const modalContainer = document.querySelector(".modal-container");
    const modalContent = document.querySelector(".modal-content");
    const modalDialog = document.querySelector(".modal-dialog");
  
    // Obtém a largura atual do modal
    const larguraModal = modalDialog.clientWidth;
  
    // Calcula o número máximo de caracteres por linha com base na largura do modal
    let caracteresPorLinha = 30; // Valor padrão para celular
  
    if (larguraModal >= 768) { // Define um valor maior para telas maiores (PC)
      caracteresPorLinha = 60; // Ajuste conforme necessário
    }
  
    // Divide o texto em linhas com base no número de caracteres por linha
    const linhas = [];
    let linhaAtual = "";
  
    for (let i = 0; i < descricao.length; i++) {
      linhaAtual += descricao[i];
  
      if (linhaAtual.length >= caracteresPorLinha || descricao[i] === '\n') {
        linhas.push(linhaAtual);
        linhaAtual = "";
      }
    }
  
    if (linhaAtual.length > 0) {
      linhas.push(linhaAtual);
    }
  
    // Constrói o HTML das linhas quebradas preservando as tags HTML
    const htmlLinhas = linhas.map(line => `${line}<br>`).join("");
  
    modalContent.innerHTML = htmlLinhas;
    modalContainer.style.display = "flex";
  
    // Adiciona um ouvinte de evento de clique para fechar o modal quando clicar novamente
    modalContainer.addEventListener("click", function () {
      modalContainer.style.display = "none";
    });
  }
  
  
  