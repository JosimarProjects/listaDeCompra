# listaDeCompra
Lista de compras criada para facilitar um problema pessoal em supermecado e evitar o trabalho repetitivo de sempre escrever uma lista nova em papel.

Foi criada com PHP no back-end e javascript no front-end e no banco de dados esta sendo feito utilizando o mySQL, para lógica criada no backend utilizamos o modo get para definir as actions.


https://sualistadecompras.tk/


Criar banco de dados com a seguinte query 

create table tb_lista(
	id int not null primary key auto_increment,
    item varchar(25) not null,
    atual int not null,
    ideal int not null,
categoria varchar(25) not null,
pendente int not null
    
)