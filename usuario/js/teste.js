$(function () {
  var menu_width = 290; // Largura do menu
  var menu = $(".menu"); // Seleciona o elemento HTML com a classe "menu"
  var menu_open = $(".menu-open"); // Seleciona o elemento HTML com a classe "menu-open" (ícone de hambúrguer)
  var menu_close = $(".menu-close"); // Seleciona o elemento HTML com a classe "menu-close" (ícone de fechar)
  var overlay = $(".overlay"); // Seleciona o elemento HTML com a classe "overlay" (fundo escuro)

  // Quando o ícone de hambúrguer é clicado
  menu_open.click(function (e) {
    e.preventDefault(); // Impede o comportamento padrão do link

    // Abre o menu deslizante
    menu.css({"left": "0px"}); // Define o valor da propriedade "left" para "0px"
    overlay.css({"opacity": "1", "width": "100%"}); // Exibe o fundo escuro com opacidade e largura total
  });
  
  // Quando o ícone de fechar é clicado
  menu_close.click(function (e) {
    e.preventDefault(); // Impede o comportamento padrão do link

    // Fecha o menu deslizante
    menu.css({"left": "-" + menu_width + "px"}); // Move o menu para fora da tela, à esquerda
    overlay.css({"opacity": "0", "width": "0"}); // Esconde o fundo escuro
  });
});
