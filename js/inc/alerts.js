var funcaoJaChamada = localStorage.getItem('funcaoJaChamada');
function AlertaLog() {
  if (!funcaoJaChamada) {
    alert("Seja bem vindo ao DearPets " + nomeJS + "!");
        funcaoJaChamada = true; // Define a variável como true após a execução
        localStorage.setItem('funcaoJaChamada', funcaoJaChamada);
      }
}
function AlertaLogErro() {

    alert("Falha ao logar! Usuario ou senha incorretos");
}
function ZeraMessage() {
      localStorage.removeItem('funcaoJaChamada');
}