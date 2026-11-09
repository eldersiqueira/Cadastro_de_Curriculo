# 📄 Sistema de Currículos (MVC em PHP)

Sistema web desenvolvido em **PHP** utilizando a arquitetura **MVC (Model-View-Controller)**, integrado com banco de dados **MySQL** e estilizado com **Bootstrap 5**. O projeto faz parte das atividades práticas de desenvolvimento de sistemas, permitindo o gerenciamento completo de dados pessoais, formação acadêmica e outras formações profissionais.

---

## 🚀 Tecnologias Utilizadas

* **Linguagem:** PHP (Programação Orientada a Objetos)
* **Banco de Dados:** MySQL (via XAMPP / phpMyAdmin)
* **Front-end:** HTML5, CSS3, Bootstrap 5, Font Awesome
* **Arquitetura:** Padrão MVC (Model-View-Controller) com Front Controller (`Navegacao.php`)

---

## 🗂️ Estrutura do Projeto

A organização dos diretórios segue estritamente o padrão MVC:

```text
├── Controller/
│   ├── FormacaoAcadController.php
│   ├── OutrasFormacoesController.php
│   ├── UsuarioController.php
│   └── Navegacao.php
│
├── Model/
│   ├── ConexaoBD.php
│   ├── FormacaoAcad.php
│   ├── OutrasFormacoes.php
│   └── Usuario.php
│
├── View/
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
