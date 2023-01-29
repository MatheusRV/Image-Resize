-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 27-Jan-2023 às 15:15
-- Versão do servidor: 5.5.68-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `canal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(10) UNSIGNED NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titulo` varchar(240) NOT NULL DEFAULT '',
  `resumo` varchar(240) NOT NULL DEFAULT '',
  `tema` varchar(240) NOT NULL DEFAULT '',
  `abrangencia` varchar(240) NOT NULL,
  `especial` varchar(240) NOT NULL,
  `agencia` varchar(240) NOT NULL,
  `blog` varchar(240) NOT NULL,
  `icone` varchar(240) NOT NULL DEFAULT '',
  `autor` varchar(240) NOT NULL DEFAULT '',
  `texto` text NOT NULL,
  `imagem` varchar(240) NOT NULL DEFAULT '',
  `imagem_exibicao` varchar(240) NOT NULL,
  `imagem_autor` varchar(240) NOT NULL,
  `atualizacao` varchar(240) NOT NULL,
  `cont` bigint(20) NOT NULL DEFAULT '0',
  `galeria` varchar(240) DEFAULT NULL,
  `video` varchar(240) NOT NULL,
  `video_youtube` varchar(240) NOT NULL,
  `agenda` date NOT NULL,
  `frase_texto` text NOT NULL,
  `frase_autor` varchar(240) NOT NULL,
  `id_usuario` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `pdate`, `titulo`, `resumo`, `tema`, `abrangencia`, `especial`, `agencia`, `blog`, `icone`, `autor`, `texto`, `imagem`, `imagem_exibicao`, `imagem_autor`, `atualizacao`, `cont`, `galeria`, `video`, `video_youtube`, `agenda`, `frase_texto`, `frase_autor`, `id_usuario`) VALUES
