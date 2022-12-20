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

/* patterns/registerNavItem.html.twig */
class __TwigTemplate_0701a8e367b74249c708a9effbca3308 extends Template
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
        echo "<li class=\"nav-item ml-2\">

";
        // line 3
        if (twig_get_attribute($this->env, $this->source, ($context["registerNav"] ?? null), "active", [], "any", false, false, false, 3)) {
            // line 4
            echo "    ";
            $context["class"] = "nav-link d-flex justify-content-between  d-flex justify-content-between active";
            // line 5
            echo "    <a class=\"";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" href=\"#\">
";
        } else {
            // line 7
            echo "    ";
            $context["class"] = "nav-link d-flex justify-content-between text-dark fw-lighter d-flex justify-content-between";
            // line 8
            echo "    <a class=\"";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
            echo "/registros/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registerNav"] ?? null), "link", [], "any", false, false, false, 8), "html", null, true);
            echo "\">
";
        }
        // line 10
        echo "        <div>
            <i data-feather=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registerNav"] ?? null), "icon", [], "any", false, false, false, 11), "html", null, true);
        echo "\"></i>
            &nbsp;&nbsp;";
        // line 12
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registerNav"] ?? null), "text", [], "any", false, false, false, 12)), "html", null, true);
        echo "
        </div>
        <span class=\"badge badge rounded-pill text-bg-primary\">
            ";
        // line 15
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["registerNav"] ?? null), "number", [], "any", true, true, false, 15)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["registerNav"] ?? null), "number", [], "any", false, false, false, 15), 0)) : (0)), "html", null, true);
        echo "
        </span>
    </a>
</li>  ";
    }

    public function getTemplateName()
    {
        return "patterns/registerNavItem.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 15,  72 => 12,  68 => 11,  65 => 10,  55 => 8,  52 => 7,  46 => 5,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "patterns/registerNavItem.html.twig", "/shared/httpd/portal/app/views/patterns/registerNavItem.html.twig");
    }
}
