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

/* componnents/buttons/linkSecondary.html.twig */
class __TwigTemplate_7ad51f25674c36280dc45177ac5e9190 extends Template
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
        echo "\" class=\"btn btn-sm btn-outline-secondary\">";
        echo twig_capitalize_string_filter($this->env, ($context["text"] ?? null));
        echo "</a>";
    }

    public function getTemplateName()
    {
        return "componnents/buttons/linkSecondary.html.twig";
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
        return new Source("", "componnents/buttons/linkSecondary.html.twig", "/shared/httpd/portal/app/views/componnents/buttons/linkSecondary.html.twig");
    }
}
