<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* pages/terms/privacy-policy-2022.html.twig */
class __TwigTemplate_88e5e7ee4bf124f1f73d08c2d64ec143 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        if (($context["fullPage"] ?? null)) {
            // line 2
            echo "<!DOCTYPE html>
<html lang=\"pt-BR\">
    <head>
        <title>
            Política de privacidade - ";
            // line 6
            echo twig_escape_filter($this->env, ($context["SITE_NAME"] ?? null), "html", null, true);
            echo "
        </title>
        <style>
            body {
                text-align: justify;
                padding-right: 120px;
                padding-left: 80px;
            }

            h1 {
                text-align: center;
            }

            li {
                margin-bottom: 1em;
            }
        </style>
    </head>
    <body>
";
        }
        // line 26
        echo "        <h1 id=\"responsabilidades-do-usuario\">
            Política de privacidade
        </h1>
        <p>Data da última atualização: Dezembro de 2022.</p>
        <p>
            A plataforma \"";
        // line 31
        echo twig_escape_filter($this->env, ($context["SITE_NAME"] ?? null), "html", null, true);
        echo "\" é uma 
            plataforma de agregação, indexação e compartilhamento
            de informação. Entende-se que a Política de privacidade
            é um documento que descreve o uso e finalidade dos dados 
            disponibilizados pelo usuário. Para os fins documento, 
            \"plataforma\" ou \"portal\" remetem a plataforma 
            \"";
        // line 37
        echo twig_escape_filter($this->env, ($context["SITE_NAME"] ?? null), "html", null, true);
        echo "\" e seus serviços. Ao aceitar estas políticas, 
            o usuário está ciente de que estes termos podem sofrer 
            modificações e atualizações com a finalidade de 
            melhorar o relacionamento dos usuários com a plataforma, 
            sendo assim, é de responsabilidade do usuário se atentar 
            à possíveis alterações deste Termo.
        </p>
        <p>
            A plataforma pode armazenar os seguintes dados, apenas 
            por meios do preenchimento consciente do úsuario:
        </p>
        <ol style=\"list-style: inside;\">
            
            <li>
                Nome do usário: Servirá apenas para personalização das 
                páginas acessados pelo usuário e para facilitar a comunicação 
                com os curadores e administradores da plataforma e entre eles 
                (curadores e administradores).
            </li>
            <li>
                Endereço de e-mail: Servirá apenas para autenticação para acessar 
                a plataforma e eventualmente pode enviar e-mails com avisos de 
                atualizações ou referente a pedidos de assistências do usuário.
            </li>
            <li>
                Senha: A senha serve apenas para autenticação para acessar a 
                plataforma. Ela é armazenado criptografado com o algoritmo \"bcrypt\",
                deste modo, apenas o usuário tem acesso à senha original.
            </li>
            <li>
                Cookies: A plataforma irá criar um cookie ao criar uma nova conta de 
                usuário ou entrar novamente na plataforma, que servirá como autenticação
                para acessar áreas restristas por usuário ou por nivel de acesso (colaborador,
                curador, administrador). No cookie, terá apenas o identificador do usuário, 
                seu nome e seu nivel de acesso e ele irá expirar após 8 (oito) horas, por padrão, 
                ou após 3 (três) anos, caso o usuário marque que queira que a plataforma se 
                lembre dele. O cookie não é compartilhado com terceiros e é salvo no navegador do 
                usuário de forma criptografada com o algoritmo \"HS256\", com uma chave anônima que 
                apenas a plataforma conhece.
            </li>
        </ol>
";
        // line 78
        if (($context["fullPage"] ?? null)) {
            // line 79
            echo "    </body>
</html>
";
        }
    }

    public function getTemplateName()
    {
        return "pages/terms/privacy-policy-2022.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 79,  128 => 78,  84 => 37,  75 => 31,  68 => 26,  45 => 6,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/terms/privacy-policy-2022.html.twig", "/shared/httpd/portal/app/views/pages/terms/privacy-policy-2022.html.twig");
    }
}
