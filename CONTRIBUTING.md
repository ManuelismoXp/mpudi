# Guia de contribuição para o Mpudi

Ao contribuir com este repositório, por favor, discuta primeiro a mudança que você deseja fazer via [issue](https://github.com/ManuelismoXp/mpudi/issues/new), antes defazer uma alteração.

## Como contribuir?

* 1 Faça o _fork_ deste projecto.
* 2 Crie a sua bugfix ou feature em uma branch.

**Nota**: Considere nomear sua branch com base no recurso que você vai trabalhar. Por exemplo:

```
git checkout -b my-new-feature develop
```

 Onde develop é a branch onde **my-new-feature** est[a baseada.
 
 #### Pull Requests
* Use a [PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md). A maneira mais fácil de aplicar as convenções é instalar o [PHP Code Sniffer](http://pear.php.net/package/PHP_CodeSniffer).

* **Documente qualquer mudança**. Certifique-se de que o **README.md** e qualquer outra documentação relevante é mantida atualizada.
* Não se preocupe em atualizar o CHANGELOG.md. O administrador do pacote tratará de atualizá-los quando novos lançamentos forem criados.

#### Git Commit Messages

* Use the present tense ("Add feature" not "Added feature")
* Use the imperative mood ("Move cursor to..." not "Moves cursor to...")
* Limit the first line to 72 characters or less
* Reference issues and pull requests liberally
* When only changing documentation, include [ci skip] in the commit description
