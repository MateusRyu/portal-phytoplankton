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

/* pages/error/404.html.twig */
class __TwigTemplate_7b7b8b2c439e299c4def2fd573be43c2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "templates/error.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        $context["title"] = "página não encontrada";
        // line 3
        $context["message"] = "Erro 404: Desculpa, mas não foi possível encontrar a página que você tentou acessar!";
        // line 1
        $this->parent = $this->loadTemplate("templates/error.html.twig", "pages/error/404.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "pages/error/404.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 1,  43 => 3,  41 => 2,  34 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/error/404.html.twig", "/shared/httpd/portal/app/views/pages/error/404.html.twig");
    }
}
