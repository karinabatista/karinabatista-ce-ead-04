<?php
  /* Este arquivo cont�m vari�veis globais, utilizadas
     em todo o site para defini��es de configura��es.
  */
  $mostrarBordas = FALSE;
  $tituloPagina  = '';
  $cssLocal      = '';
  
  function mostrarBordas() {
    global $mostrarBordas;
    echo $mostrarBordas 
         ? "border : 1px solid red;"
         : "border : none;";
  }
?>