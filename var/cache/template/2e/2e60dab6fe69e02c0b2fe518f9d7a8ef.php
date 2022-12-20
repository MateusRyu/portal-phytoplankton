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

/* templates/error.html.twig */
class __TwigTemplate_de5bcc2503ed3afde8aea4339ba1dc51 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"pt-BR\">
    <head>
        ";
        // line 4
        $this->loadTemplate("componnents/head/home.html.twig", "templates/error.html.twig", 4)->display($context);
        // line 5
        echo "        <title>
          ";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        // line 9
        echo "        </title>
    </head>
    <body>
      ";
        // line 12
        $context["minimal"] = true;
        // line 13
        echo "      ";
        $this->loadTemplate("componnents/header/home.html.twig", "templates/error.html.twig", 13)->display($context);
        // line 14
        echo "      <main id=\"content\">
        <section class=\"alert bg-warning text-white m-5\">
          <h4 class=\"alert-heading\">Oops, encontramos um problema!</h4>
          <p class=\"card-text\">";
        // line 17
        echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
        echo "</p>
        </section>
      </main>
      ";
        // line 20
        $this->loadTemplate("componnents/footer/home.html.twig", "templates/error.html.twig", 20)->display($context);
        // line 21
        echo "    </body>
</html>";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "            ";
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["title"] ?? null)), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, ($context["SITE_NAME"] ?? null), "html", null, true);
        echo "
          ";
    }

    public function getTemplateName()
    {
        return "templates/error.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 7,  78 => 6,  73 => 21,  71 => 20,  65 => 17,  60 => 14,  57 => 13,  55 => 12,  50 => 9,  48 => 6,  45 => 5,  43 => 4,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templates/error.html.twig", "/shared/httpd/portal/app/views/templates/error.html.twig");
    }
}
