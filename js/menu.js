const iconeFechar = document.querySelector(".icone-fechar");
const iconeMenu = document.querySelector(".icone-menu");
const menu = document.querySelector(".navegacao-menu");
const itensMenu = document.querySelectorAll(".link-nav");

function abrirEFecharMenu() {
  menu.classList.toggle("mostrar-menu");
}

iconeMenu.addEventListener("click", abrirEFecharMenu);
iconeFechar.addEventListener("click", abrirEFecharMenu);

itensMenu.forEach((item) => {
  const proximoItem = item.nextElementSibling;

  item.addEventListener("click", (event)=>{
    event.preventDefault()
    item.classList.toggle('girar-seta')
    item.nextElementSibling.classList.toggle('aberto')
  })

  if (proximoItem) {
    item.classList.toggle("seta-icone");
  }
})
