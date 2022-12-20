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

/* componnents/badges/danger.html.twig */
class __TwigTemplate_745bb65133a314b1b8ec0fa7a328db50 extends Template
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
        echo "<span class=\"badge bg-danger\">";
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["text"] ?? null)), "html", null, true);
        echo "</span>";
    }

    public function getTemplateName()
    {
        return "componnents/badges/danger.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "componnents/badges/danger.html.twig", "/shared/httpd/portal/app/views/componnents/badges/danger.html.twig");
    }
}
