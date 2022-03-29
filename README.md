<h2> TESTE TÉCNICO IRROBA E-COMMERCE </h2>

<h3> - Desenvolvimento de CRUD para médicos, pacientes e agendamentos</h3>
<h3> - Desenvolvimento API para listagem de consultas</h3>
<h3> - Laratrust utilizado para auxilio de autenticação e controle de usuários</h3>
<h3> - Utilizando Boostrap, HTML e CSS para o front-end</h3>

<h3> - Download XAMPP(PHP, Apache e MySQL): https://www.apachefriends.org/xampp-files/8.1.4/xampp-windows-x64-8.1.4-1-VS16-installer.exe</h3>
<h3> - Download Composer: https://getcomposer.org/Composer-Setup.exe</h3>
<h3> - Download Postman: https://dl.pstmn.io/download/latest/win64</h3>

<h2> Para testes</h2>

<h3> 1 - Em uma pasta detinada ao projeto, utilizando os comandos : </h3>
<p> - git init</p>
<p> - git clone https://github.com/Petrocini/agendamento-consultas.git</p>
<h3> 2 - Utilize o comando "composer install" na pasta do projeto clonado</h3>
<h3> 3 - Verifique se o arquivo ".env" foi gerado, caso não tenha sido, execute os seguintes passos: </h3>
<p> - Na pasta do projeto, execute "cp .env.example env" e "php artisan key:generate"</p>
<h3> 4 - Utilizando MYSQL faça: </h3>
<p> - Crie um banco de dados com o nome "agendamento_consultas"insira o nome de usuário</p>
<p> - Insira o nome de usuário e senha no arquivo .env, nos campos DB_USERNAME e DB_PASSWORD respectivamente</p>
<p> - Novamente no arquivo .env, nos campos DB_HOST e DB_PORT insira o HOST e a PORTA do seu MYSQL</p>
<h3> 5 - Novamente na pasta do projeto, utilize o comando "php artisan migrate" para a criação das tabelas no banco</h3>
<h3> 6 - Utilize o comando "php artisan db:seed" para inserir um usuário admin</h3>
<h3> 7 - Configure um servidor apache e insira o projeto dentro dele, ou utilize o comando "php artisan serve"</h3>
<h3> 8 - Entre no programa inserindo o usuário "admin" e senha "admin"</h3>
<h3> 9 - Para testar a API, utilize um API CLIENTE(recomenda-se Postman ou Insomnia) com a URL: *endereço do seu servidor*/api/consultas/*id do médico*</h3>
