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

/* templates/redirect.html.twig */
class __TwigTemplate_8bb8d1974341d9532e6ec8292173df8e extends Template
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
        echo "<!DOCTYPE html>
<html lang=\"pt-BR\">
    <head>
        <meta http-equiv=\"refresh\" content=\"";
        // line 4
        echo twig_escape_filter($this->env, ((array_key_exists("timer", $context)) ? (_twig_default_filter(($context["timer"] ?? null), "0")) : ("0")), "html", null, true);
        echo "; URL=";
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
        echo "\" />
        <title>
            ";
        // line 6
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["title"] ?? null)), "html", null, true);
        if ((($context["title"] ?? null) == false)) {
            echo " - ";
        }
        echo twig_escape_filter($this->env, ($context["SITE_NAME"] ?? null), "html", null, true);
        echo "
        </title>
    </head>
    <body>
        <p>Redirecionando para: <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
        echo "\">/";
        echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
        echo "</a></p>
        <p>
            Contagem regressiva para redirecionar: <span id=\"timer\"></span>
        </p>
        ";
        // line 14
        echo ($context["body"] ?? null);
        echo "
    </body>

    <script>
        var timer = ";
        // line 18
        echo twig_escape_filter($this->env, ((array_key_exists("timer", $context)) ? (_twig_default_filter(($context["timer"] ?? null), "0")) : ("0")), "html", null, true);
        echo ";
        var x = setInterval(function() {
            document.getElementById(\"timer\").innerHTML = timer;
            timer--;
        }, 1000);
    </script>
</html>";
    }

    public function getTemplateName()
    {
        return "templates/redirect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 18,  73 => 14,  62 => 10,  51 => 6,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templates/redirect.html.twig", "/shared/httpd/portal/app/views/templates/redirect.html.twig");
    }
}
