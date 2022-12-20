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

/* componnents/footer/home.html.twig */
class __TwigTemplate_939aca1fc4124ee15b85d446e3412a63 extends Template
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
        echo "<footer class=\"mt-0 py-1 text-muted text-center text-small text-bg-info\">
    <div class=\"container text-center my-auto\">
        <small>
            Desenvolvido por Mateus Ryu Yamaguchi (<date>";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ON_AIR"] ?? null), "YEAR", [], "any", false, false, false, 4), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["OFF_AIR"] ?? null), "YEAR", [], "any", false, false, false, 4), "html", null, true);
        echo "</date>)
        </small>
    </div>
</footer>";
    }

    public function getTemplateName()
    {
        return "componnents/footer/home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "componnents/footer/home.html.twig", "/shared/httpd/portal/app/views/componnents/footer/home.html.twig");
    }
}
