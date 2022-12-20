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

/* componnents/buttons/linkDanger.html.twig */
class __TwigTemplate_012bea045c1cc4cd36c80acaf4eb88a4 extends Template
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
        echo "<a href=\"";
        echo twig_escape_filter($this->env, ($context["link"] ?? null), "html", null, true);
        echo "\" class=\"btn btn-sm btn-outline-danger\">";
        echo twig_capitalize_string_filter($this->env, ($context["text"] ?? null));
        echo "</a>";
    }

    public function getTemplateName()
    {
        return "componnents/buttons/linkDanger.html.twig";
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
        return new Source("", "componnents/buttons/linkDanger.html.twig", "/shared/httpd/portal/app/views/componnents/buttons/linkDanger.html.twig");
    }
}
