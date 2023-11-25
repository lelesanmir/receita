-- MySQL Workbench Synchronization
-- Generated: 2023-11-25 15:38
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: caiod

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `livro_receita1` DEFAULT CHARACTER SET utf8mb3 ;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`cargo` (
  `idCargo` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contém o indentificador único da tabela\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0001  Cozinheiro\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0002  Degustador\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0003  Editor\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0004  Analista de Sistema\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `descricao` VARCHAR(45) NOT NULL COMMENT 'Contém a descrição do cargo ucupado pelo funcionário.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nidCargo Descricao\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0001     Cozinheiro\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0002     Degustador\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0003     Editor\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0004     Analista de Sistema\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  PRIMARY KEY (`idCargo`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`categoria` (
  `idCateg` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contém o indentificador único da categoria de classificação das receitas\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nidCategoria Descrição\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0001           carne\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0002          ave\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0003          peixe\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `descricao` CHAR(25) NOT NULL COMMENT 'Contém a Descrição da categoria de classificação das receitas\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nidCategoria Descrição\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0001           carne\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0002          ave\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0003          peixe\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  PRIMARY KEY (`idCateg`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`composicao` (
  `cozinheiro` SMALLINT(6) NOT NULL COMMENT 'Contém o Identificadorúnico da tabela. Senfo permitido criar receitas seomente cozinheiro.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nidFuncionario\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n00001\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n00002\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `nome` VARCHAR(45) CHARACTER SET 'armscii8' NOT NULL COMMENT 'Contém o nome da receita.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nMacarronada Italiana\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nFeijoada Baiana\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `idIngrediente` INT(11) NOT NULL,
  `idMedida` SMALLINT(6) NOT NULL,
  `qt_Medida` SMALLINT(6) NOT NULL,
  PRIMARY KEY (`cozinheiro`, `nome`, `idIngrediente`),
  INDEX `fk_Ingrediente_has_Receita_Receita1_idx` (`nome` ASC, `cozinheiro` ASC) VISIBLE,
  INDEX `fk_Ingrediente_has_Receita_Ingrediente1_idx` (`idIngrediente` ASC) VISIBLE,
  INDEX `fk_Receita_Ingrediente_Medida_Ingrediente1_idx` (`idMedida` ASC) VISIBLE,
  CONSTRAINT `fk_Ingrediente_has_Receita_Ingrediente1`
    FOREIGN KEY (`idIngrediente`)
    REFERENCES `livro_receita1`.`ingrediente` (`idIngrediente`),
  CONSTRAINT `fk_Ingrediente_has_Receita_Receita1`
    FOREIGN KEY (`nome` , `cozinheiro`)
    REFERENCES `livro_receita1`.`receita` (`nome` , `cozinheiro`),
  CONSTRAINT `fk_Receita_Ingrediente_Medida_Ingrediente1`
    FOREIGN KEY (`idMedida`)
    REFERENCES `livro_receita1`.`medida_ingrediente` (`idMedida`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`degustacao` (
  `nome` VARCHAR(45) CHARACTER SET 'armscii8' NOT NULL,
  `cozinheiro` SMALLINT(6) NOT NULL,
  `Data_degustacao` DATE NULL DEFAULT NULL COMMENT 'contém a data de degustação\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nex:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n13-10-2011',
  `Nota_degustacao` SMALLINT(6) NULL DEFAULT NULL COMMENT 'contém a nota da receita\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nex:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n1\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n10',
  PRIMARY KEY (`nome`, `cozinheiro`),
  INDEX `fk_Funcionario_has_Receita_Receita1_idx` (`nome` ASC, `cozinheiro` ASC) VISIBLE,
  CONSTRAINT `fk_Funcionario_has_Receita_Receita1`
    FOREIGN KEY (`nome` , `cozinheiro`)
    REFERENCES `livro_receita1`.`receita` (`nome` , `cozinheiro`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`funcionario` (
  `idFunc` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contém o Identificadorúnico da tabela.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nidFuncionario\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n00001\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n00002\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `rg` CHAR(15) NOT NULL COMMENT 'Contém o número de indentificação do Registro Geral do funcionário.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nRG\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n001230678\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n045638945\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `nome` VARCHAR(80) NOT NULL COMMENT 'Contém o nome do funcionário.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nNome\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nJõao da Sliva Júnior\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nMaria Aparecida Oliveira\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `dt_ingr` DATE NOT NULL COMMENT 'Contém a data de ingresso(admissão) do funcionário.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nData Igresso\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n01/12/2000\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n03/2/2003\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n',
  `salario` DECIMAL(9,2) NOT NULL COMMENT 'Contém o salário de contratação do funcionário.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nSalário\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n  20.000,00\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n  5876,90\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `idCargo` SMALLINT(6) NOT NULL,
  `nome_fantasia` VARCHAR(25) NULL DEFAULT NULL COMMENT 'Contém o nome fantasia utilizado pelo cozinheiro\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nNome Fantasia\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nRei das Pizzas\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nRei das Massas\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `login_idLogin` INT(11) NOT NULL,
  PRIMARY KEY (`idFunc`, `login_idLogin`),
  INDEX `fk_Funcionario_Cargo1_idx` (`idCargo` ASC) VISIBLE,
  INDEX `fk_funcionario_login1_idx` (`login_idLogin` ASC) VISIBLE,
  CONSTRAINT `fk_Funcionario_Cargo1`
    FOREIGN KEY (`idCargo`)
    REFERENCES `livro_receita1`.`cargo` (`idCargo`),
  CONSTRAINT `fk_funcionario_login1`
    FOREIGN KEY (`login_idLogin`)
    REFERENCES `livro_receita1`.`login` (`idLogin`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`imagen` (
  `idImagen` INT(11) NOT NULL AUTO_INCREMENT,
  `imagenUrl` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idImagen`),
  UNIQUE INDEX `imagenUrl_UNIQUE` (`imagenUrl` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`ingrediente` (
  `idIngrediente` INT(11) NOT NULL COMMENT 'Contem a definição da ',
  `nome` VARCHAR(25) NOT NULL,
  `descricao` VARCHAR(200) NULL DEFAULT NULL COMMENT 'Contém uma descrição para ingredientes exóticos\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nNome   Descrição\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nUmeboshi é uma especialidade da culinária japonesa que consiste em umê em conserva, por isso um tipo de tsukemono. É caracterizado pelo seu sabor forte muito ácido e salgado. O umê é originário da China e é normalmente chamado de ameixa apesar de ser um parente mais próximo do damasco. ',
  PRIMARY KEY (`idIngrediente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`listadesabores` (
  `idListaDeSabores` INT(11) NOT NULL AUTO_INCREMENT,
  `descricaoSabor` VARCHAR(255) NOT NULL COMMENT 'Contém a descrição dos sabores das comidas.\\\\n\\\\nExemplo:\\\\nDoce;\\\\nSalgado;\\\\nRefresco\\\\n...',
  PRIMARY KEY (`idListaDeSabores`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`livro` (
  `idLivro` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contém o indentificador único do livro.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nId  Livro  Nome\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0001      Receitas Natalinas\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0002      Receitas São João\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `nome_livro` VARCHAR(45) NOT NULL COMMENT 'Contém o Título do livro.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nId  Livro  Nome\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0001      Receitas Natalinas\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0002      Receitas São João\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `isbn` CHAR(20) NOT NULL COMMENT 'O ISBN (International Standard Book Number/ Padrão Internacional de Numeração de Livro) é um padrão numérico criado com o objetivo de fornecer uma espécie de “RG” para publicações monográficas, como livros, artigos e apostilas.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nNúmero do isbn\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n123-12-123456-1-1 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n231-21-654321-3-1\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `editor` SMALLINT(6) NOT NULL COMMENT 'Contém o código do funcionário do editor do livro.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n001\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n002\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n003\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `imagemLivro_idimagemLivro` INT(11) NOT NULL,
  PRIMARY KEY (`idLivro`, `editor`, `imagemLivro_idimagemLivro`),
  UNIQUE INDEX `nome_livro_UNIQUE` (`nome_livro` ASC) VISIBLE,
  UNIQUE INDEX `isbn_UNIQUE` (`isbn` ASC) VISIBLE,
  INDEX `fk_Livro_Funcionario1_idx` (`editor` ASC) VISIBLE,
  INDEX `fk_livro_imagemLivro1_idx` (`imagemLivro_idimagemLivro` ASC) VISIBLE,
  CONSTRAINT `fk_Livro_Funcionario1`
    FOREIGN KEY (`editor`)
    REFERENCES `livro_receita1`.`funcionario` (`idFunc`),
  CONSTRAINT `fk_livro_imagemLivro1`
    FOREIGN KEY (`imagemLivro_idimagemLivro`)
    REFERENCES `livro_receita1`.`imagemLivro` (`idimagemLivro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`login` (
  `senha` VARCHAR(255) NOT NULL COMMENT 'Senha para entrar no sistema no minimo de 8 caracteres com letra 1 maiuscula\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n e 1 letra minuscula e 1 caractere especial e 1 numero. No mínimo tem que atender essas especificações.',
  `idLogin` INT(11) NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idLogin`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`medida_ingrediente` (
  `idMedida` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contém o indentificador unico do IdMedida\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nIdMedida    descricao\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0001           xícara\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0002          ml\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0003          kg\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `descricao` VARCHAR(45) NOT NULL COMMENT 'Contéma descrição da medida\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nmedida    descricao\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0001           xícara\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0002          ml\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0003          kg\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  PRIMARY KEY (`idMedida`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`parametro` (
  `idmes` SMALLINT(6) NOT NULL COMMENT 'Contém o mês determinado para produção das receitas.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nMes    Ano   Qtd Receitas\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n05      2023   4\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n06      2023   5\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n',
  `idano` SMALLINT(6) NOT NULL COMMENT 'Contém o ano determinado para produção das receitas.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nMes    Ano   Qtd Receitas\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n05      2023   4\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n06      2023   5',
  `qtd_receitas` SMALLINT(6) NOT NULL COMMENT 'Contém a quantidade de receitas a serem produzidas no mês/ano  para a produção determinado para produção das receitas.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nMes    Ano   Qtd Receitas\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n05      2023   4\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n06      2023   5',
  PRIMARY KEY (`idmes`, `idano`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`publicao` (
  `idLivro` SMALLINT(6) NOT NULL COMMENT 'Id do Livro\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nEx: 35467',
  `idCozinheiro` SMALLINT(6) NOT NULL COMMENT 'Id único\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nCozinheiro',
  `nomeLivro` VARCHAR(45) CHARACTER SET 'armscii8' NOT NULL COMMENT 'Id - Unico\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nNome do Livro\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nEx: Livro de Galileu fit.',
  PRIMARY KEY (`idLivro`, `idCozinheiro`, `nomeLivro`),
  INDEX `fk_Receita_has_Livro_Livro1_idx` (`idLivro` ASC) VISIBLE,
  INDEX `fk_Receita_has_Livro_Receita1_idx` (`nomeLivro` ASC, `idCozinheiro` ASC) VISIBLE,
  CONSTRAINT `fk_Receita_has_Livro_Livro1`
    FOREIGN KEY (`idLivro`)
    REFERENCES `livro_receita1`.`livro` (`idLivro`),
  CONSTRAINT `fk_Receita_has_Livro_Receita1`
    FOREIGN KEY (`nomeLivro` , `idCozinheiro`)
    REFERENCES `livro_receita1`.`receita` (`nome` , `cozinheiro`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`receita` (
  `nome` VARCHAR(45) CHARACTER SET 'armscii8' NOT NULL COMMENT 'Contém o nome da receita.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nMacarronada Italiana\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nFeijoada Baiana\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `cozinheiro` SMALLINT(6) NOT NULL COMMENT 'Contém o Identificadorúnico da tabela. Senfo permitido criar receitas seomente cozinheiro.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nidFuncionario\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n00001\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n00002\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `idReceita` INT(10) UNSIGNED NOT NULL COMMENT 'Contém o identificador único da receita.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nIdReceita\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n00000000001\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n00000000002\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `dt_criacao` DATE NOT NULL COMMENT 'Contém a data de cadastramenyo da receita no sistema\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nData Criação\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n20/05/2022\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `idCateg` SMALLINT(6) NOT NULL,
  `modo_preparo` VARCHAR(1000) NOT NULL COMMENT 'Contém a informação de preparo da receita \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nMode de preparo \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nEtapa em que os alimentos sofrem tratamento ou modificações através de higienização, tempero, corte, porcionamento, seleção, escolha, moagem e/ou adição de outros ingredientes.',
  `qt_porcao` SMALLINT(6) NULL DEFAULT NULL COMMENT 'Contém a informaçao de quantidade de poerçoes que a receita atende.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nQuantidade Porções\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n      0002\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n      0010\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `degustador` SMALLINT(6) NULL DEFAULT NULL,
  `dt_degustacao` DATE NULL DEFAULT NULL,
  `nota_degustacao` DECIMAL(3,1) NULL DEFAULT NULL,
  `ind_inedita` CHAR(1) NOT NULL COMMENT 'Contém um indicador de receita inédita, ou seja, a receita é inedita\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nquando não foi publicada em nenhum livro.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nInd Inédita\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n      S     -Sim é inédita\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n      N     -Não é inédita, ou seja, já foi publicada\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n',
  `Imagen_idImagen` INT(11) NOT NULL,
  `ListaDeSabores` INT(11) NOT NULL,
  PRIMARY KEY (`nome`, `cozinheiro`, `ListaDeSabores`),
  INDEX `fk_Receita_Funcionario_idx` (`cozinheiro` ASC) VISIBLE,
  INDEX `fk_Receita_Categoria1_idx` (`idCateg` ASC) VISIBLE,
  INDEX `fk_Receita_Funcionario1_idx` (`degustador` ASC) VISIBLE,
  INDEX `fk_Receita_Imagen1_idx` (`Imagen_idImagen` ASC) VISIBLE,
  INDEX `fk_receita_ListaDeSabores1_idx` (`ListaDeSabores` ASC) VISIBLE,
  CONSTRAINT `fk_Receita_Categoria1`
    FOREIGN KEY (`idCateg`)
    REFERENCES `livro_receita1`.`categoria` (`idCateg`),
  CONSTRAINT `fk_Receita_Funcionario`
    FOREIGN KEY (`cozinheiro`)
    REFERENCES `livro_receita1`.`funcionario` (`idFunc`),
  CONSTRAINT `fk_Receita_Funcionario1`
    FOREIGN KEY (`degustador`)
    REFERENCES `livro_receita1`.`funcionario` (`idFunc`),
  CONSTRAINT `fk_Receita_Imagen1`
    FOREIGN KEY (`Imagen_idImagen`)
    REFERENCES `livro_receita1`.`imagen` (`idImagen`),
  CONSTRAINT `fk_receita_ListaDeSabores1`
    FOREIGN KEY (`ListaDeSabores`)
    REFERENCES `livro_receita1`.`listadesabores` (`idListaDeSabores`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`referencia` (
  `cozinheiro` SMALLINT(6) NOT NULL COMMENT 'Contém o Identificadorúnico da tabela.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nidFuncionario\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n00001\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n00002\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `idRestaurante` SMALLINT(6) NOT NULL COMMENT 'Contém o indentificador único do restaurante.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nIdrestaurante\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n       002\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `dt_inicio` DATE NOT NULL COMMENT 'Contém a data de admissão do cozinheiro no restaurante referência.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nData Admissão\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n01/13/2000\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n05/07/2003',
  `dt_fim` DATE NULL DEFAULT NULL COMMENT 'Contém a data do desligamento do cozinheiro no restaurante referência.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nData Desligamento\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n01/13/2000\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n05/07/2003',
  PRIMARY KEY (`cozinheiro`, `idRestaurante`),
  INDEX `fk_Funcionario_has_Restaurante_Restaurante1_idx` (`idRestaurante` ASC) VISIBLE,
  INDEX `fk_Funcionario_has_Restaurante_Funcionario1_idx` (`cozinheiro` ASC) VISIBLE,
  CONSTRAINT `fk_Funcionario_has_Restaurante_Funcionario1`
    FOREIGN KEY (`cozinheiro`)
    REFERENCES `livro_receita1`.`funcionario` (`idFunc`),
  CONSTRAINT `fk_Funcionario_has_Restaurante_Restaurante1`
    FOREIGN KEY (`idRestaurante`)
    REFERENCES `livro_receita1`.`restaurante` (`idRestaurante`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`restaurante` (
  `idRestaurante` SMALLINT(6) NOT NULL AUTO_INCREMENT COMMENT 'Contém o indentificador único do restaurante.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nIdrestaurante\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n       002\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n',
  `nome_rest` VARCHAR(45) NOT NULL COMMENT 'Contém o nome do restaurante que o cozinheiro ja trabalhou.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nChurrascaria Estrela do sul\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nPecorino\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n...',
  `contato` VARCHAR(45) NULL DEFAULT NULL COMMENT 'Contém a referencia de um contato.\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nExemplo:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nContato\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nJoão da Silva\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\nMaria Socorro',
  PRIMARY KEY (`idRestaurante`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE TABLE IF NOT EXISTS `livro_receita1`.`imagemLivro` (
  `idimagemLivro` INT(11) NOT NULL AUTO_INCREMENT,
  `imgUrl` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idimagemLivro`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
