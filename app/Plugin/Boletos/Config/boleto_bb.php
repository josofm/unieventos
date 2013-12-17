<?php

/* Informações da sua conta */
$config['Boleto']["agencia"] = "9999"; // Num da agencia, sem digito
$config['Boleto']["conta"] = "9999"; 	// Num da conta, sem digito

/* Dados do contrato com o Banco */
$config['Boleto']["convenio"] = "2222222";  // Num do convênio - REGRA: 6 ou 7 ou 8 dígitos
$config['Boleto']["contrato"] = "2222222"; // Num do seu contrato
$config['Boleto']["carteira"] = "18";
$config['Boleto']["variacao_carteira"] = "-019";  // Variação da Carteira, com traço (opcional)

/* Tipo do Boleto */
$config['Boleto']["formatacao_convenio"] = "7"; // REGRA: 8 p/ Convênio c/ 8 dígitos, 7 p/ Convênio c/ 7 dígitos, ou 6 se Convênio c/ 6 dígitos
$config['Boleto']["formatacao_nosso_numero"] = "2"; // REGRA: Usado apenas p/ Convênio c/ 6 dígitos: informe 1 se for NossoN�mero de at� 5 dígitos ou 2 para opção de até 17 dígitos

/* Seus Dados */
$config['Boleto']["identificacao"] = "UniEventos";
$config['Boleto']["cpf_cnpj"] = "00.000.000/0001-00";
$config['Boleto']["endereco"] = "Rua de teste, 666";
$config['Boleto']["cidade_uf"] = "Santa Maria / RS";
$config['Boleto']["cedente"] = "Unievents Ltda.";

/* Vence em quantos dias? */
$config['Boleto']['dias_vencimento'] = 5;

/* Taxa do boleto */
$config['Boleto']['taxa'] = 0;

/* Informações para o cliente*/
$config['Boleto']["demonstrativo1"] = "Pagamento dos produtos comprados no Unieventos<br />";
$config['Boleto']["demonstrativo2"] = "Taxa Bancaria R$2,50.<br />";
$config['Boleto']["demonstrativo3"] = "";

/* Instruções ao caixa*/
$config['Boleto']["instrucoes1"] = " Sr. Caixa,";
$config['Boleto']["instrucoes2"] = " Não receber após o vencimento.";
$config['Boleto']["instrucoes3"] = "";
$config['Boleto']["instrucoes4"] = "";

/* OPCIONAIS */
$config['Boleto']["quantidade"] = "";
$config['Boleto']["valor_unitario"] = "";

/* MOEDA */
$config['Boleto']["aceite"] = "N";
$config['Boleto']["especie"] = "R$";
$config['Boleto']["especie_doc"] = "DM";

?>