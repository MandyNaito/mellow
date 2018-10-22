# Mellow Suíte  (c) MellowTeam - README

### Instalação

Para fazer com que o sistema funcione, é necessário ao menos dois programas para instalar-lo; o Wampserver 3.0 e o MySQL Workbench. 	Através do menu de contexto do Wampserver, iniciar todos os serviços.
	
Feito isso, descompactar os arquivos de instalação no diretório www, o qual pode ser acessado também via menu de contexto do programa. Na pasta “mellow” descompactada, acessar a subpasta “assets” e por fim a subpasta “bd”. Nesta pasta “bd”, abrir o arquivo modelo “bd.mwb”.

Com modelo aberto no MySQL Workbench, acessar o menu “Database” e acionar o botão “Forward Engineer..”, ou através da hotkey  “Ctrl+G” do software.

Na tela de configuração, selecionar os dados da conexão local e prosseguir com o wizard até o final. Feito isso, o banco de dados local já estará apto a ser utilizado.

Após a instalação do banco de dados, acessar o caminho “<diretório wamp> www\mellow\application\admin\config” e abrir o arquivo “database.php”. Ao final do arquivo, alterar as configurações do hostname, username e password para as configurações do servidor MySQL local.

Ao final desta etapa, o sistema já reconhecerá o banco de dados importado e permitirá sua utilização.
Por padrão, foram disponibilizados alguns usuários para acesso, conforme descrito abaixo:

	Login			Senha	Perfil		Estabelecimento
	ana.abbott		111111	Gerente		Caldeirão Furado
	neville.longbottom	111111	Funcionário	Caldeirão Furado
	madame.rosmerta		111111	Gerente		Três vassouras
	catia.bell		111111	Funcionário	Três vassouras
	marcelo.benigno		111111	Administrador
