-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 30-Jan-2023 às 16:55
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
-- Banco de dados: `canalicara_bdportal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias_blogs`
--

CREATE TABLE `noticias_blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titulo` varchar(240) NOT NULL DEFAULT '',
  `identificador` varchar(240) NOT NULL DEFAULT '',
  `autor` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticias_blogs`
--

INSERT INTO `noticias_blogs` (`id`, `pdate`, `titulo`, `identificador`, `autor`) VALUES
(1, '2014-08-17 17:17:35', 'Coisas de Mãe', 'coisas-de-mae', '<b>*Taise Forgiarini</b> é colaboradora do Canal Içara, tem formação em Comunicação Social com habilitação em Jornalismo desde 2007. Depois que virou mãe se tornou uma apaixonada pelo universo materno. Razões de sua inspiração, Júlia nasceu em 2007 e Lucas em 2012.'),
(2, '2014-08-17 19:16:11', 'Manifestar-te', 'manifestar-te', '<b>*João Gabriel da Rosa</b> é colaborador do Canal Içara, tem formação em licenciatura de Artes Visuais desde 2010 e milita como incentivador da arte'),
(3, '2014-08-18 11:34:28', 'Crônica Tricolor', 'cronica-tricolor', '<b>*Erik Borges Vieira</b> é jornalista e torcedor do Criciúma Esporte Clube'),
(4, '2014-08-19 20:32:05', 'Túnel do tempo', 'tunel-do-tempo', '<b>*Antônio Colossi</b> é jornalista formado pela Faculdade Satc em 2011. Desde 2003 teve passagens pelo  canalcriciuma.com, Band FM, TV Criciúma/Canal19, RCR TV e atualmente trabalha na Rádio Eldorado AM/FM.'),
(5, '2014-08-20 14:03:05', 'Amigo Bicho', 'amigo-bicho', '<b>*ONG Amigo Bicho</b> é uma entidade içarense, sem fins lucrativos, voltada a proteção de animais.'),
(6, '2014-08-21 11:25:54', 'Economia em debate', 'economia-em-debate', '<b>*Juliano Giassi Goulart</b> é economista e autor do livro Desenvolvimento Desigual em que trata dos incentivos fiscais em Santa Catarina'),
(7, '2014-08-23 13:22:02', 'Viajando na leitura', 'viajando-na-leitura', '<b>*Maristela Benedet</b> é colaboradora do Canal Içara, tem formação em Comunicação Social com habilitação em Jornalismo desde 1996, atua na área e nas horas de lazer dedica-se a leitura'),
(8, '2014-08-29 14:12:03', 'Coluna Mix', 'coluna-mix', '<b>*Taise Forgiarini</b> é formada em Comunicação Social com habilitação em Jornalismo (Unisul) desde 2007, possui MBA em Comunicação Empresarial (Unesc), atua como mestre de cerimônia e assessora de imprensa.'),
(9, '2014-10-18 17:14:16', 'do Internauta', 'do-internauta', 'Envie também o seu artigo para opiniao@canalicara.com. Para ter o texto publicado é necessário se identificar. A postagem não significa que o portal concorde com a opinião.'),
(10, '2014-10-18 17:37:51', 'Diário da Minha Copa do Mundo 2014', 'diario-da-minha-copa', '<b>*Carlos Rauen</b> é acadêmico de Jornalismo, repórter da TV Litoral Sul e um latente apaixonado por futebol. Nesta Copa do Mundo acompanha dois jogos e narra todas as percepções do Mundial no \"Diário da Minha Copa\".'),
(11, '2014-10-21 20:08:16', '#Partiu Balada', 'partiu-balada', '<b>Ramires Casagrande</b> é um baladeiro de plantão e atua na divulgação de festas de toda a região.'),
(12, '2014-11-04 15:02:05', 'Rota 66 ao lúpulo', 'rota-66-ao-lupulo', '<b>*Alessandro Mano Dal Ponte, Alex Ferreira Michels e Luciano Novak Inácio</b> são respectivamente publicitário, administrador e economista. Todos com o mesmo objetivo: conhecer a cultura americana com o pé na estrada.'),
(13, '2014-12-04 11:56:18', 'Miss Pink', 'miss-pink', '<b>*Larissa Matiola (Lari) e Melissa Carminati (Mel)</b> são jornalistas pós-graduadas em Moda, Gestão e Marketing, além de proprietárias da loja Miss Pink Store.'),
(14, '2014-12-16 12:46:15', 'Juliane Cardoso', 'juliane-cardoso', '<b>*Juliane Cardoso</b> é formada em Arquitetura, possui escritório em Içara e também o blog setorial <a class=links href=\"http://www.julianecardoso.com.br\">www.julianecardoso.com.br</a>'),
(15, '2015-01-12 02:28:54', 'Bubarim', 'bubarim', '<b>*Bubarim</b> é um canal no Youtube do acadêmico de Jornalismo Bruno Miranda. Confira mais em <a class=links href=\"https://www.youtube.com/bubarim\" target=_blank>www.youtube.com/bubarim</a>'),
(16, '2015-01-14 14:22:56', 'Direito e Justiça', 'direito-e-justica', '<b>*Diana Teixeira de Souza</b> é formada em Direito pela Unisul desde 2012.'),
(17, '2015-02-18 17:32:01', 'Empreender', 'empreender', '<b>*Vanessa Freitas</b> é formada em Administração pela Unisul desde 2011.'),
(18, '2015-04-01 18:07:41', 'Divã', 'diva', '<b>*Natalia Costa Lemos</b> é formada em Psicologia e especialista em Psicologia Hospitalar.'),
(19, '2015-09-20 15:15:41', 'Içara pela educação', 'icara-pela-educacao', 'Divulgue as atividades também de sua escola. Envie as ações pedagógicas para jornalismo@canalicara.com'),
(20, '2016-02-08 22:11:25', 'Na cozinha com almôndega', 'cozinha-com-almondega', 'Paulo Vitor Dal Pont reúne de forma divertida no Youtube um pouco de sua função como jornalista, empresário e chef, todo mês, com uma nova receita de comida e drinque.'),
(21, '2016-02-26 17:57:17', 'Beleza Feminina', 'beleza-feminina', '<b>Aline Leal</b> é maquiadora profissional e YouTuber <a class=links href=\"https://www.youtube.com/channel/UCiovmA_OY9SgMs3T1Gh6VKg\" target=_blank>(www.youtube.com)</a>'),
(22, '2016-04-29 00:21:56', 'Conecte-se', 'conecte-se', '<b>*Wallison Floriano</b> é graduado em Sistema de Informação e principal colaborador no programa de Experts em produtos Google.'),
(23, '2016-09-01 01:12:16', 'Opção Cultural', 'opcao-cultural', '<b>Colabore</b>: envie informações sobre sua festa para jornalismo@canalicara.com. Não esqueça de colocar dados sobre as atrações, data, horário, valores dos ingressos e locais de venda.'),
(24, '2016-10-18 13:15:44', 'Liderança Empreendedora', 'lideranca-empreendedora', '<b>André Casagrande Teixeira</b> é formado em Engenharia Civil pela Udesc, empreendedor e também instrutor do treinamento Master Mind.'),
(25, '2017-01-03 13:55:38', 'Web Divã', 'web-diva', '<b>*Thais Vilas Boas</b> é formada em Psicologia e coordenadora do Projeto Amadas.'),
(26, '2017-09-07 22:59:25', 'Futeblog', 'futeblog', '<b>Eduardo Oliveira</b> é acadêmico de Jornalismo, apaixonado por futebol e pela informação.'),
(27, '2017-10-04 19:22:31', 'Reblog', 'reblog', '<b>Renan Grassi</b> é acadêmico de Publicidade e produtor de vídeos no YouTube sobre histórias de vida, vlogs e devocionais cristãos.'),
(28, '2018-05-31 17:36:59', 'Jeison Cechella', 'jeison-cechella', 'Com uma câmera e sem pensar muito, gravo os vídeos, subo canal e compartilho minhas visões e experiências sobre nosso mundo.'),
(29, '2018-09-21 11:43:22', 'Simone Cândido', 'simone-candido', '<b>Simone Luiz Cândido</b> é voluntária na causa adoção de crianças e adolescentes; já participou de três antologias com suas crônicas, além disso, ama escrever reflexões sobre a vida cotidiana, eternidade, amor e convivência.'),
(30, '2018-10-09 13:07:27', 'Talisson Pereira', 'talisson-pereira', '<b>Talisson Pereira</b> é consultor de imagem e estilo.'),
(31, '2019-05-24 19:11:26', 'Francieli Oliveira', 'francieli-oliveira', 'Formada desde 2005 pela Universidade do Sul de Santa Catarina (Unisul), <b>Francieli Regina Oliveira</b> atua na cobertura política desde 2012 com passagens pelo Jornal da Manhã, A Tribuna e assessoria de imprensa.'),
(32, '2019-07-12 10:13:42', 'Erica Possamai', 'erica-possamai', '<b>Erica Possamai</b> é terapeuta energética facilitadora de consciência para o despertar da humanidade e atua em terapias energéticas que tratam as causas emocionais, aliviando sintomas físicos e mentais.'),
(33, '2019-07-25 13:52:15', 'Karol Calegari', 'karol-calegari', '<b>Karoline Calegari</b> é graduada em Direito, especialista em Direito e Defesa do Consumidor, diretora executiva do Procon de Içara desde 2017, além de presidente da Associação dos Procons de Santa Catarina.'),
(34, '2019-07-30 11:01:26', 'Deinyffer Marangoni', 'deinyffer-marangoni', '<b>Deinyffer Marangoni</b> é formado em Administração, atua como executivo da Associação Empresarial de Içara e docente na Faculdade do Vale do Araranguá.'),
(35, '2019-10-29 01:19:57', 'Dani Niero', 'dani-niero', '<b>Dani Niero</b> é formada em Comunicação Social com Habilitação Jornalismo; fez MBA em Comunicação Corporativa pela Fundação Casper Líbero e acumula experiência de mais de 20 anos em jornalismo impresso, web, assessoria de imprensa pública e privada.'),
(36, '2019-11-04 02:32:03', 'Obituário', 'obituario', 'O espaço de obituário do Canal Içara é dedicado a homenagear as pessoas que partiram. Para utilizar, entre em contato pelo WhatsApp (48) 99181-2728. Celebre a vida sempre que possível. E, se tiver em dificuldade, <b>procure ajuda com o CVV pelo telefone 188</b>'),
(37, '2019-11-18 10:07:59', 'Empreenda Direito', 'empreenda-direito', '<b>Pâmela de Sá</b> e <b>Sandra de Sá</b> são advogadas especializadas em atendimento empresarial com foco na prevenção de passivos judiciais.'),
(38, '2020-01-29 10:55:42', 'Andréia Limas', 'andreia-limas', '<b>Andréia Medeiros Limas</b> é jornalista, com experiência editorial nos jornais da Região Carbonífera, e assessoria de imprensa.'),
(39, '2020-01-31 13:10:46', 'João Paulo Messer', 'jp-messer', 'João Paulo Messer é colunista político e radialista, apresentador do programa João Paulo Messer, das 7h às 10h, na Rádio Eldorado (AM 570).'),
(40, '2020-02-14 10:15:48', 'Henrique Ferreri', 'henrique-ferresi', '<b>Henrique Ferresi</b> é içarense, professor de música, teatro, cantor, ator e acadêmico de musicoterapia. Também é escritor premiado com o troféu Monteiro Lobato 2019 como melhor contista infantil, além de apaixonado pela arte e pela belíssima cidade de Içara.'),
(41, '2020-05-02 23:32:36', 'Erik Borges', 'erik-borges', '<b>Erik Borges</b> é ex-secretário parlamentar na Assembleia Legislativa de Santa Catarina (Alesc), graduado em Comunicação Social com habilitação em Jornalismo e pós-graduando em Comunicação e Semiótica. Sua opinião não reflete, necessariamente, o posicionamento do Portal Canal Içara.'),
(42, '2020-05-29 11:17:54', 'Júlia Helena Lima', 'julia-helena-lima', '<b>*Júlia Helena Lima</b> é formada em Educação Física, com pós em Obesidade e Emagrecimento, é acadêmica de Medicina, sócia-idealizadora da Evolua CrossTraining, coordenadora do Projeto Saúde Urbana, empresária e palestrante.'),
(43, '2020-05-31 09:51:08', 'Bárbara Moro', 'barbara-moro', '<b>Bárbara Aparecida S. Moro</b> é psicóloga (CRP 12/18768)'),
(44, '2020-09-10 20:55:50', 'Papo Churrasco', 'papo-churrasco', '<b>*Papo Churrasco</b> é formado pelos jovens Vitor Leopoldo e Henrique Vieira com o apoio o Portal Canal Içara, The Nose Mustache, Império Moda Homem, Digital Agência, Bruno Mendes Fotografia, Nésio Lanches, M&D Comércio de Carnes e Wagner Pães e Doces.'),
(45, '2020-10-01 16:23:17', 'Eleições 2020: Como posso contribuir com Içara como vereador(a)?', 'eleicoes2020-legislativo', '<b>Participe!</b> Se você é candidato(a) a vereador em Içara, envie o nome completo, idade, naturalidade, profissão, grau de instrução, número, partido, informe se foi vereador(a) em alguma legislatura e o link onde constam as suas propostas atuais, além da resposta para a pergunta: Como você pode contribuir como vereador(a) com Içara? O texto pode conter até 500 caracteres (incluindo os espaços). Todo o conteúdo deve ser encaminhado junto com uma foto (sem texto ou arte) - em tamanho 1000 x 500 px - para o e-mail contato@canalicara.com.'),
(46, '2021-02-21 08:51:05', 'André Eleutério', 'andre-eleuterio', '<b>André Eleutério</b> é formado em teologia.'),
(47, '2021-03-22 14:46:25', 'CDL de Içara', 'entidades-cdl-icara', 'O Clube de Dirigentes Lojistas de Içara, assim inicialmente denominado, atua em Içara desde 9 de agosto de 1979.'),
(48, '2021-03-22 14:47:39', 'Sindilojas de Içara e Região', 'entidades-sindilojas-icara', 'O Sindicato dos Comerciantes Varejistas e Atacadistas de Içara, Morro da Fumaça e Balneário Rincão foi fundado em 10 de fevereiro de 2000 por lojistas engajados na melhoria, principalmente, das negociações coletivas na região. Até então, os acordos seguiam diretrizes estaduais, muitas vezes, não condizentes com a realidade local.'),
(49, '2021-03-22 14:50:00', 'Associação Empresarial de Içara', 'entidades-aci-icara', 'A Associação Empresarial de Içara foi fundada em 3 de agosto de 1996 para a união do empresariado içarense e o desenvolvimento econômico sustentável da cidade. '),
(50, '2021-03-22 14:52:25', 'Lions Clube', 'entidades-lions-icara', ' '),
(51, '2021-03-23 15:21:21', 'Hospital São Donato', 'entidades-hospital-sao-donato', ' '),
(52, '2021-12-29 15:25:47', 'Chef Lazo', 'chef-lazo', '<b>Antônio Evilázio Cardoso</b> é organizador de eventos esportivos de bocha e sinuca em Içara.'),
(53, '2022-01-06 01:27:59', 'Rosimeri Vieira', 'rosimeri-vieira', 'Rosimeri Vieira é psicóloga, especialista cognitivo comportamental, com formação em Gestão Estratégica de Pessoas pela Fundação Getúlio Vargas (FGV), mestre em Administração, Máster Coach, professora universitária e consultora empresarial na Conexão Consultoria e  Gestão de Carreiras.'),
(54, '2022-01-13 12:57:14', 'Taise Domiciano', 'taise-domiciano', '<b>Taise Domiciano</b> é palestrante, professora, pesquisadora de futuros, facilitadora e mentora em criatividade, inovação e futuros.'),
(55, '2022-02-25 17:18:44', 'Panorama Esportivo', 'panorama-esportivo', '<b>Miguel Ramos</b> é  bibliotecário, arquivista e cronista esportivo, apaixonado por esportes, amante do rádio e louco por informações esportivas!'),
(56, '2022-07-17 13:37:02', 'Rosiris Pavei', 'rosiris-pavei', '<a href=\"https://instagram.com/hairjuniornobre?igshid=YmMyMTA2M2Y=\" target=_blank><IMG src=\"https://www.canalicara.com/upload/banners/blogs_150x150_juniornobre.png\"></a>\r\n\r\n<br><br><b>Rosiris Pavei</b> é mãe de um menino e de três pets. diretora de escola e, junto de mais duas amigas, promove excursões com o Embarque com Elas Turismo. Começou a vida de viajante em 2020 e não parou mais. Gosta de procurar lugares, restaurantes e também atrativos além dos clichês.'),
(57, '2022-08-22 18:04:37', 'Eleições 2022: Como posso contribuir com Içara como deputado(a)?', 'eleicoes2022-legislativo', '<b>Eleições 2022:</b> Cada candidato(a) a deputado(a) estadual ou federal tem este espaço disponível para apresentar como pretende contribuir com Içara. As informações postadas se resumem ao nome completo, idade, naturalidade, profissão, grau de instrução, número, partido, informe se foi candidato(a) anteriormente e o link com propostas atuais, além da resposta para a pergunta: Como você pode contribuir como deputado(a) com Içara? O texto pode conter até 1 mil caracteres (incluindo os espaços). Todo o conteúdo deve ser encaminhado junto com uma foto (sem texto ou arte) - em tamanho 1000 x 500 px - para contato@canalicara.com.'),
(58, '2022-10-06 22:19:45', 'Comunidade', 'comunidade', 'Envie a sua sugestão de pauta para redacao@canalicara.com'),
(59, '2022-10-06 22:27:13', 'Agende-se', 'agende-se', ' ');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `noticias_blogs`
--
ALTER TABLE `noticias_blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pdate` (`pdate`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias_blogs`
--
ALTER TABLE `noticias_blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
