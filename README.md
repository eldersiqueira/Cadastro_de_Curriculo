# 📄 Sistema de Currículos - Enlatados Juarez (MVC em PHP)

Sistema web desenvolvido em **PHP** utilizando a arquitetura **MVC (Model-View-Controller)**, integrado com banco de dados **MySQL** e estilizado com **Bootstrap 5** e **Font Awesome**. O projeto abrange o gerenciamento completo de currículos profissionais, dados acadêmicos, complementares, experiências de trabalho e um painel exclusivo de administração.

---

## 🚀 Tecnologias Utilizadas

* **Linguagem:** PHP (Programação Orientada a Objetos)
* **Banco de Dados:** MySQL (via XAMPP / phpMyAdmin)
* **Front-end:** HTML5, CSS3, Bootstrap 5, Font Awesome
* **Arquitetura:** Padrão MVC com Front Controller (`Navegacao.php`) e controle de sessões.

---

## 🗂️ Estrutura do Projeto

A organização dos diretórios segue rigorosamente o padrão MVC:

```text

├── Controller/
│   ├── ExperienciaProfissionalController.php
│   ├── FormacaoAcadController.php
│   ├── OutrasFormacoesController.php
│   ├── UsuarioController.php
│   └── Navegacao.php
│
├── Model/
│   ├── ConexaoBD.php
│   ├── ExperienciaProfissional.php
│   ├── FormacaoAcad.php
│   ├── OutrasFormacoes.php
│   └── Usuario.php
│
├── View/
│   ├── ADMListarCadastrados.php
│   ├── ADMVisualizarCadastro.php
│   ├── cadastroNaoRealizado.php
│   ├── cadastroRealizado.php
│   ├── informacaoExcluida.php
│   ├── informacaoInserida.php
│   ├── login.php
│   ├── operacaoNaoRealizada.php
│   ├── primeiroAcesso.php
│   └── principal.php
│
└── README.md
