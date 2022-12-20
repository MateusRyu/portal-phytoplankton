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

/* templates/default.html.twig */
class __TwigTemplate_f1f3e059d60706056d1f4ba24ae480fc extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
            'script' => [$this, 'block_script'],
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
        $this->loadTemplate("componnents/head/home.html.twig", "templates/default.html.twig", 4)->display($context);
        // line 5
        echo "        <title>
          ";
        // line 6
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["title"] ?? null)), "html", null, true);
        if ((($context["title"] ?? null) == true)) {
            echo " - ";
        }
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, ($context["SITE_NAME"] ?? null)), "html", null, true);
        echo "
        </title>
        ";
        // line 8
        $this->displayBlock('head', $context, $blocks);
        // line 9
        echo "    </head>
    <body>
      ";
        // line 11
        $this->loadTemplate("componnents/header/home.html.twig", "templates/default.html.twig", 11)->display($context);
        // line 12
        echo "      <main id=\"content\">
        ";
        // line 13
        $this->displayBlock('content', $context, $blocks);
        // line 14
        echo "      </main>
      ";
        // line 15
        $this->displayBlock('script', $context, $blocks);
        // line 16
        echo "    </body>
</html>";
    }

    // line 8
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 13
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 15
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "templates/default.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 15,  88 => 13,  82 => 8,  77 => 16,  75 => 15,  72 => 14,  70 => 13,  67 => 12,  65 => 11,  61 => 9,  59 => 8,  50 => 6,  47 => 5,  45 => 4,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templates/default.html.twig", "/shared/httpd/portal/app/views/templates/default.html.twig");
    }
}
