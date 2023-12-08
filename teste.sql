select case
	when weekday(now()) = 0 then 'Segunda-Feira'
	when weekday(now()) = 1 then 'Terça-Feira'
	when weekday(now()) = 2 then 'Quarte-Feira'
	when weekday(now()) = 3 then 'Quinta-Feira'
	when weekday(now()) = 4 then 'Sexta-Feira'
	when weekday(now()) = 5 then 'Sábado'
	when weekday(now()) = 6 then 'Domingo' end as valores


select case
	when weekday(data) = 0 then 'Segunda-Feira'
	when weekday(data) = 1 then 'Terça-Feira'
	when weekday(data) = 2 then 'Quarte-Feira'
	when weekday(data) = 3 then 'Quinta-Feira'
	when weekday(data) = 4 then 'Sexta-Feira'
	when weekday(data) = 5 then 'Sábado'
	when weekday(data) = 6 then 'Domingo' end as valores

	use `sistemaocorrenciaadvertencia`;

select count(*) as quantidade, case
	when weekday(data) = 0 then 'Segunda-Feira'
	when weekday(data) = 1 then 'Terça-Feira'
	when weekday(data) = 2 then 'Quarta-Feira'
	when weekday(data) = 3 then 'Quinta-Feira'
	when weekday(data) = 4 then 'Sexta-Feira'
	when weekday(data) = 5 then 'Sábado'
	when weekday(data) = 6 then 'Domingo' end as valores from tb_ocorencia group by valores

	use `sistemaocorrenciaadvertencia`;

select count(*) as quantidade, case
	when weekday(data) = 0 then 'Segunda-Feira'
	when weekday(data) = 1 then 'Terça-Feira'
	when weekday(data) = 2 then 'Quarta-Feira'
	when weekday(data) = 3 then 'Quinta-Feira'
	when weekday(data) = 4 then 'Sexta-Feira'
	when weekday(data) = 5 then 'Sábado'
	when weekday(data) = 6 then 'Domingo' end as valores from tb_ocorencia group by valores;


	select count(*) as quantidade, month(data) as valores, case
	when month(data) = 0 then 'Janeiro'
	when month(data) = 1 then 'Fevereiro'
	when month(data) = 2 then 'Março'
	when month(data) = 3 then 'Abril'
	when month(data) = 4 then 'Maio'
	when month(data) = 5 then 'Junho'
	when month(data) = 6 then 'Julho'
    when month(data) = 7 then 'Agosto' 
    when month(data) = 8 then 'Setembro' 
    when month(data) = 9 then 'Outubro' 
    when month(data) = 10 then 'Novembro' 
    when month(data) = 11 then 'Dezembro' end as meses from tb_ocorencia group by valores order by valores;

	insert into tb_meses (nome) values ('Jan'), ('Fev'), ('Mar'), ('Abr'), ('Mai'), ('Jun'), ('Jul'), ('Ago'), ('Set'), ('Out'), ('Nov'), ('Dez');