(16, '2006-08-12 09:57:47', 'Equipe da pastoral ministra aula da cozinha enriquecida', '', 'Cotidiano', 'icara', '', '', '', '<IMG hspace=0 src=\'http://www.canalicara.com/img/foto.gif\'  align=center border=0>', 'Prefeitura de Içara', 'O aproveitamento de sementes, fibras, talos e folhas foi tema de uma aula ministrada pela Pastoral da Criança, no balneário Rincão. A pedido da Associação Feminina de Assistência Social de Içara (AFASI) as voluntárias da equipe ensinaram dezenas de mulheres a fazer reaproveitamento de alimentos. Com isso, elas conseguirão fortalecer as crianças que não comem verduras e legumes.\r\n\r\nConforme a coordenadora paroquial da Pastoral Anair dos Santos Calegari, verduras e legumes podem ser ingeridos pelas crianças em forma de suco, e terão as vitaminas inclusas nas misturas. No cardápio apresentado tem farofa de talos, salada multimistura, suco de limão, de couve verde, bolinho de aipim, pudim alemão entre outras coisas. “A intenção é ensinar pessoas carentes, gestantes, e assim levar saúde para a casa das crianças.\r\n\r\nTudo é feito com o reaproveitamento das coisas”, declara Anair. A equipe da Pastoral é formada por 85 pessoas voluntárias, entre elas, homens e mulheres que buscam ajudar as pessoas carentes dos bairros de Içara.', 'http://www.canalicara.com/upload/noticias/photo001.jpg', 'SIM', '', '', 1031, NULL, '', '', '0000-00-00', '', '', 1),
(17, '2006-08-12 09:59:43', 'Informática chega a mais alunos do município', '', 'Cotidiano', 'icara', '', '', '', '', 'Prefeitura de Içara', 'O Projeto Aprendendo com a Informática da Secretaria de Educação de Içara entregou ontem mais um laboratório aos alunos do município. A Escola Municipal de Ensino Fundamental Tranqüilo Pissetti foi a contemplada. A secretária Terezinha Casagrande Valvassori realizou a entrega de 15 micros computadores, todos devidamente instalados em rede, em uma sala ampla com imobiliário completo.\r\n\r\nEla garante que, em breve será a vez da escola Maria Arlete Lodetti, que também vai contar com um laboratório semelhante, e proporcionar melhor aprendizado aos alunos. Para a secretária, com os laboratórios será possível inovar a prática pedagógica e consequentemente, oferecer ao educando o conhecimento e manuseio adequado do computador e programas selecionados. “Queremos atender 100% dos alunos de cada uma das nossas escolas, e com o aumento do conhecimento de cada um reduzir o índice de reprovação escolar”, destaca.\r\n\r\nA primeira escola beneficiada do município foi a Lucia De Lucca, no bairro Jardim Silvana. E no bairro Primeiro de Maio e Escola Ângelo Zanellato também receberá um laboratório junto da inauguração da ampliação e reforma.', '<IMG hspace=0 src=\'http:/<IMG hspace=0 src=\'http://www.canalicara.com/img/px.gif\' align=center border=0>', 'SIM', '', '', 1555, NULL, '', '', '0000-00-00', '', '', 1),
(18, '2006-08-12 10:33:04', 'Festa do Fogo é adiada', '', 'Cotidiano', 'icara', '', '', '', '', 'Lucas Lemos Serafim', 'Para garantir público, a 4ª Festa do Fogo, tradicional festa de setembro, foi tranferida de data mais uma vez.\r\n\r\nA data prevista era dia 16 de setembro, na qual acontecerá o baile de Debutantes 2006 da Sociedade Recreativa Ipiranga, de Içara.\r\n\r\nMaiores informações a qualquer momento.', '<IMG hspace=0 src=\'http:/<IMG hspace=0 src=\'http://www.canalicara.com/img/px.gif\' align=center border=0>', 'SIM', '', '', 1156, NULL, '', '', '0000-00-00', '', '', 1),
(19, '2006-08-12 10:42:02', 'Escola Salete Scotti homenageia alunos', '', 'Cotidiano', 'icara', '', '', '', '<IMG hspace=0 src=\'http://www.canalicara.com/img/foto.gif\'  align=center border=0>', 'Lucas Lemos Serafim', 'Acontece hoje, dia 8 de agosto, nas dependências da Escola de Educação Básica Professora Salete Scotti dos Santos, a escolha da Garota e do Garoto Salete Scotti.\r\n\r\nA iniciativa é uma homenagem ao dia dos estudantes - 11 de agosto - e marca o início das festividades em comemoração dos 60 anos da entidade.', 'http://www.canalicara.com/upload/noticias/photo002.jpg', 'SIM', '', '', 1599, NULL, '', '', '0000-00-00', '', '', 1),
(20, '2006-08-12 17:17:32', 'Obras do Acesso Sul estão sendo finalizadas', '', 'Segurança', 'icara', '', '', '', '<IMG hspace=0 src=\'http://www.canalicara.com/img/foto.gif\'  align=center border=0>', 'Eliane Gonçalves - SDR Criciúma', 'O secretário de Estado do Desenvolvimento Regional de Criciúma, Gentil da Luz esteve nesta manhã de terça-feira (01/08), acompanhando o término das obras do Acesso Sul. Os 8 km de asfalto que liga a BR-101 ao Sul do Balneário Rincão estão concluídos. Esta semana a sinalização asfaltica também fica pronta.\r\n\r\nO Governador do Estado de Santa Catarina, Eduardo Pinho Moreira, estará na região de Criciúma na próxima segunda-feira (07/08), e na ocasião fará uma visita ao Acesso Sul do Balneário Rincão que já estará pronto. A obra é no valor de R$ 4 milhões.\r\n\r\nO acesso sul é uma alternativa de acesso às praias da região, e segundo o secretário regional, Gentil Dory da Luz, que acompanhou a obra passo a passo, isso vai resolver o problema do trânsito principalmente na temporada de verão. “O acesso vai facilitar o deslocamento melhorando a qualidade de vida dos moradores dos bairros Poço Oito, Rio dos Anjos e Boa Vista, localidades cortadas pela rodovia”, enfatiza Da Luz. Ele ainda complementa, “a obra também vai contribuir para o desenvolvimento da região que tem um grande potencial turístico e econômico”, finaliza o secretário.', 'http://www.canalicara.com/upload/noticias/photo003.jpg', 'SIM', '', '', 848, NULL, '', '', '0000-00-00', '', '', 1),
(22, '2006-08-12 20:00:48', 'Farmácia Solidária lança campanha', '', 'Cotidiano', 'icara', '', '', '', '<IMG hspace=0 src=\'http://www.canalicara.com/img/foto.gif\'  align=center border=0>', 'Prefeitura de Içara', 'Medicamentos que não servem mais para você podem servir para outra pessoa. E neste sábado é dia de colaborar com o próximo na campanha de arrecadação de medicamentos da Farmácia Solidária de Içara, a partir das 9 horas, na Praça da Igreja Matriz São Donato.\r\n\r\nA instituição inaugurada no dia 28 atende todas as segundas e sextas, na sede localizada na rua Donato Valvassori, próximo a rodoviária. Em apenas três dias de funcionamento, mais de setenta pessoas já fizeram cadastros para atendimento. Destas, trinta pessoas levaram parte dos medicamentos receitados pelo médico sem nenhum custo para casa, e somente cinco não conseguiram levar nenhum remédio da receita.\r\n\r\nDurante a campanha de arrecadação, mais de 15 quilos de remédios com validade vencida foram tirados de circulação no município. Medicamentos controlados, de auto-custo e dos mais diversos tipos são procurados. A presidente da União das Associações dos Conselhos Locais de Saúde Jane Regina da Silva Luiz afirma estar muito feliz com o sucesso da farmácia. Ela destaca que as pessoas saem do local satisfeitas com o que conseguem levar para casa. \"Quando não conseguem todos os remédios, pelo menos economizam na compra de alguns\", disse Jane.', 'http://www.canalicara.com/upload/noticias/photo004.jpg', 'SIM', '', '', 2954, NULL, '', '', '0000-00-00', '', '', 1),
(23, '2006-08-12 20:29:07', 'Estação rodoviária de Içara inaugura serviço de som', '', 'Cotidiano', 'icara', '', '', '', '<IMG hspace=0 src=\'http://www.canalicara.com/img/foto.gif\'  align=center border=0>', 'Prefeitura de Içara', 'O terminal rodoviário de Içara ganhou na manhã desta sexta-fira uma novidade. A comunidade que freqüenta o local terá a partir de hoje serviço de som, para receber as informações dos itinerários e horários dos ônibus que circulam pelo local.\r\n\r\nA reivindicação antiga da comunidade foi atendida e vai contar com horário, previsão do tempo, e até propagandas serão feitas nos intervalos de uma boa música. Participaram do ato de entrega do serviço à comunidade o prefeito Heitor Valvassori, os Secretários Dalvânia Cardoso, de Administração, e Arnaldo Lodetti Júnior, de Obras e Serviços Urbanos.\r\n\r\nAlém deles os vereadores Joaci Pereira, o Boca, Murialdo Gastaldon e Agenor Brunel estiveram presentes juntamente com empresários e comunidade.\r\n\r\nA responsabilidade do serviço de som ficará a cargo de Ademir Maffe, com funcionamento de 2ª a 6ª, das 7h30min às 18 horas. O corte da fita foi efetuado pelo prefeito municipal Heitor Valvassori e o representante do Expresso Coletivo Içarense Elvis Joarez Peruchi.', 'http://www.canalicara.com/upload/noticias/photo005.jpg', 'SIM', '', '', 1411, NULL, '', '', '0000-00-00', '', '', 1),
(24, '2006-08-14 19:30:35', 'Procura-se cãozinho!', '', 'Cotidiano', 'icara', '', '', '', '', '', 'Desde o último domingo, dia 13 de agosto de 2006, a proprietária, Anamélia Fontana Valentim está a procura de sua cadela, uma American St Terrier, que atende por Estrela.\r\n\r\nQuem encontrar o animal de estimação ou tiver informações, entre en comtato pelos telefones 3432-5426 / 9917-4683 / 9988-3991. A recompeça é de 200 reais.\r\n', '<IMG hspace=0 src=\'http:/<IMG hspace=0 src=\'http://www.canalicara.com/img/px.gif\' align=center border=0>', 'SIM', '', '', 967, NULL, '', '', '0000-00-00', '', '', 1),
(25, '2006-08-14 21:23:05', 'Sucesso na primeira edição do Xadrez na Praça', '', 'Esportes', 'icara', '', '', '', '<IMG hspace=0 src=\'http://www.canalicara.com/img/foto.gif\'  align=center border=0>', 'Prefeitura de Içara', 'Sucesso de público e empolgação dos participantes define a primeira edição do campeonato de xadrez na Praça. Pais e filhos passaram o dia juntos fazendo uma verdadeira festa. O vencedor de da categoria A foi Marcelo Esbegen Marcos, aluno da Escola Municipal de Ensino Fundamental Theóphilo Silveira. Alexandre Mendes Batista da Escola Professora Mirian Pavei foi o segundo e a terceira colocação ficou com Vinicius Borges Todeschini, da Escola Lúcia De Lucca. Todos são estudantes do ensino fundamental de 1ª a 4ª série.\r\n\r\nNa categoria B, de 5ª a 8ª série, Vitor Da Ré foi o vencedor. Ele representa os alunos da Escola Estadual Professora Salete Scott dos Santos. O segundo lugar ficou com Vanderlei de Souza, da Escola Maria da Glória e Silva, e o terceiro foi José Felipe, do Quintino Rizzieri. De acordo com a coordenadora professora Rosimari Rech cerca de 70 crianças participaram. Porém, os adultos que não podiam competir, não deixaram de brincar um pouco no evento. Segundo ela, a Secretaria de Educação e Cultura do município ficou muito satisfeita com o evento e deve fazer outras edições em breve.', 'http://www.canalicara.com/upload/noticias/photo006.jpg', 'SIM', '', '', 998, NULL, '', '', '0000-00-00', '', '', 1),
(26, '2006-08-14 21:32:20', 'Farmácia Solidária já atende famílias carentes', '', 'Cotidiano', 'icara', '', '', '', '<IMG hspace=0 src=\'http://www.canalicara.com/img/foto.gif\'  align=center border=0>', 'Prefeitura de Içara', 'As cidades de Içara e Criciúma já contam com suas farmácias solidárias e contabilizam as primeiras famílias carentes que estão recebendo ajuda. Unidades e postos de saúde dos dois municípios, Delegacia da Mulher, Delegacia Regional de Polícia e biblioteca da Unesc são pontos de arrecadação.\r\n\r\nFaça a sua parte. Doar ainda é o melhor remédio. Para receber medicamentos em Içara é necessário que se faça um cadastro, com comprovante de renda e carteira de identidade na sede da Associação dos Conselhos Locais de Saúde, localizada em anexo ao Terminal Rodoviário de Içara. “Todas as pessoas carentes que procurarem a farmácia vão levar para casa os medicamentos que tivermos, por isso precisamos de muita doação para que ninguém deixe de ser atendido”, explica a presidente da União dos Conselhos Locais de Saúde Jane Regina Luiz da Silva.', 'http://www.canalicara.com/upload/noticias/photo007.jpg', 'SIM', '', '', 1825, NULL, '', '', '0000-00-00', '', '', 1)

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pdate` (`pdate`),
  ADD KEY `index_tema` (`tema`(10)),
  ADD KEY `index_especial` (`especial`(20)),
  ADD KEY `index_agencia` (`agencia`(20)),
  ADD KEY `index_abrangencia` (`abrangencia`),
  ADD KEY `index_agenda` (`agenda`),
  ADD KEY `autor` (`autor`),
  ADD KEY `id_usuario` (`id_usuario`);
ALTER TABLE `noticias` ADD FULLTEXT KEY `index_fulltext` (`titulo`,`texto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51819;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
