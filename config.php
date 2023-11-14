<?php

/** O nome do banco de dados*/
if ( !defined('DB_NAME') )
define("DB_NAME", "tcc");

/** Usuário do banco de dados MySQL */
if ( !defined('DB_USER') )
define("DB_USER", "root");

/** Senha do banco de dados MySQL */
if ( !defined('DB_PASSWORD') )
define("DB_PASSWORD", "");

/** nome do host do MySQL */
if ( !defined('DB_HOST') )
define("DB_HOST", "localhost");

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** caminho no server para o sistema **/
if ( !defined("BASEURL") )
	define("BASEURL","/Tcc/");
	
/** caminho do arquivo de banco de dados **/
if ( !defined("DBAPI") )
	define("DBAPI", ABSPATH ."inc/database.php");
	if ( !defined('HEADER_TEMPLATE') )
define("HEADER_TEMPLATE", ABSPATH . "inc/header.php");
if ( !defined('FOOTER_TEMPLATE') )
define("FOOTER_TEMPLATE", ABSPATH . "inc/footer.php");
if ( !defined('conexao') )
define("conexao", BASEURL . "conexao.php")
?>