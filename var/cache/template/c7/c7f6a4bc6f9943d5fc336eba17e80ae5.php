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

/* componnents/badges/warning.html.twig */
class __TwigTemplate_dcf53b5bb245ed137ef62b60be9d57c4 extends Template
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
        echo "<span class=\"badge bg-warning text-dark\">";
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["text"] ?? null)), "html", null, true);
        echo "</span>";
    }

    public function getTemplateName()
    {
        return "componnents/badges/warning.html.twig";
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
        return new Source("", "componnents/badges/warning.html.twig", "/shared/httpd/portal/app/views/componnents/badges/warning.html.twig");
    }
}
