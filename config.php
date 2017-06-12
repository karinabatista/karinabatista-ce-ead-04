<?php
  /* Este arquivo contém variáveis globais, utilizadas
     em todo o site para definições de configurações.
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